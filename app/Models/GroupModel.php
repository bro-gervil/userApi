<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\GroupModel as ShieldUserModel;

class GroupModel extends ShieldUserModel
{

    protected function initialize(): void
    {
        parent::initialize();
        $this->table = $this->tables['groups_users'];

    }

    public function select_allgroups()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('auth_groups_users')->select(['*'])
        ->join('users','users.id = auth_groups_users.user_id','inner')->where('users.deleted_at',null);
        $builder = $builder->get();
        return $builder->getResultArray();
    }

    public function selectgroup()
    {
        $db = \Config\Database::connect();
        $user_id = user_id();
        $builder = $db->table('auth_groups_users')->select(['*'])
        ->join('users','users.id = auth_groups_users.user_id','inner')->where(['users.deleted_at'=>null,'users.id'=>$user_id]);
        $builder = $builder->get();
        return $builder->getResultArray();
    }
  
    public function logged_in_or_not($id){ //Cette fonction marque un utiliseur comme étant en ligne
        $db = \Config\Database::connect();
       
        $builder = $db->table('users')->update(['logged_in'=>1],array('id'=>$id));
            return $builder;
    }

    public function logged_in_not($id){  //Efface le statut "en ligne"
        $db = \Config\Database::connect();
            
            $builder = $db->table('users')->update(['logged_in'=>0],array('id'=>$id));
            return $builder;
    }
    
}
