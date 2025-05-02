<?php

namespace App\Models;

use CodeIgniter\Model;

class LivraisonDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'livraisonDetail';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_detail','id_prod','qtite_livr','id_magasin'];

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
    public function select_idlivr(){
        $db = \Config\Database::connect();
        $builder = $db->table('livraisonDetail');
        $builder->selectMax('id_detail');
        $query = $builder->get();
        $row = $query->getRow();
        if (isset($row->id_detail)) {
            return $row->id_detail +1;
        } else {
            return 1;
        }
    }

    //Sauvegarder une nouvelle entrée dans la table livraison
    public function save_livraisonDetail($data1,$data2,$data3,$data4){
        $db = \Config\Database::connect();
        $builder = $db->table('livraisonDetail');

        $builder->insert(array('id_prod' => esc($data1),'id_magasin' => esc($data2),'qtite_livr' => esc($data3),'id_livr' => esc($data4)));
    }
}
