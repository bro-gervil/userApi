<?php

namespace App\Models;

use CodeIgniter\Model;

class MagasinModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'magasin';
    protected $primaryKey       = 'id_mgsin';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_mgsin','num_magasin','id_stock','url_magasin'];

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
    public function select_idmagasin(){
        $db = \Config\Database::connect();
        $builder = $db->table('magasin');
        $builder->selectMax('id_mgsin');
        $query = $builder->get();
        $row = $query->getRow();
        if (isset($row->id_mgsin)) {
            return $row->id_mgsin +1;
        } else {
            return 1;
        }
    }

    //Sauvegarder une nouvelle entrée dans le magasin
    public function save_magasin($data){
        $db = \Config\Database::connect();
        $builder = $db->table('magasin');

        $builder->insert($data);
    }

    //Sélectionner la liste des magasins 
    public function tous_magasins(){
        $db = \Config\Database::connect();
        $builder = $db->table('magasin');
        $builder->select('*')->orderBy('id_mgsin','ASC');
        $query = $builder->get();
        $row = $query->getResultArray();
        
        return $row;
    }

    //Sélectionner un magsin via son id_stock
    public function magasin_by_stock($id_stock){
        $db = \Config\Database::connect();
        $builder = $db->table('magasin');
        $row = $builder->select('id_mgsin')->where(['id_stock'=>esc($id_stock)])->get()->getResultArray();

        foreach ($row as $r) {
            return $r['id_mgsin'];
        }
    }

    public function suppr_magasin($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('magasin');

        if($builder->delete(['id_mgsin' => esc($data)])){
            return true;
        }
        else{
            return false;
        }
    }

}
