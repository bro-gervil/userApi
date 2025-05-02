<?php

namespace App\Models;

use CodeIgniter\Model;

class VuModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'vu';
    protected $primaryKey       = 'id_vu';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_vu','date_vu','id_user','id_notif','vu'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'id_vu';

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
    public function select_notification(){
        $db = \Config\Database::connect();
        $builder = $db->table('notification');
        $builder->selectMax('id_notif');
        $query = $builder->get();
        $row = $query->getRow();
        if (isset($row->id_notif)) {
            return $row->id_notif +1;
        } else {
            return 1;
        }
    }

    //Sauvegarder une nouvelle entrée dans la table vu
    public function save_vu($data){
        $db = \Config\Database::connect();
        $builder = $db->table('vu');

        $builder->insert(esc($data));
    }

    //marquer comme lue une notification
    public function markAsSeen($tablename,$where,$data){        
        $query = $this->db->table($tablename)->where(esc($where))->update(esc($data));
        return $query;
    }

    


}
