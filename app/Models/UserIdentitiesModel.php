<?php

namespace App\Models;

use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserIdentityModel;

class UserIdentitiesModel extends UserIdentityModel
{

    public function getIdentities(User $user): array
    {
        return $this->where('type','email_password')->orderBy($this->primaryKey)->findAll();
    }

    public function getIdentity(User $user): array
    {
        $user_id = user_id();
        return $this->where(['type'=>'email_password',"user_id"=>$user_id])->orderBy($this->primaryKey)->findAll();
    }

    public function change_selfuser_passwd($passwords){
        $passwd = service('passwords');
        $user_id = user_id();
        $db = \Config\Database::connect();
        $builder = $db->table('auth_identities');
        if($builder->update(['secret2' => $passwd->hash($passwords)],['user_id' => $user_id])){
            return true;
        }
        else{
            false;
        }
    }

    public function change_selfuser_mail($mail){
        $user_id = user_id();
        $db = \Config\Database::connect();
        $builder = $db->table('auth_identities');
        if ($builder->update(['secret' =>esc($mail)], ['user_id' => $user_id])) {
            return true;
        } else {
            false;
        }
    }

    public function checking_old_password($oldpassword){
        $passwd = service('passwords');
        $hashvalue = $passwd->hash($oldpassword);
        $user_id = user_id();
        $db = \Config\Database::connect();
        $builder = $db->table('auth_identities');
        $resultat = $builder->select('secret2')->where('user_id', $user_id)->get()->getRow();
        
            if(password_verify($oldpassword,$resultat->secret2)){
                return true;
            }
            else{
                return false;
            }
    

    }

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
