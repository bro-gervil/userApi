<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{

    protected function initialize(): void
    {
        parent::initialize();
        $this->table = $this->tables['users'];

    }

    public function select_allUSers()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users')->select('*');
        $builder = $builder->get();
        return $builder->getResultArray();
    }

    public function ajoutGroup($data){
        $db = \Config\Database::connect();
        $builder = $db->table('auth_groups_users')->insert(esc($data));
        return $builder;
    }

    public function updateGroup($id,$group,$date){
        $db = \Config\Database::connect();
        $builder = $db->table('auth_groups_users')->update(['group'=>$group,'created_at'=>$date],['user_id'=>$id]);
        return $builder;
    }

    //Cette fonction met true dans la base de données lorsqu'un utilisateur est connecté
    public function updatelogin($id)
    {
        $db = \Config\Database::connect();
        if(auth()->loggedIn()){
            $builder = $db->table('users')->update(['logged_in' => '1'], ['id' => $id]);
        }
        else{
            $builder = $db->table('users')->update(['logged_in' => '0'], ['id']);
        }
        return $builder;
    }

    //Cette fonction met false dans la base de données lorsqu'un utilisateur est déconnecté
    public function updateloginfalse($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users')->update(['logged_in' => '0'], ['id' => $id]);
        return $builder;
    }

    public function insertName($data,$id){
        $db = \Config\Database::connect();
        $buider = $db->table('auth_identities')->update(['name'=>esc($data)],['user_id'=>esc($id)]);
        return $buider;
    }

    public function selectIDuser(){
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->selectMax('id');
        $query = $builder->get();
        $row = $query->getRow();

        if (isset($row->id)) {
            return $row->id;
        }
    }

    public function countAll_users(){
        $db = \Config\Database::connect();
        $builder = $db->table('users')->countAll();
        return $builder;
    }

    public function count_users_active(){
        $db = \Config\Database::connect();
        $builder = $db->table('users')->select('id')->where(['logged_in'=>1])->countAllResults();
        return $builder;
    }

    public function count_users_deactive(){
        $db = \Config\Database::connect();
        $builder = $db->table('users')->select('id')->where(['active'=>0])->countAllResults();
        return $builder;
    }

    //Sauvegarde de mail dans la bdd
    public function save_email($from,$name_from,$to,$subj,$message){
        $db = \Config\Database::connect();
        $builder = $db->table('email')->insert(array('froms' => $from,'name_from'=>$name_from,'tos' => $to, 'subjects'=>$subj, 'messages'=>$message));
        return $builder;
    }

        //Sauvegarde de mail dans la bdd
        public function send_mails(){
            $db = \Config\Database::connect();
            $builder = $db->table('email')->select('*')->where(array('send' =>0))->get()->getResultObject();
        
            foreach($builder as $builder){
                $from = $builder->froms;
                $name_from = $builder->name_from;
                $to = $builder->tos;
                $subj = $builder->subjects;
                $message = $builder->messages;

                //Envoi de l'email
                $emailservice = \Config\Services::email();
                $emailservice->setFrom($from,$name_from);
                $emailservice->setTo($to);
                $emailservice->setSubject($subj);
                $emailservice->setMessage($message);

                if($emailservice->send()){
                    $build = $db->table('email')->update(['send'=>1]);
                    return $build;
                    json_encode('success');
                }
                else
                    json_encode('error');

            }
        }
    
}
