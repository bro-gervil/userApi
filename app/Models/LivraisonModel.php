<?php

namespace App\Models;

use CodeIgniter\Model;

class LivraisonModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'livraison';
    protected $primaryKey       = 'id_livr';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_livr','id_detail','date_livr','nbre_prod','id_poste'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'date_livr';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    //Sélectionner le dernier id dans la table livraison et incrémenter
    public function select_idlivraison(){
        $db = \Config\Database::connect();
        $builder = $db->table('livraison');
        $builder->selectMax('id_livr');
        $query = $builder->get();
        $row = $query->getRow();
        if (isset($row->id_livr)) {
            return $row->id_livr +1;
        } else {
            return 1;
        }
    }

    //Sauvegarder une nouvelle entrée dans la table livraison
    public function save_livraison($data){
        $db = \Config\Database::connect();
        $builder = $db->table('livraison');

        $builder->insert(esc($data));
    }

    public function select_dateLivraison($where){
        $db = \Config\Database::connect();
        $builder = $db->table(['livraison']);
        $builder->select(['date_livr']);
        $builder->join('bonLivraison', 'livraison.id_livr = bonLivraison.id_livr', 'inner');// Type de jointure et condition
        $builder->where(esc($where)); 
        $builder->orderBy('date_livr', 'DESC'); // Triez les enregistrements par 'id' dans l'ordre décroissant
        $builder->limit(3); // Limitez les résultats aux trois derniers enregistrements
        $query = $builder->get();

        // Affichez les résultats
        $result = $query->getResult();
        return $result;
        
    }

    public function countLivraison(){
        $db = \Config\Database::connect();
        // Sélectionner tous les champs des enregistrements de la table poste
        /*
        $builder = $db->table('poste');
        $builder->select('*');
        $builder->join('livraison', 'livraison.id_poste = poste.id_poste', 'inner');
        $query = $builder->get();
        $result1 = $query->getResult();

        $builder = $db->table('livraison');
        $builder->select('id_poste, COUNT(*) as total');
        $builder->groupBy('id_poste');
        $query = $builder->get();
        $result2 = $query->getResult();

        return ['poste' => $result1, 'count' => $result2];
        */

        $builder = $db->table('livraison');
        $builder->select('livraison.id_poste, poste.nom_poste, COUNT(livraison.id_poste) as total');
        $builder->join('poste', 'livraison.id_poste = poste.id_poste', 'inner');
        $builder->groupBy('livraison.id_poste');
        $query = $builder->get();
        $result = $query->getResult();

        return $result;
    }

    public function countLivraisonbyMonth(){
        $db = \Config\Database::connect();

        $builder = $db->table('livraison');
        $builder->select('livraison.id_poste,poste.nom_poste,YEAR(date_livr) as year,MONTH(date_livr) as month, COUNT(*) as total');
        $builder->join('poste','livraison.id_poste = poste.id_poste','INNER');
        $builder->groupBy('id_poste,year,month');
        $query = $builder->get();
        $result = $query->getResult();

        return $result;
    }
}
