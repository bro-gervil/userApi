<?php

namespace App\Models;

use CodeIgniter\Model;

class bonLivraisonModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bonLivraison';
    protected $primaryKey       = 'id_bonLivr';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_bonLivr','id_livr','file_path','id_poste'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = '';
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
    public function select_bonlivraison(){
        $db = \Config\Database::connect();
        $builder = $db->table('bonLivraison');
        $builder->selectMax('id_bonLivr');
        $query = $builder->get();
        $row = $query->getRow();
        if (isset($row->id_bonLivr)) {
            return $row->id_bonLivr +1;
        } else {
            return 1;
        }
    }

    public function select_idbonLivaison($where){
        $db = \Config\Database::connect();
        $builder = $db->table(['bonLivraison']);
        $builder->select(['id_bonLivr','file_path']);
        $builder->join('livraison', 'bonLivraison.id_livr = livraison.id_livr', 'inner'); // Type de jointure et condition
        $builder->where(esc($where));
        $builder->orderBy('id_bonLivr', 'DESC'); // Triez les enregistrements par 'id' dans l'ordre décroissant
        $builder->limit(3); // Limitez les résultats aux trois derniers enregistrements
        $query = $builder->get();

        // Affichez les résultats
        $result = $query->getResult();
        return $result;
        
    }

    //Sauvegarder une nouvelle entrée dans la table livraison
    public function save_bonlivraison($data){
        $db = \Config\Database::connect();
        $builder = $db->table('bonLivraison');

        $builder->insert(esc($data));
    }
}
