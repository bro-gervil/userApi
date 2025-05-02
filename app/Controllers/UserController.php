<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use CodeIgniter\Shield\Entities\User as UserEntity;
use CodeIgniter\Shield\Models\UserIdentityModel;
use App\Models\UserIdentitiesModel;
use App\Models\UserModel;
use App\Models\GroupModel;
use CodeIgniter\Shield\Validation\ValidationRules;
use App\Models\AlerteModel;

use CodeIgniter\Job\JobInterface;
use CodeIgniter\Job\AbstractJob;
use CodeIgniter\Queue\Job;
use CodeIgniter\Services\QueueService;


use function PHPUnit\Framework\callback;

class UserController extends BaseController
{
    // Page qui affiche le profil utilisateur
    public function profile_user()
    {
        \CodeIgniter\Events\Events::trigger('product_event');
        \CodeIgniter\Events\Events::trigger('is_user_logged');   

        if (auth()->loggedIn()) {
            $user = auth()->user()->username;
            $user_id = auth()->id();
            $initial = $user[0];

            $authentifier = auth()->user()->inGroup('admin'); //SG
            $auth2 = auth()->user()->inGroup('dg'); //DG
            $auth3 = auth()->user()->inGroup('superadmin'); //Admin   
            $test = '';
        }
        if ($authentifier == false) {
            if ($auth2 == false) {

                if ($auth3 == false) {
                    $test = "Utilisateur";
                } else {
                    $test = "Administrateur";
                }
            } else {
                $test = "Directeur Général";
            }
        } else {
            $test = "Surveillant Général";
        }

        $notificationModel = new NotificationModel();
        $notif = $notificationModel->getNotificationsByUser($user_id);
        $nbreNotif = $notificationModel->NotificationCount();
        $alertModel = new AlerteModel();
        $alertes = $alertModel->getAlerteInfo();

        $groupsModel = new GroupModel();
        $UserIdentityModel = new \App\Models\UserIdentitiesModel;

        $users = new UserEntity();

        $data = array();
        $data['users_groups'] = json_encode($groupsModel->selectgroup());
        $data['identities'] = json_encode($UserIdentityModel->getIdentity($users));
        $data['user'] = $user;
        $data['usr'] = $initial;
        $data['notifications'] = $notif;
        $data['permission'] = $test;
        $data['alerts'] = $alertes;
        $data['notif_total'] = $nbreNotif;
        echo view('profile_utilisateur/profile', $data);
    }

    // Page qui affiche le profil de l'administrateur
    public function profile_admin()
    {
        if (auth()->loggedIn()) {
            \CodeIgniter\Events\Events::trigger('product_event');
            \CodeIgniter\Events\Events::trigger('is_user_logged');   

            $user = auth()->user()->username;
            $user_id = auth()->id();
            $initial = $user[0];
        }
        $authentifier = auth()->user()->inGroup('admin'); //SG
        $auth2 = auth()->user()->inGroup('dg'); //DG
        $auth3 = auth()->user()->inGroup('superadmin'); //Admin   
        $test = '';
        if ($authentifier == false) {
            if ($auth2 == false) {

                if ($auth3 == false) {
                    $test = "Utilisateur";
                } else {
                    $test = "Administrateur";
                }
            } else {
                $test = "Directeur Général";
            }
        } else {
            $test = "Surveillant Général";
        }

        $notificationModel = new NotificationModel();
        $notif = $notificationModel->getNotificationsByUser($user_id);
        $nbreNotif = $notificationModel->NotificationCount();
        $alertModel = new AlerteModel();
        $alertes = $alertModel->getAlerteInfo();

        $groupsModel = new GroupModel();
        $UserIdentityModel = new \App\Models\UserIdentitiesModel;

        $users = new UserEntity();

        $data = array();
        $data['users_groups'] = json_encode($groupsModel->selectgroup());
        $data['identities'] = json_encode($UserIdentityModel->getIdentity($users));
        $data['user'] = $user;
        $data['usr'] = $initial;
        $data['notifications'] = $notif;
        $data['alerts'] = $alertes;
        $data['permission'] = $test;
        $data['notif_total'] = $nbreNotif;
        echo view('profile_utilisateur/profile-admin', $data);
    }

    public function return_all_users()
    {
     
        $groupsModel = new GroupModel();
        $UserIdentityModel = new \App\Models\UserIdentitiesModel;

        $user = new UserEntity();

        // Récupérez tous les utilisateurs
        //$data['users'] = $userModel->findAll();
        $data['users_groups'] = $groupsModel->select_allgroups();
        $data['identities'] = $UserIdentityModel->getIdentities($user);
        // Chargez la vue d'administration
        echo json_encode($data);
    }


    public function markAsSeen(){


        if ($this->request->is('post')) {
            if ($this->request->getPost(filter_var('idnotif')) != null) {

                $notif_id = $this->request->getPost(filter_var('idnotif'));
                $notificationModel = new NotificationModel();
                $result = $notificationModel->markAsSeen(array('id_notif' => $notif_id));

                echo json_encode($notif_id);
            }
        }
    }

    public function recup_usernumber(){
        $userModel =  new UserModel();
        $data['total_user'] = $userModel->countAll_users();
        $data['active'] = $userModel->count_users_active();
        $data['deactive'] = $userModel->count_users_deactive();

        echo json_encode($data);
    }

    public function recup_groups(){
        //Récupérer le modèle des groupes
        $groupsModel = model('Myth\Auth\Authorization\GroupModel');

        //Récupérer tous les groupes
        $groups = $groupsModel->findAll();

        echo json_encode($groups);
    }

    public function usernumber_bygroup(){

        $userModel =  new UserModel();
        //Récupérer le modèle des groupes
        $groupsModel = model('Myth\Auth\Authorization\GroupModel');

        //Récupérer tous les groupes
        $groups = $groupsModel->findAll();

        //Compter le nombre d'utilisateurs par groupe
       
    }

    public function countNotifications(){

        if ($this->request->is('post')) {
            $notificationModel = new NotificationModel();
            $nbreNotif = $notificationModel->NotificationCount();

            echo json_encode($nbreNotif);
        }
    }

    public function formatLogin(){
        if ($this->request->is('post')) {

            $full_name= $this->request->getPost(filter_var('fullname'));
            $full_name2 = json_encode($full_name);
            $n3 = strtolower($full_name2);
        
            $n2 = str_replace('%20','',$n3);
            $n11  = substr($n2,0,5);
            $n12  = substr($n2,6,4);

            if(isset($n2)){
                $n =$n11.$n12;
                echo json_encode($n);
            } 
        }
    }

    protected function getValidationRules(): array
    {
        $rules = new ValidationRules();

        return $rules->getRegistrationRules();
    }

    public function create_user()
    {
        if ($this->request->is('post')) {

            $email = $this->request->getPost(filter_var('email_name'));
            $full_name = $this->request->getPost(filter_var('fullname_name'));
            $username = $this->request->getPost(filter_var('login_name'));
            $password = $this->request->getPost(filter_var('password_name'));
            $active = $this->request->getPost(filter_var('activate_name'));
            $group = json_encode($this->request->getPost(filter_var('group_name')));
            $group = json_decode($group);
            $data = [];

        $data['username'] = $username;
        //$data['name'] =$full_name;
        $data['email'] = $email;
        $data['password'] = $password;
        $data['active'] =0;
        $data['status'] = 'banned';

        $admin = [
            'email' => 'bromangervil@gmail.com',
            'title' => 'Administrateur'
        ];
        
        $data2 = [
            'from' => [$admin['email'],$admin['title']],
            'to' => $email,
            'subject' => 'Login d\'accès à l\'application de gestion des kits de laboratoire'
        ];

        //Envoi de l'email
        $emailservice = \Config\Services::email();
        $emailservice->setFrom('bromanger@gmail.com','Administrateur');
        $emailservice->setTo($data2['to']);
        $emailservice->setSubject('Login d\'accès à l\'application de gestion des kits de laboratoire');

        // Charger la vue HTML
        $data3 = [
            'username' => $username,
            'mdp' => $password,
        ]; // Les données à passer à la vue body

        $body = view('email_body', $data3);
        $emailservice->setMessage($body);

        $data2['message'] = $body;

        $userModel = model(UserModel::class);
        $identities = new UserIdentityModel();
        $user = new UserEntity($data);
        //$user->addGroup($group);
        $userModel->save($user);
        $id = $userModel->selectIDuser();
        $identities->forceMultiplePasswordReset([$id]);
        $date = date('Y-m-d H:i:s');
        $userModel->ajoutGroup(['user_id' => $id,'group' => $group,'created_at' => $date]);
        $userModel->insertName($full_name,$id);

        if($emailservice->send()){
            
            echo json_encode('L\'utilisateur "' . $username . '" est créé. Membre du '.$group.' it\'s id is '.$id);  
        }
        else{
            $userModel->save_email(auth()->user()->email,"Administrateur",$data2['to'],'Login d\'accès à l\'application de gestion des kits de laboratoire',$data2['message']);

            echo json_encode('Mail on queue');
        }
       
        }
    }

    public function change_group(){
        if ($this->request->is('post')) {
            $id = $this->request->getPost(filter_var('id_user'));
            $group = $this->request->getPost(filter_var('group'));

            $userModel = model(UserModel::class);
            $date = date('Y-m-d H:i:s');
            if($userModel->updateGroup($id,$group,$date)){
                echo json_encode("L'utilisateur a changé de groupe");
            }
            else{
                echo json_encode("L'utilisateur n'a pas pu changer de groupe");
            }
        }
        else{
            echo view('error-404');
        }
    }

    public function change_password_personal()
    {
        if ($this->request->is('post')) {
            $password = (string)$this->request->getPost(filter_var('password'));
            $motDePasse = base64_decode($password);
            $identities = new UserIdentitiesModel();
            if($identities->change_selfuser_passwd($motDePasse) == true){
                echo json_encode('ok');
            }
            else{
                echo json_encode('non il y a erreur');
            }

        }
        else{
            echo view('error-404');
        }
    }

    public function changeownmail(){
        if ($this->request->is('post')) {
            $mail = esc((string)$this->request->getPost(filter_var('mail')));

            $identities = new UserIdentitiesModel();
            if ($identities->change_selfuser_mail($mail) == true) {

                echo json_encode(['response' => 'mail changé']);
            } else {
                echo json_encode(['response' => 'mail non-changé']);
            }
        }
        else{
            echo view('error-404');
        }
    }

    public function check_oldpassword(){
        if ($this->request->is('post')) {
            $password = (string)$this->request->getPost(filter_var('oldpassword'));
            $motDePasse = base64_decode($password);

            $identities = new UserIdentitiesModel();
            if($identities->checking_old_password($motDePasse)==true){

                echo json_encode(['response'=>'ok']);
            }
            else{
                echo json_encode(['response'=>'password incorrect']);
            }
        }
        else{
            echo view('error-404');
        }
    }

    public function deactivate(){

        if ($this->request->is('post')) {
            $id = $this->request->getPost(filter_var('id_user'));
            //Créer une instance du modèle User
            $userModel = new UserModel();

            //Trouver l'utilisateur par son id
            $user = $userModel->find($id);

            //Vérifier si l'utilisateur existe

            if ($user) {
                //Désactiver l'utilisateur
                $user->deactivate();
                $user->ban();
                //Enregistrer l'utilisateur en base
                $userModel->save($user);
                echo json_encode('Utilisateur désactivé !');
            } else {
                //Afficher un message d'erreur 
                echo json_encode('Utilisateur introuvable !');
            }
        }
        else{
            echo view('error-404');
        }
    }

    public function activate(){

        if ($this->request->is('post')) {
            $id = $this->request->getPost(filter_var('id_user'));
            //Créer une instance du modèle User
            $userModel = new UserModel();

            //Trouver l'utilisateur par son id
            $user = $userModel->find($id);

            //Vérifier si l'utilisateur existe
        
            if ($user) {
                //Activer l'utilisateur
                $user->activate();
                $user->unBan();
                //Enregistrer l'utilisateur en base
                $userModel->save($user);
                echo json_encode('Utilisateur activé !');
            } else {
                //Afficher un message d'erreur 
                echo json_encode('Utilisateur introuvable !');
            }
        }
        else{
            echo view('error-404');
        }
    }


    public function delete_user(){

        if ($this->request->is('post')) {
            $id = $this->request->getPost(filter_var('id_user'));
            //Créer une instance du modèle User
            $userModel = new UserModel();

            //Trouver l'utilisateur par son id
            $user = $userModel->find($id);

            //Vérifier si l'utilisateur existe
        
            if ($user) {
                //Supprimer  l'utilisateur en softDelete
                $userModel->delete($user->id,false);
                // bannir le compte au système.
                $user->ban('Ce compte a été supprimé');
                echo json_encode('Utilisateur supprimé !');
            } else {
                //Afficher un message d'erreur 
                echo json_encode('Utilisateur introuvable !');
            }
        }
        else{
            echo view('error-404');
        }
    }

    public function reset_password(){

        if ($this->request->is('post')) {
            $id = $this->request->getPost(filter_var('id_user'));
            //Créer une instance du modèle User
            $userModel = new UserModel();

            //Trouver l'utilisateur par son id
            $user = $userModel->find($id);

            //Vérifier si l'utilisateur existe
        
            if ($user) {

                // Forcer la réinitialisation du mot de passe du compte.
                $user->forcePasswordReset();
                echo json_encode("Le mot de passe sera réinitialisé");
            } else {
                //Afficher un message d'erreur 
                echo json_encode('Utilisateur introuvable !');
            }
        }
        else{
            echo view('error-404');
        }
    }

    public function afterLogin(){
        \CodeIgniter\Events\Events::trigger('is_user_logged');   

        echo view('forgot-password');
    }

}