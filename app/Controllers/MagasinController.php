<?php

namespace App\Controllers;

use App\Models\FormAddMagasinModel;
use App\Models\stockModel;
use App\Models\Prod_stockModel;
use App\Models\CategorieModel;
use App\Models\MagasinModel;
use App\Models\PosteModel;

class MagasinController extends BaseController
{
    public function datainventory1(){

        $id_s = $this->request->getGet('id_stock');

        $modelProdS = new Prod_stockModel();

        $nbretotal = $modelProdS ->select_datastock($id_s);
      
        echo json_encode($nbretotal);
    }

    public function datainventory2()
    {

        $id_s = $this->request->getGet('id_stock');
         // Obtenez la date actuelle
        $dateActuelle = date('Y-m-d');
        $modelProdS = new Prod_stockModel();
        $modelProd = new FormAddMagasinModel();

        //$nbretotal = $modelProdS->select_datastock(array('id_stock' => $id_s));
        $nbreProdExp = $modelProd -> nbre_prodexp($dateActuelle,$id_s);
        //$resultat = $modelProd ->prodexp();

        echo json_encode($nbreProdExp);
    }

    public function datainventory3(){

        $id_s = $this->request->getGet('id_stock');

        $modelProdS = new FormAddMagasinModel();

        $nbretotal = $modelProdS ->nbre_ravitail($id_s);
      
        echo json_encode($nbretotal);
    }

    public function dataprod_exp($stock){
        $stock= $this->request->getUri()->getSegment(2);

            $model_x = new FormAddMagasinModel();
            $now = date('Y-m-d');
            //$data_x= $model_x->getData1Mag1(11);
            $data= $model_x->getprod_exp($stock,$now);
            
            /*foreach ($data_x as $key => $data_x) {
                $data=array(
                    'Id' => $data_x['id_prod'],
                    'Produit' => $data_x['designation'],
                    'Catégorie' => $data_x['libelle'],
                    'Quantité' => $data_x['qtite_prod'],
                    'Ajouté le:' => $data_x['dateC'],
                    'Expire le:' => $data_x['dateExp'],
                );
                echo json_encode($data);
            }*/
        echo json_encode($data);
    }

    public function create_categ(){
        if ($this->request->getPost(filter_var('newcategorie')) != null) {
            $data =$this->request->getPost(filter_var('newcategorie'));
            $model = new CategorieModel();
            $model -> newcatego($data);
        }
    }
    public function suppr_categ()
    {
        if ($this->request->getPost(filter_var('id_catg')) != null) {
            $data = $this->request->getPost(filter_var('id_catg'));
            $model = new FormAddMagasinModel();
            $model2 = new CategorieModel();
            
            if(empty($model->getAllProd_id($data))){
                $model2 ->suppr_categorie($data);
                echo json_encode('réussi');
            }
            else{
                echo json_encode('erreur');
            }
        }
        else{
            echo json_encode('empty');
        }
    }
    public function modif_categ()
    {
        $id = $this->request->getPost(filter_var('id_catg'));
        $donnee = $this->request->getPost(filter_var('modifcat_name'));

        $model2 = new CategorieModel();

        if (empty($id || $donnee)) {
            echo json_encode('empty');
        } 
        else {
            $data =[
                'libelle' => $donnee,
            ];

            if($model2->update($id,$data)){
                echo json_encode('réussi');
            }
            else{
                echo json_encode('erreur');
            }
        }
    }


    //Pour récupérer une catégorie par son id
    public function get_cat($id)
    {

        $id = $this->request->getUri()->getSegment(2);

        $model_x = new CategorieModel();
        $data_x = $model_x->get_categ($id);

        echo json_encode($data_x);
    }

    //Récupérer la liste des magasins
    public function menu_magasin(){
        if (! $this->request->is('get')) {
    return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
}
        $MagasinModel = new MagasinModel();

        $data = $MagasinModel->tous_magasins();
        
        echo json_encode($data);
    }

    //Créer un nouveau magasin
    public function create_magasin(){
        $MagasinModel = new MagasinModel();
        $StockModel = new stockModel();
        $num_mag = $this->request->getPost(filter_var('num_mag'));
        //l'id du dernier magasin
        $idmag_max = $MagasinModel->select_idmagasin();

        if(isset($idmag_max)){
            $data2 = array(
                'proprietaire' => 'Magasin N°'.$idmag_max,
            );
            $StockModel ->insert($data2);
        }

        //l'id du dernier stock
        $idstock_max = $StockModel->select_idstock();

        if(isset($idmag_max) && isset($idstock_max)){
            $data1 = array(
                'id_mgsin' => $idmag_max,
                'num_magasin' => $num_mag,
                'id_stock' => $idstock_max,
                'url_magasin' => "liste_produit_magasin/".$idmag_max,
            );

            $MagasinModel ->insert($data1);

            echo json_encode("success");
        }
        else{
            echo json_encode('error');
        }


    }

    //Créer un nouveau service ou unité pour approvisionnement
    public function create_service(){
        $PosteModel = new PosteModel();
        $StockModel = new stockModel();
        $nom_poste = $this->request->getPost(filter_var('nom_poste'));

        //l'id du stock
        $idstock = $StockModel->insert(['proprietaire'=>$nom_poste]);

        if(isset($idstock)){
        
            //Une expression régulière par sa fonction récupérer une partie d'une chaine de caractère

            $le = str_split($nom_poste); //transformer la chaine de chr en tableau
            $letter = "/" . $le[0] . "/"; //formater sous forme de regex
            preg_match($letter, $nom_poste, $matches); //recherche de la chr dans toute la chaine
            $rech = "/". $matches[0]."/";
            $first_letter_maj = strtoupper($matches[0]); //transforme la partie recherchée en majuscule
            
            $nom_final = preg_replace($rech,$first_letter_maj,$nom_poste); //Remplacement dans la chaine initiale
            mkdir("../public/partials/".$nom_final,0775); //creation du repertoire du service créer pour stockage des pdf bLivraison

            $data1 = array(
                'nom_poste' => $nom_final,
                'id_stock' => $idstock,
            );

            $PosteModel ->insert($data1);

            echo json_encode("success");
        }
        else{
            echo json_encode('error');
        }


    }


    public function delete_mag(){

        if ($this->request->is('post')) {
            $idmag = $this->request->getPost(filter_var('idmagasin'));
            $idstock = $this->request->getPost(filter_var('idstock'));

            $MagasinModel = new MagasinModel();
            $StockModel = new stockModel();
            $ProdStockModel = new prod_stockModel(); 

            $test1 = $MagasinModel->suppr_magasin($idmag);
            $test2 = $StockModel->suppr_stock_magasin($idstock);
            $test3 = $ProdStockModel->suppr_prod_stock_magasin($idstock);

            if($test2==true){
                echo json_encode('succès !');
            }
            else{
                echo json_encode('Une erreur est survenue');
            }
        }
        else{
            echo view('error-404');
        }
    }

    public function reset_mag(){

        if ($this->request->is('post')) {
            $idmag = $this->request->getPost(filter_var('idmagasin'));
            $idstock = $this->request->getPost(filter_var('idstock'));

            $ProdStockModel = new prod_stockModel(); 

            $test3 = $ProdStockModel->suppr_prod_stock_magasin($idstock);

            if($test3==true){
                echo json_encode('succès !');
            }
            else{
                echo json_encode('Une erreur est survenue');
            }
        }
        else{
            echo view('error-404');
        }
    }
}

