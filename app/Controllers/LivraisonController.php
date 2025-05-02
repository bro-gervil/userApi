<?php

namespace App\Controllers;

use App\Models\PosteModel;
use App\Models\bonLivraisonModel;
use App\Models\ComptageModel;
use App\Models\LivraisonDetailModel;

use Dompdf\Options;
use Dompdf\Dompdf;

use App\Models\LivraisonModel;
use App\Models\Prod_stockModel;
use App\Models\SortieStockModel;
use App\Models\SuiviStockModel;

class LivraisonController extends BaseController
{
    public function save_livraison(){
        if ($this->request->is('post')) {
            // Récupération
            $tab = $this->request->getPost('tab');
            $nbreprod = $this->request->getPost('nbre_prod');
            $idp = $this->request->getPost('id_poste');
            $user = auth()->user()->username;
            $datelivr = date('Y-m-d');

            $datas = [
                'id_poste' => $idp,
                'nbre_prod' => $nbreprod,
                'date_livr' => $datelivr,
                'livreur' => $user,
            ];
            $model1 = new LivraisonDetailModel();
            $model3 = new Prod_stockModel();
            $model2 = new LivraisonModel();
            $model_5 = new SortieStockModel();
            $model_6 = new SuiviStockModel();
            $model_7 = new ComptageModel();
            $sort_stock_totals = [];
            $sort_stock_totals2 = [];
            $sort_dispo = [];
            foreach ($tab as $data) {
                $model1->save_livraisonDetail($data['id_prod'], $data['id_magasin'],$data['qtite_livr'], $data['id_livr']);

                //met à jour la sortie de stock
                $data_3 = array(
                    "id_prod" => $data['id_prod'],
                    "id_prod_stock" => $data['id_prod_stock'], 
                    "qtite_sortie" => $data['qtite_livr'],
                );
                $model_5->insert($data_3);
                $id_prod = $data['id_prod'];
                if(!isset($sort_stock_totals[$id_prod])){
                    //Met à jour le suivi de stock pour le produit sorti
                    $suivi = $model_6->toselectSuivi($data['id_prod']);
                    $co = $model_7->toselectCompt($data['id_prod']);
                    $sort_stock_totals[$id_prod] = $suivi['sort_stock'];
                    $sort_stock_totals2[$id_prod] = 0;
                    $sort_dispo[$id_prod] = $suivi['stock_phys_dispo'];
                }
                $sort_stock_totals[$id_prod] += $data['qtite_livr'];
                 $sort_stock_totals2[$id_prod] += $data['qtite_livr'];
               
                $data_for_suivi = array(
                    "sort_stock" => $sort_stock_totals[$id_prod],
                    "stock_phys_dispo" => $sort_dispo[$id_prod] - $sort_stock_totals2[$id_prod],
                );
                $data_for_compt = array(
                    "stock_theor" => $data_for_suivi['stock_phys_dispo'],
                    "compt" => $data_for_suivi['stock_phys_dispo'], //Corriger cette partie du code
                    "ecart" => 0,
                );
                $model_6->update($suivi['id_suivi'], $data_for_suivi);
                $model_7->update($co['id'], $data_for_compt);


            }
            $model2->save_livraison($datas);
            //echo json_encode($id);
            $model3->updateQtiteMoins('prod_stock', $tab);
            $date = date("Y-m-d H:i:s");

            $model_1 = new \App\Models\FormAddMagasinModel();
            $model_1->historize('Livraison de produits en ' . $this->request->getPost(filter_var('poste')), $date);
        } else {
            echo view('error-4040');
        }
    }

    public function id_livraison(){
        $model_livr = new LivraisonModel();   
        $id = $model_livr->select_idlivraison();
        $data['id_livr'] = $id;
        $data['date_livr'] = $id;
       
        echo json_encode($data);
    }

    public function save_file()
    {

        // Création des options
        $options = new Options();
        $options->set('debugKeepTemp', TRUE);
        $options->set('isHtml5ParserEnabled', TRUE);

        // Création de l'instance Dompdf avec les options
        $pdf = new Dompdf($options);

        // Récupération du contenu HTML
        $idlivr = $this->request->getPost('idlivr');
        $nbreprod = $this->request->getPost('nbre_prod');
        $divContent = $this->request->getPost('contenu');
        $idposte = $this->request->getPost('id_poste');
        $model = new bonLivraisonModel();
        $poste = "";
        $alea = random_int(1,10000);

        if ($divContent) {
            // Chargement du contenu HTML dans Dompdf
            $pdf->loadHtml($divContent);

            // Configuration du format du papier
            $pdf->setPaper('A4', 'portrait');

            // Rendu du PDF
            $pdf->render();

            // Obtention du contenu du PDF sous forme de chaîne
            $pdfContent = $pdf->output();

            $posteModel = new PosteModel();
            $poste = $posteModel -> un_poste($idposte); 

             // Définition du chemin où vous souhaitez stocker le PDF
            $pdfPath = "../public/partials/".$poste."/Bon de livraison_numero ".$idlivr.$nbreprod.date('Y-m-d').$poste.$alea.".pdf";
            $data = [
                'id_livr' => $idlivr,
                'id_poste' => $idposte,
                'file_path' => $pdfPath,
            ];
             // Écriture du contenu du PDF dans un fichier
            file_put_contents($pdfPath, $pdfContent);

            $model ->save_bonlivraison($data);
           
            // Envoi de l'URL du PDF en réponse à la requête AJAX
            echo $pdfPath;
        } else {
            echo 'Error';
        }
    }

    /* Fonction pour récupérer les éléments à afficher dans le tableau de l'inventaire dans le modal.*/
    public function recup_infolivraison(){

        $id_poste = $this->request->getGet('id_poste');

        $modelBonL = new bonLivraisonModel();

        $resultat = $modelBonL ->select_idbonLivaison(array('bonLivraison.id_poste'=>$id_poste));
        
      
        echo json_encode($resultat);
    }

    public function doc_livraison()
    {
        $id_poste = $this->request->getGet('id_poste');
        $modelL = new LivraisonModel();
        $modelBonL = new bonLivraisonModel();

        $resultat = $modelBonL->select_idbonLivaison(array('bonLivraison.id_poste' => $id_poste));
        $datelivraison = $modelL->select_dateLivraison(array('livraison.id_poste' => $id_poste));

        $data = []; // Initialisez $data en dehors de la boucle

        // Assurez-vous que le nombre de résultats correspond au nombre de dates de livraison.
        if (count($resultat) === count($datelivraison)) {
            foreach ($resultat as $index => $resultat) {

                // Convertissez l'objet en tableau (si c'est un objet)
                $resultat = (array) $resultat;


                $chaine = $resultat['file_path'];
                //Une expression régulière par sa fonction récupérer une partie d'une chaine de caractère
                preg_match('/Bon de livraison_numero \d+-\d+-\d+\d+/', $chaine, $matches);

                if (!empty($matches)) {

                    $data[] =  array(
                            'document' => $matches[0],
                            'date_livr' => $datelivraison[$index]->date_livr, // Utilisez l'index pour obtenir la date correspondante.
                        );
                }
            }
        } else {
            // Gérez le cas où le nombre de résultats ne correspond pas.
            echo json_encode(['error' => 'Le nombre de documents ne correspond pas au nombre de dates de livraison.']);
            return;
        }

        if (!empty($data)) {
            echo json_encode($data);
        } else {
            // Gérez le cas où aucun document n'est trouvé
            echo json_encode(['error' => 'Aucun document correspondant trouvé']);
        }
    }

    /* Fonction pour récupérer les éléments à afficher dans le tableau de l'inventaire dans le modal.*/
    public function user_livreur()
    {
        //Vérifier si un utilisateur est connecté et récupérer son nom 
        if (auth()->loggedIn()) {
            $user = auth()->user()->username;

            echo json_encode($user);
        }
    }
}

