<?php

namespace App\Models;

use CodeIgniter\Model;

class PosteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'poste';
    protected $primaryKey       = 'id_poste';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_poste','nom_poste','id_stock'];

    // Dates
    protected $useTimestamps = false;
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
    public function select_idposte(){
        $db = \Config\Database::connect();
        $builder = $db->table('poste');
        $builder->selectMax('id_poste');
        $query = $builder->get();
        $row = $query->getRow();
        if (isset($row->id_poste)) {
            return $row->id_poste +1;
        } else {
            return 1;
        }
    }

    //Sauvegarder une nouvelle entrée dans la table livraison
    public function save_poste($data){
        $db = \Config\Database::connect();
        $builder = $db->table('poste');

        $builder->insert(esc($data));
    }

    public function tous_postes()
    {
        $db = \Config\Database::connect();
        $sql = $db->query(esc("SELECT * FROM poste ;"));
        $resultat = $sql->getResultArray();
        return $resultat;
    } 

    //Recup tous les noms des postes dans un tableau;
     public function les_postes()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poste');
        $builder->select('nom_poste');
        $query = $builder->get();
        $row = $query->getResultArray();
        return $row;
    } 



    public function un_poste($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('poste');
        $builder->select('nom_poste')->where('id_poste',esc($id));
        $query = $builder->get();
        $row = $query->getRow();

        if (isset($row->nom_poste)) {
            return $row->nom_poste;
        } else {
            return "error";
        }
    } 

}

