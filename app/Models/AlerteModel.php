<?php

namespace App\Models;

use CodeIgniter\Model;

class AlerteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'alerte';
    protected $primaryKey       = 'id_al';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_al','id_prod','id_mag','id_notif','dateExp'];

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
    /*
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
    } */

    //Sauvegarder une nouvelle entrée dans le magasin
    public function save_alerte($data){
        $db = \Config\Database::connect();
        $builder = $db->table('alerte');
        $builder->insert($data);
    }

    //Sélectionner la liste des magasins 
    public function toutes_alertes(){
        $db = \Config\Database::connect();
        $builder = $this;
        $builder->select('*')->orderBy('id_al');
        $query = $builder->get();
        $row = $query->getResultArray();
        
        return $row;
    }

    //Sélectionner un magsin via son id_stock
    
    public function alerte_by_produit($id_prod){
        $builder = $this;
        $builder->select('id_prod')->where('id_prod',esc($id_prod));
        $query = $builder->get();
        $row = $query->getResultArray();
        
        return $row;
    }

    public function getAlerteInfo()
    {
        $user_id = user_id();
        $db = \Config\Database::connect();
        $builder = $db->table('alerte')->select('alerte.id_al,alerte.id_prod,alerte.id_mag,alerte.dateExp,vu.id_vu,vu.date_vu,vu.id_user,vu.vu')->join('vu', 'vu.id_notif=alerte.id_notif', 'inner')
        ->where(array('vu.vu' => 0, 'vu.id_user' =>esc($user_id)))->orderBy('alerte.id_notif', 'DESC');
        $query = $builder->get();

        // Affichez les résultats
        $result = $query->getResultArray();
        return $result;
    }
}
