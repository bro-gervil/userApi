<?php  

namespace  App\Controllers;
use App\Models\UserModel;
use App\Controllers\Pages;
use App\Models\CategorieModel;
use App\Models\FormAddMagasinModel;
use App\Models\Prod_stockModel;
use App\Models\bonLivraisonModel;
use App\Models\NotificationModel;
use App\Models\PosteModel;
use App\Models\MagasinModel;
use App\Models\AlerteModel;

class AfterLoginController extends BaseController{
    public function after_login()
    {
        if (auth()->loggedIn()) {
            $user = auth()->user()->username;
            $user_id = auth()->id();
            $userModel = new UserModel();
            //$userModel->updatelogin($user_id);

           
            // Déclenchement de notre événement ici
            \CodeIgniter\Events\Events::trigger('product_event');
            \CodeIgniter\Events\Events::trigger('stock_event');
            \CodeIgniter\Events\Events::trigger('is_user_logged');   
           
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
        $notif = $notificationModel->getNotificationsByUser();
        $alertModel = new AlerteModel();
        $alertes = $alertModel->getAlerteInfo();
        $LivraisonModel = new \App\Models\LivraisonModel();
        $nbreLivraison = $LivraisonModel->countLivraison();
        $LivraisonbyMonth = $LivraisonModel->countLivraisonbyMonth();
        $nbreNotif = $notificationModel->NotificationCount();
        $posteModel = new PosteModel();
        $post = $posteModel -> tous_postes();

        $magasinModel = new MagasinModel();
        $magas = $magasinModel ->tous_magasins();
     
        $data = array();
       
        $data['user'] = $user;
        $data['nbreLivraison'] = $nbreLivraison;
        $data['livraisonMonth'] = $LivraisonbyMonth;
        $data['usr'] = $initial;
        $data['permission'] = $test;
        $data['poste'] = $post;
        $data['magasin'] = $magas;
        $data['alerts'] = $alertes;
        $data['notifications'] = $notif;

        $data['notif_total'] = $nbreNotif;

        echo view('index', $data);
       
        //$data['id'] = auth()->user()->id;
        //echo view('error-404',$data);
    }

}