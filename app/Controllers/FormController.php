<?php

namespace  App\Controllers;

use App\Models\CategorieModel;
use App\Models\ComptageModel;
use App\Models\CondModel;
use App\Models\EntreeStockModel;
use App\Models\FormAddMagasinModel;
use App\Models\Prod_stockModel;
use App\Models\SuiviStockModel;

class FormController extends BaseController
{

    protected $helpers = ['form'];

    //Ajouter un produit au magasin 
    public function add_prod_magasin()
    {

        if ($this->request->is('post')) {

            $data = array();
            $data_1 = array();
            $data_for_suivi = array();
            $lot_produit = strval($this->request->getPost(filter_var('lot')));

            $model_1 = new FormAddMagasinModel();
            $model_2 = new Prod_stockModel();
            $model_3 = new CategorieModel();
            $model_4 = new CondModel();
            $model_5 = new EntreeStockModel();
            $model_6 = new SuiviStockModel();
            $model_7 = new ComptageModel();

            $date_exp = $this->request->getPost(filter_var('date_exp'));

            $data_1 = [
                'desc' => strtoupper($this->request->getPost(filter_var('produit'))),
                'id_catG'  => $this->request->getPost(filter_var('categorie')),
            ];

            $categorie = $model_3->select('libelle')->where('id_catg', $data_1['id_catG'])->find();
            $id_unit = null;
            $unite = $model_4->select('libelle')->where('libelle', $this->request->getPost(filter_var('unite')))->find();
            if ($unite != null) {
                $id_u = $model_4->select('id_unite')->where('libelle', $this->request->getPost(filter_var('unite')))->first();
                $id_unit = strval($id_u['id_unite']);
                $idp =  $model_1->toSelectProd(strval($data_1['desc']), $data_1['id_catG'], $id_unit);
            } else {
                $idp = null;
            }

            //Si le produit n'est pas trouvé
            if ($idp == null) {
                $id_prod_str = null;
                $id_catG_str = null;
                if ($id_1 = $model_1->insert($data_1)) {

                    if ($this->request->getPost(filter_var('date_exp')) != null) {

                        if ($unite == null) {
                            $data_unit = array("libelle" => strtolower($this->request->getPost(filter_var('unite'))));
                            $id_unit = $model_4->insert($data_unit);
                            $data_2 = [
                                'id_prod' => $id_1,
                                'qtite_prod'  => $this->request->getPost(filter_var('quantite')),
                                'id_stock'  => $this->request->getPost(filter_var('id_stock')),
                                'compt_phys'  => $this->request->getPost(filter_var('quantite')),
                                'ecart'  => 0,
                                'lot' => $lot_produit,
                                'id_unite' => $id_unit,
                                'stock_ini' => $this->request->getPost(filter_var('quantite')),
                                'dateExp' => $this->request->getPost(filter_var('date_exp')),
                            ];

                            $id_2 = $model_2->insert($data_2);
                        } else if ($unite != null) {
                            $id_u = $model_4->select('id_unite')->where('libelle', $this->request->getPost(filter_var('unite')))->find();
                            $id_unit =  $id_u[0];
                            $data_2 = [
                                'id_prod' => $id_1,
                                'qtite_prod'  => $this->request->getPost(filter_var('quantite')),
                                'id_stock'  => $this->request->getPost(filter_var('id_stock')),
                                'compt_phys'  => $this->request->getPost(filter_var('quantite')),
                                'ecart'  => 0,
                                'lot' => $lot_produit,
                                'id_unite' => $id_unit,
                                'stock_ini' => $this->request->getPost(filter_var('quantite')),
                                'dateExp' => $this->request->getPost(filter_var('date_exp')),
                            ];

                            $id_2 = $model_2->insert($data_2);
                        }
                    } else {
                        if ($unite == null) {
                            $data_unit = array("libelle" => strtolower($this->request->getPost(filter_var('unite'))));
                            $id_unit = $model_4->insert($data_unit);
                            $data_2 = [
                                'id_prod' => $id_1,
                                'qtite_prod'  => $this->request->getPost(filter_var('quantite')),
                                'id_stock'  => $this->request->getPost(filter_var('id_stock')),
                                'compt_phys'  => $this->request->getPost(filter_var('quantite')),
                                'ecart'  => 0,
                                'lot' => $lot_produit,
                                'id_unite' => $id_unit,
                            ];

                            $id_2 = $model_2->insert($data_2);
                        } else if ($unite != null) {
                            $id_u = $model_4->select('id_unite')->where('libelle', $this->request->getPost(filter_var('unite')))->find();
                            $id_unit =  $id_u[0];
                            $data_2 = [
                                'id_prod' => $id_1,
                                'qtite_prod'  => $this->request->getPost(filter_var('quantite')),
                                'id_stock'  => $this->request->getPost(filter_var('id_stock')),
                                'compt_phys'  => $this->request->getPost(filter_var('quantite')),
                                'ecart'  => 0,
                                'lot' => $lot_produit,
                                'id_unite' => $id_unit,
                            ];

                            $id_2 = $model_2->insert($data_2);
                        }
                    }

                    $dateC = $model_1->select('dateC')->where('id_prod', $id_1)->find();

                    $data = array(
                        'Id' => $id_1,
                        'Produit' => $this->request->getPost(filter_var('produit')),
                        'Catégorie' => $categorie[0]['libelle'],
                        'Quantité'  => $this->request->getPost(filter_var('quantite')),
                        'Ajouté le:' => $dateC[0]['dateC'],
                        'Expire le:' => $this->request->getPost(filter_var('date_exp')),

                    );

                    //Insérer dans la table suivi de stock
                    $data_for_suivi = [
                        'id_prod' => $id_1,
                        'entr_stock' => 0,
                        'sort_stock' => 0,
                        'stock_ini' => $this->request->getPost(filter_var('quantite')),
                        'stock_phys_dispo' => $this->request->getPost(filter_var('quantite')),
                    ];
                    $id_suivi = $model_6->insert($data_for_suivi);

                    //met à jour l'entrée en stock
                    $data_3 = array(
                        "id_prod" => $id_1,
                        "id_prod_stock" => $id_2,
                        "qtite_entree" => $data_2['qtite_prod'],
                    );
                    $model_5->insert($data_3);

                    $model_1->historize('Ajout de ' . $this->request->getPost(filter_var('produit')) . ' dans le ' . $this->request->getPost(filter_var('num_mag')), $dateC[0]['dateC']);


                    //Insérer dans la table comptage pour inventaire
                    $data_comptage = [
                        'id_prod' => $id_1,
                        'compt'  => $this->request->getPost(filter_var('quantite')),
                        'ecart'  => 0,
                        'stock_theor'  => $this->request->getPost(filter_var('quantite')),
                    ];

                    $id_compt = $model_7->insert($data_comptage);

                    echo json_encode($data);
                } else {
                    echo ("Echec de l'enregistrement du produit");
                }
            } else {
                if ($this->request->getPost(filter_var('date_exp')) != null) {
                    $id_prod = $model_1->select('id_prod')->where('desc', strtoupper($this->request->getPost(filter_var('produit'))))->find();
                    if (!empty($id_prod)) {
                        $id_prod_str = strval($id_prod[0]['id_prod']);
                    } else {
                        echo "Erreur: id_prod est vide.";
                    }

                    if ($unite == null) {
                        $data_unit = array("libelle" => strtolower($this->request->getPost(filter_var('unite'))));
                        $id_unit = $model_4->insert($data_unit);
                        $data_2 = [
                            'id_prod' => $id_prod_str,
                            'qtite_prod'  => $this->request->getPost(filter_var('quantite')),
                            'id_stock'  => $this->request->getPost(filter_var('id_stock')),
                            'compt_phys'  => $this->request->getPost(filter_var('quantite')),
                            'ecart'  => 0,
                            'lot' => $lot_produit,
                            'id_unite' => $id_unit,
                            'dateExp' => $this->request->getPost(filter_var('date_exp')),
                        ];

                        $id_2 = $model_2->insert($data_2);
                    } else if ($unite != null) {
                        $id_u = $model_4->select('id_unite')->where('libelle', $this->request->getPost(filter_var('unite')))->find();
                        $id_unit = $id_u[0]['id_unite'];
                        if ($id_unit != null) {
                            $data_2 = [
                                'id_prod' => $id_prod_str,
                                'qtite_prod'  => $this->request->getPost(filter_var('quantite')),
                                'id_stock'  => $this->request->getPost(filter_var('id_stock')),
                                'compt_phys'  => $this->request->getPost(filter_var('quantite')),
                                'ecart'  => 0,
                                'lot' => $lot_produit,
                                'id_unite' => $id_unit,
                                'dateExp' => $this->request->getPost(filter_var('date_exp')),
                            ];

                            $id_2 = $model_2->insert($data_2);
                        }
                    }

                    //Mise à jour du suivi des stocks
                    $stat = $model_6->getStat($id_prod_str, $id_unit, $data_1['id_catG']);
                    $entr_stock = $stat['entr_stock'] + $this->request->getPost(filter_var('quantite'));
                    $sort_stock = $stat['sort_stock'];
                    $stock_ini = $stat['stock_ini'];
                    $stock_phys_dispo = $stat['qtite_prod'];

                    $data_for_suivi = [
                        'entr_stock' => $entr_stock,
                        'sort_stock' => $sort_stock,
                        'stock_ini' => $stock_ini,
                        'stock_phys_dispo' => $stock_phys_dispo,
                    ];

                    $id_suivi = $model_6->select('id_suivi')->where('id_prod', $id_prod_str)->first();
                    $id = $model_6->update($id_suivi, $data_for_suivi);


                    //Met à jour le comptage physique pour inventaire
                    $compt = $model_7->select('compt')->where('id_prod', $id_prod_str)->first();
                    $compts = $compt['compt'] + $data_2['compt_phys'];
                    $stock_th = $model_7->select('stock_theor')->where('id_prod', $id_prod_str)->first();
                    $stock_ths = $stock_th['stock_theor'] + $data_2['qtite_prod'];
                    $ecart = $stock_ths - $compts;
                    $data_comptage = [
                        'id_prod' => $id_prod_str,
                        'compt'  => $compts,
                        'ecart'  => $ecart,
                        'stock_theor'  => $stock_ths,
                    ];
                    $id = $model_7->select('id')->where('id_prod', $id_prod_str)->first();
                    $id_compt = $model_7->update($id, $data_comptage);


                    $dateC = $model_2->select('dateEntree')->where('id_prod', $id_prod_str)->find();
                    $data = array(
                        'Id' => $id_prod[0],
                        'Produit' => $this->request->getPost(filter_var('produit')),
                        'Catégorie' => $categorie[0]['libelle'],
                        'Quantité'  => $this->request->getPost(filter_var('quantite')),
                        'Ajouté le:' => $dateC[0]['dateEntree'],
                        'Expire le:' => $this->request->getPost(filter_var('date_exp')),

                    );

                    //met à jour l'entrée en stock
                    $data_3 = array(
                        "id_prod" => $id_prod[0],
                        "id_prod_stock" => $id_2,
                        "qtite_entree" => $data_2['qtite_prod'],
                    );
                    $model_5->insert($data_3);

                    $model_1->historize('Ajout de ' . $this->request->getPost(filter_var('produit')) . ' dans le ' . $this->request->getPost(filter_var('num_mag')), $dateC[0]['dateEntree']);

                    echo json_encode($data_for_suivi);
                    //Un code retiré ici 

                } else {
                    $id_prod = $model_1->select('id_prod')->where('desc', strtoupper($this->request->getPost(filter_var('produit'))))->find();
                    if (!empty($id_prod)) {
                        $id_prod_str = strval($id_prod[0]['id_prod']);
                    } else {
                        echo "Erreur: id_prod est vide.";
                    }

                    if ($unite == null) {
                        $data_unit = array("libelle" => strtolower($this->request->getPost(filter_var('unite'))));
                        $id_unit = $model_4->insert($data_unit);
                        $data_2 = [
                            'id_prod' => $id_prod_str,
                            'qtite_prod'  => $this->request->getPost(filter_var('quantite')),
                            'id_stock'  => $this->request->getPost(filter_var('id_stock')),
                            'compt_phys'  => $this->request->getPost(filter_var('quantite')),
                            'ecart'  => 0,
                            'lot' => $lot_produit,
                            'id_unite' => $id_unit,
                        ];

                        $id_2 = $model_2->insert($data_2);
                    } else if ($unite != null) {
                        $id_u = $model_4->select('id_unite')->where('libelle', $this->request->getPost(filter_var('unite')))->find();
                        $id_unit = $id_u[0]['id_unite'];
                        if ($id_unit != null) {
                            $data_2 = [
                                'id_prod' => $id_prod_str,
                                'qtite_prod'  => $this->request->getPost(filter_var('quantite')),
                                'id_stock'  => $this->request->getPost(filter_var('id_stock')),
                                'compt_phys'  => $this->request->getPost(filter_var('quantite')),
                                'ecart'  => 0,
                                'lot' => $lot_produit,
                                'id_unite' => $id_unit,
                            ];

                            $id_2 = $model_2->insert($data_2);
                        }
                    }

                    //Mise à jour du suivi des stocks
                    $stat = $model_6->getStat($id_prod_str, $id_unit, $data_1['id_catG']);
                    $entr_stock = $stat['entr_stock'] + $this->request->getPost(filter_var('quantite'));
                    $sort_stock = $stat['sort_stock'];
                    $stock_ini = $stat['stock_ini'];
                    $stock_phys_dispo = $stat['qtite_prod'];

                    $data_for_suivi = [
                        'entr_stock' => $entr_stock,
                        'sort_stock' => $sort_stock,
                        'stock_ini' => $stock_ini,
                        'stock_phys_dispo' => $stock_phys_dispo,
                    ];

                    $id_suivi = $model_6->select('id_suivi')->where('id_prod', $id_prod_str)->first();
                    $id = $model_6->update($id_suivi, $data_for_suivi);

                    //Met à jour le comptage physique pour inventaire
                    $compt = $model_7->select('compt')->where('id_prod', $id_prod_str)->first();
                    $compts = $compt['compt'] + $data_2['compt_phys'];
                    $stock_th = $model_7->select('stock_theor')->where('id_prod', $id_prod_str)->first();
                    $stock_ths = $stock_th['stock_theor'] + $data_2['qtite_prod'];
                    $ecart = $stock_ths - $compts;
                    $data_comptage = [
                        'id_prod' => $id_prod_str,
                        'compt'  => $compts,
                        'ecart'  => $ecart,
                        'stock_theor'  => $stock_ths,
                    ];
                    $id = $model_7->select('id')->where('id_prod', $id_prod_str)->first();
                    $id_compt = $model_7->update($id, $data_comptage);


                    $dateC = $model_2->select('dateEntree')->where('id_prod', $id_prod_str)->find();
                    $data = array(
                        'Id' => $id_prod[0],
                        'Produit' => $this->request->getPost(filter_var('produit')),
                        'Catégorie' => $categorie[0]['libelle'],
                        'Quantité'  => $this->request->getPost(filter_var('quantite')),
                        'Ajouté le:' => $dateC[0]['dateEntree'],
                        'Expire le:' => $this->request->getPost(filter_var('date_exp')),

                    );

                    //met à jour l'entrée en stock
                    $data_3 = array(
                        "id_prod" => $id_prod[0],
                        "id_prod_stock" => $id_2,
                        "qtite_entree" => $data_2['qtite_prod'],
                    );
                    $model_5->insert($data_3);

                    $model_1->historize('Ajout de ' . $this->request->getPost(filter_var('produit')) . ' dans le ' . $this->request->getPost(filter_var('num_mag')), $dateC[0]['dateEntree']);

                    echo json_encode($data_for_suivi);

                    //Un code est retiré ici

                }
            }
        } else {
            echo view('error-404');
        }
    }

    //Pour récupérer l'historique de toutes les opérations et l'envoyer à la vue
    public  function all_stories()
    {
        if ($this->request->is('post')) {
            $model_1 = new FormAddMagasinModel();
            $data = $model_1->getStory();
            echo json_encode($data);
        } else {
            echo view('error-404');
        }
    }

    //Récupérer toutes les catégories de produit dans la base de données
    public function getcatG()
    {

        $model = new CategorieModel();
        $data = $model->select(['id_catg', 'libelle'])->findAll(); // Remplacez 'username' et 'email' par les noms de vos champs
        echo json_encode($data);
    }
}
