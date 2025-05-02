<?php

namespace App\Models;

use CodeIgniter\Model;

class InventaireModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'inventaire';
    protected $primaryKey       = 'id_inv';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_inv','date_inv'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'date_inv';
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
    public function select_idinventaire(){
        $db = \Config\Database::connect();
        $builder = $db->table('inventaire');
        $builder->selectMax('id_inv');
        $query = $builder->get();
        $row = $query->getRow();
        if (isset($row->id_inv)) {
            return $row->id_inv +1;
        } else {
            return 1;
        }
    }

    //Sauvegarder une nouvelle entrée dans la table livraison
    public function save_inventaire($data){
        $db = \Config\Database::connect();
        $builder = $db->table('inventaire');

        $builder->insert(esc($data));
    }
}
