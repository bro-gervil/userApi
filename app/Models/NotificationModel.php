<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'notification';
    protected $primaryKey       = 'id_notif';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_notif','contenu','type','date_notif'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_notif';
    protected $updatedField  = '';
    protected $deletedField  = 'id_notif';

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

    //Sauvegarder une nouvelle entrée dans la table livraison
    public function save_notif($data){
        $db = \Config\Database::connect();
        $builder = $db->table('notification');

        $builder->insert(esc($data));
    }

    //Récupérer les notifications non lues par un user
    public function getNotificationsByUser(){ 
        $user_id = user_id();
        $db = \Config\Database::connect();
        $builder = $db->table('notification')->select('*')->join('vu','vu.id_notif=notification.id_notif','inner')
        ->where(array('vu.vu' =>0,'vu.id_user'=>$user_id))->orderBy('notification.id_notif','DESC');
        $query = $builder->get();

        // Affichez les résultats
        $result = $query->getResultArray();
        return $result;
        
    }
   
    //nombre de notifications
    public function NotificationCount(){
        $user_id = user_id();
        $db = \Config\Database::connect();
        $builder = $db->table('notification')->select('*')->join('vu','vu.id_notif=notification.id_notif','inner')
        ->where(array('vu.vu' =>0,'vu.id_user'=>$user_id))->countAllResults();
        return $builder;


    }

    //marquer comme lue une notification
    public function markAsSeen($id_notif){ 
        $id_user = user_id();
        $now = date('Y-m-d h:i:s');
        $db = \Config\Database::connect();
        $builder = $db->table('vu')->set(['vu'=>'1','date_vu'=>$now])->where(array('vu.id_notif' =>esc($id_notif),'vu.id_user'=>$id_user))->update();
        return $builder;

    }
}
