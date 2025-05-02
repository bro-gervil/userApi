<?php

namespace App\Models;

use CodeIgniter\Model;

class stockModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'stock';
    protected $primaryKey       = 'id_stock';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_stock','proprietaire'];

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
    public function select_idstock(){
        $db = \Config\Database::connect();
        $builder = $db->table('stock');
        $builder->selectMax('id_stock');
        $query = $builder->get();
        $row = $query->getRow();
        if (isset($row->id_stock)) {
            return $row->id_stock;
        } else {
            return 1;
        }
    }

    //Sauvegarder une nouvelle entrée dans la table livraison
    public function save_stock($data){
        $db = \Config\Database::connect();
        $builder = $db->table('stock');

        $builder->insert(esc($data));
    }

    public function suppr_stock_magasin($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('stock');

        if($builder->delete(['id_stock' => esc($data)])){
            return true;
        }
        else{
            return false;
        }
    }
}
