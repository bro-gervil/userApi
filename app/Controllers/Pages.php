<?php 
namespace App\Controllers;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../vendor/autoload.php");

use Dompdf\Dompdf;
use Dompdf\Options;

use App\Models\CategorieModel;
use App\Models\FormAddMagasinModel;
use App\Models\Prod_stockModel;
use App\Models\bonLivraisonModel;
use App\Models\NotificationModel;
use App\Models\PosteModel;
use App\Models\MagasinModel;
use App\Models\AlerteModel;
use App\Models\ComptageModel;
use App\Models\InventoryModel;
use App\Models\SuiviStockModel;
use App\Models\CondModel; 

// La méthode view($page = 'home') accepte un paramètre qui est le nom de la page à charger
//Les corps de pages statiques seront situés dans le répertoire app/Views/pages
// Vous pouvez créer deux fichiers nommés home.php et about.php dans ce répertoire


//Dans cet exemple, le contrôleur Home a une méthode index(). Cette méthode vérifie si le premier segment de l’URI est vide, ce qui signifie que vous êtes sur la page d’accueil. Si c’est le cas, alors il charge les vues pour la page d’accueil.
// Vous pouvez remplacer echo view('home'); par le code spécifique à votre page d’accueil.

class Pages extends BaseController {

    //Afficher la page d'accueil 
    public function index()
    {
        $it = \Config\Services::iterator();
    
        if (auth()->loggedIn()) {
            $user = auth()->user()->username;
            $user_id = auth()->id();

            //Events::trigger('product_event');
             // Déclenchez votre événement ici
        \CodeIgniter\Events\Events::trigger('product_event');
        \CodeIgniter\Events\Events::trigger('stock_event');
        \CodeIgniter\Events\Events::trigger('mailing');
   
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
        $name_poste = $posteModel->les_postes();
        $magasinModel = new MagasinModel();
        $magas = $magasinModel ->tous_magasins();
     
        $data = array();
       
        $data['user'] = $user;
        $data['nbreLivraison'] = $nbreLivraison;
        $data['livraisonMonth'] = $LivraisonbyMonth;
        $data['usr'] = $initial;
        $data['permission'] = $test;
        $data['poste'] = $post;
        $data['nom_poste'] = $name_poste;
        $data['magasin'] = $magas;
        $data['alerts'] = $alertes;
        $data['notifications'] = $notif;

        $data['notif_total'] = $nbreNotif;
        $uri = service('uri');



        if ($uri->getSegment(1) == '') {
           $time = $it->run(2000);
           $data['time']=$time;
            //echo view('templates/acc',$data);
            echo view('index', $data);
        }
    
    }

    //Modifier le comptage physique d'un stock
    public function compt_physique(){

        if ($this->request->getPost(filter_var('compt_phys')) != null) {
            $data1 =  $this->request->getPost(filter_var('compt_phys'));
            $data2 =  $this->request->getPost(filter_var('id'));
            $data3 =  $this->request->getPost(filter_var('qtite_prod'));
            $ecart = 0;

            if( $data3 > $data1){
                $ecart =   $data3 - $data1;
            }
            else{
                $ecart =   $data1 - $data3;
            }

            $model = new ComptageModel();
            $model->update_comptage($data2,$data1,$ecart);

            echo json_encode("ok");
        }
        else{
            echo json_encode("échoué");
        }
    }

    //Page qui affiche le suivi des stocks
    public function suivi()
    {
        \CodeIgniter\Events\Events::trigger('product_event');
        \CodeIgniter\Events\Events::trigger('stock_event');
        \CodeIgniter\Events\Events::trigger('is_user_logged');     
        if (auth()->loggedIn()) {
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
        $data = array();
        $notificationModel = new NotificationModel();
        $posteModel = new PosteModel();
        $post = $posteModel -> tous_postes();

        $magasinModel = new MagasinModel();
        $magas = $magasinModel ->tous_magasins();
                  
        $notif = $notificationModel->getNotificationsByUser($user_id);
        $nbreNotif = $notificationModel->NotificationCount();
        $alertModel = new AlerteModel();
        $alertes = $alertModel->getAlerteInfo();

        $data['alerts'] = $alertes;
        $data['notif_total'] = $nbreNotif;
      
        $data['user'] = $user;
        $data['poste']=$post;
        $data['usr'] = $initial;
        $data['poste'] = $post;
        $data['magasin'] = $magas;
        $data['permission'] = $test;

        $data['notifications'] = $notif;

        //Elements du tableau suivi de stock
        $suiviModel = new SuiviStockModel();
        $data['suivi'] = $suiviModel->getAllSuivi();
        echo view('control/suivi', $data);
    }

      //Page qui affiche le suivi des stocks
      public function inventaire()
      {
          \CodeIgniter\Events\Events::trigger('product_event');
          \CodeIgniter\Events\Events::trigger('stock_event');
          \CodeIgniter\Events\Events::trigger('is_user_logged');     
          if (auth()->loggedIn()) {
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
          $data = array();
          $notificationModel = new NotificationModel();
          $posteModel = new PosteModel();
          $post = $posteModel -> tous_postes();
  
          $magasinModel = new MagasinModel();
          $magas = $magasinModel ->tous_magasins();
                    
          $notif = $notificationModel->getNotificationsByUser($user_id);
          $nbreNotif = $notificationModel->NotificationCount();
          $alertModel = new AlerteModel();
          $alertes = $alertModel->getAlerteInfo();
  
          $data['alerts'] = $alertes;
          $data['notif_total'] = $nbreNotif;
        
          $data['user'] = $user;
          $data['poste']=$post;
          $data['usr'] = $initial;
          $data['poste'] = $post;
          $data['magasin'] = $magas;
          $data['permission'] = $test;
  
          $data['notifications'] = $notif;

        //Elements de l'inventaire
        $inventoryModel = new InventoryModel();
        $data['inventory'] = $inventoryModel->getInventory();
          
          echo view('control/inventaire', $data);
      }

      public function jsonInventory(){
        //Elements de l'inventaire
        $inventoryModel = new InventoryModel();
        $data= $inventoryModel->getInvent();
        echo json_encode($data);
      }

    // Page qui affiche les postes
    public function formAjoutP()
    {
        \CodeIgniter\Events\Events::trigger('product_event');
        \CodeIgniter\Events\Events::trigger('stock_event');
        \CodeIgniter\Events\Events::trigger('is_user_logged');     
        if (auth()->loggedIn()) {
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
        $data = array();
        $notificationModel = new NotificationModel();
        $posteModel = new PosteModel();
        $post = $posteModel -> tous_postes();

        $magasinModel = new MagasinModel();
        $magas = $magasinModel ->tous_magasins();
                  
        $notif = $notificationModel->getNotificationsByUser($user_id);
        $nbreNotif = $notificationModel->NotificationCount();
        $alertModel = new AlerteModel();
        $alertes = $alertModel->getAlerteInfo();

        $data['alerts'] = $alertes;
        $data['notif_total'] = $nbreNotif;
      
        $data['user'] = $user;
        $data['poste']=$post;
        $data['usr'] = $initial;
        $data['poste'] = $post;
        $data['magasin'] = $magas;
        $data['permission'] = $test;

        $data['notifications'] = $notif;
        echo view('poste_ajouterP/formAjoutP', $data);
    }

//Récupérer tous les produits magasin 1
    public function tabloadAll($stock){
        $stock= $this->request->getUri()->getSegment(2);

         $model = new CategorieModel();
            $data['categorie'] = $model->select(['id_catg', 'libelle'])->findAll();
            $model_x = new FormAddMagasinModel();
            $data= $model_x->getData1Prod($stock);

        echo json_encode($data);
    }

//Pour récupérer le dernier produit ajouté au Magasin 1
     public function tabloadOne(){
        
          $model = new CategorieModel();
            $data['categorie'] = $model->select(['id_catg','libelle'])->findAll();

            $model_x = new FormAddMagasinModel();

            $data_x= $model_x->getFData1Prod(11);

            //$data['produits']=$data_x;
            foreach ($data_x as $key => $data_x) {
                $data=array(
                    'Id' => $data_x['id_prod'],
                    'Produit' => $data_x['desc'],
                    'Catégorie' => $data_x['libelle'],
                    'Quantité' => $data_x['qtite_prod'],
                    'Ajouté le:' => $data_x['dateC'],
                    'Expire le:' => $data_x['dateExp'],
                );
                echo json_encode($data);
            }
        
       
    }

    //Pour afficher une page Magasin
    public function liste_produit_magasin($id_stock,$id_mag)
    {   \CodeIgniter\Events\Events::trigger('product_event');
        \CodeIgniter\Events\Events::trigger('stock_event'); 
        \CodeIgniter\Events\Events::trigger('is_user_logged');   

        $id_stock= $this->request->getUri()->getSegment(3);
        $id_mag= $this->request->getUri()->getSegment(2);
        $model_z = new MagasinModel();
        $num_mag = $model_z->select('num_magasin')->where('id_mgsin',$id_mag)->first();

        if (auth()->loggedIn()) {
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
        $data = array();

        $notificationModel = new NotificationModel();
        $notif = $notificationModel->getNotificationsByUser($user_id);
        $nbreNotif = $notificationModel->NotificationCount();
        $alertModel = new AlerteModel();
        $alertes = $alertModel->getAlerteInfo();
        $data['alerts'] = $alertes;
        
        $data['notif_total'] = $nbreNotif;
        $data['user'] = $user;
        $data['usr'] = $initial;
        $data['notifications'] = $notif;

        $model = new CategorieModel();
        $data['categorie'] = $model->select(['id_catg', 'libelle'])->findAll();

        //récupérer tous les conditionnments de produits dans la table conditionnement
        $model = new CondModel();
        $data['conditionnement'] = $model->select(['id_unite', 'libelle'])->findAll();

        $datenow = date("Y-m-d");
        $model_x = new FormAddMagasinModel();

        $data_x = $model_x->getData1Prod($id_stock, $datenow);

        $data['produits'] = $data_x;
        $data['id_stock'] = $id_stock;
        $data['num_magasin']='Magasin N°'.$id_mag;
        $data['id_mag'] = $id_mag;
        if($num_mag !=null){
            $data['nummag'] = $num_mag['num_magasin'];
        }
        else{
            $data['nummag'] = "Aucun lieu de stockage";
        }
        $data['permission'] = $test;
        echo view('magasin/liste_produit_magasin', $data);
    }

//Pour récupérer un produit du magasin 1 par son id
        public function getCharger($id,$idstock){
           $id= $this->request->getUri()->getSegment(3);
           $idstock= $this->request->getUri()->getSegment(5);
           $idprod_stock= $this->request->getUri()->getSegment(4);
            $model_x = new FormAddMagasinModel();
            $data_x= $model_x->getOneData1Prod($id,$idprod_stock,$idstock);
          
            foreach ($data_x as $key => $data_x) {
                $data=array(
                    'Idp' => $id,
                    'Produit' => $data_x['desc'],
                    'Catégorie' => $data_x['libelle'],
                    'Quantité' => $data_x['qtite_prod'],
                    'Expire le:' => $data_x['dateExp'],
                );
                echo json_encode($data);
            }
           
           
        }

//Pour effectuer l'updating du produit sélectionné dans un Magasin
    public function getUpdateprod_magasin(){
         
        if($this->request->is('post')){
            if ($this->request->getPost(filter_var('d_exp')) != null) {

                try {


                    $data_1 = [
                        'id_prod' => $this->request->getPost(filter_var('id_pro')),
                        'designation' => $this->request->getPost(filter_var('prdt')),
                        'id_catG'  => $this->request->getPost(filter_var('ctg')),
                        'quantite'  => $this->request->getPost(filter_var('qte')),
                        'dateExp' => $this->request->getPost(filter_var('d_exp')),

                    ];
                    $model_1 = new FormAddMagasinModel();
                    $model_2 = new Prod_stockModel();

                    if ($model_1->updateDataMag("produit", array("desc" => $data_1['designation'], "id_catG" => $data_1['id_catG'], "dateExp" => $data_1['dateExp']), array('id_prod' => $data_1['id_prod']))) {


                        $data_2 = [
                            'id_prod' => $this->request->getPost(filter_var('id_pro')),
                            'qtite_prod'  => $this->request->getPost(filter_var('qte')),
                            'id_stock'  => $this->request->getPost(filter_var('id_stk')),
                        ];

                        $model_2->updateStockMag('prod_stock', array("qtite_prod" => $data_2['qtite_prod']), array('id_prod' => $data_1['id_prod'], "id_stock" => $data_2['id_stock']));
                        session()->setFlashdata('id_produit', $data_1['id_prod']);
                        return redirect()->to(base_url('magasin/liste_produit_magasin'));
                    } else {
                        return redirect()->to(base_url('magasin/liste_produit_magasin'));
                    }
                } catch (\Exception $th) {
                    echo $th->getMessage();
                }

                echo json_encode($data_1);
            } elseif ($this->request->getPost(filter_var('d_exp')) == null) {
                try {


                    $data_1 = [
                        'id_prod' => $this->request->getPost(filter_var('id_pro')),
                        'designation' => $this->request->getPost(filter_var('prdt')),
                        'id_catG'  => $this->request->getPost(filter_var('ctg')),
                        'quantite'  => $this->request->getPost(filter_var('qte')),

                    ];
                    $model_1 = new FormAddMagasinModel();
                    $model_2 = new Prod_stockModel();

                    if ($model_1->updateDataMag("produit", array("desc" => $data_1['designation'], "id_catG" => $data_1['id_catG']), array('id_prod' => $data_1['id_prod']))) {


                        $data_2 = [
                            'id_prod' => $this->request->getPost(filter_var('id_pro')),
                            'qtite_prod'  => $this->request->getPost(filter_var('qte')),
                            'id_stock'  => $this->request->getPost(filter_var('id_stk')),
                        ];

                        $model_2->updateStockMag('prod_stock', array("qtite_prod" => $data_2['qtite_prod']), array('id_prod' => $data_1['id_prod'], "id_stock" => $data_2['id_stock']));
                        session()->setFlashdata('id_produit', $data_1['id_prod']);
                        return redirect()->to(base_url('magasin/liste_produit_magasin'));
                    } else {
                        return redirect()->to(base_url('magasin/liste_produit_magasin'));
                    }
                } catch (\Exception $th) {
                    echo $th->getMessage();
                }

                echo json_encode($data_1);
            }
        }
    } 
    
    public function print_pdf() {
        try {
            // Récupérez le contenu HTML de la requête AJAX
            $divContent = $this->request->getPost('divContent');

            if(!isset($divContent) || empty($divContent) || $divContent==null || $divContent=''){
               echo('vide');
                
            }
             $pdf = new Dompdf();       
            
                $pdf->loadHtml($divContent);
                $pdf->setPaper('A4','portrait'); //Configuration du papier en orientation portrait
                $pdf->render();
                $pdf->stream("file.pdf", array("Attachment" => false));
                exit(0);     
        } 
        
        catch (\Throwable $e) {
            // Si une exception est lancée, vous pouvez la gérer ici
            echo 'Erreur : ' . $e->getMessage();
        }
        
       
        //$divContent = "coucou";
       
    }

    public function pdf() {
        //$divContent= $this->request->getUri()->getSegment(2);    
        // Récupérez le contenu HTML de la requête AJAX
        $divContent =$this->request->getPost('divContent');
        //$options = new Options();
        //$options->set('isRemoteEnabled', true);
        $data['contenu'] = $divContent;
        $session = session();
        $session->setTempdata('div',$divContent);
        if(isset($divContent)){
            echo $divContent;            
        }
        else{
            echo "Error loading";
        }
    }

    public function p_contenu()
    {

        // Création des options
        $options = new Options();
        $options->set('debugKeepTemp', TRUE);
        $options->set('isHtml5ParserEnabled', TRUE);

        // Création de l'instance Dompdf avec les options
        $pdf = new Dompdf($options);

        // Récupération du contenu HTML
        $divContent = $this->request->getPost('contenu');
        $idlivr = $this->request->getPost('idlivr');
        $nbreprod = $this->request->getPost('nbre_prod');
        $idposte = $this->request->getPost('id_poste');
        $poste = null;
        $alea = random_int(1,10000);
        $model = new bonLivraisonModel();

        if ($divContent) {
            // Chargement du contenu HTML dans Dompdf
            $pdf->loadHtml($divContent);

            // Configuration du format du papier
            $pdf->setPaper('A4', 'portrait');

            // Rendu du PDF
            $pdf->render();

            // Obtention du contenu du PDF sous forme de chaîne
            $pdfContent = $pdf->output();

             switch ($idposte) {
                case 1:
                    $poste = "biochimie";
                    break;
                case 2:
                    $poste = "hemato";
                    break;
                case 3:
                    $poste = "parasito";
                    break;
                case 4:
                    $poste = "sero";
                    break;
                case 5:
                    $poste = "microbio";
                    break;
                default:
                    break;
            }

            // Définition du chemin où vous souhaitez stocker le PDF
            $pdfname = "/bon_Livraison n°".$idlivr.$nbreprod.date('Y-m-d').$idposte.$alea.".pdf";
            $pdfPath = "../../public/partials/".$poste.$pdfname;


             $data = [
                'id_livr' => $idlivr,
                'id_poste' => $idposte,
                'file_path' => $pdfPath,
            ];

            $model->save_bonlivraison($data);

            // Écriture du contenu du PDF dans un fichier
            file_put_contents($pdfPath, $pdfContent);

            // Envoi de l'URL du PDF en réponse à la requête AJAX
            echo base_url('partials/'.$poste.$pdfname);
        } else {
            echo 'Error';
        }
    }

    public function quit(){
        $groupsModel = new \App\Models\GroupModel();
        $groupsModel->logged_in_not(user_id());
        $a = redirect()->to('/logout');
        echo json_encode($a);
    }

}