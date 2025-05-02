<?php

use CodeIgniter\Router\RouteCollection;



/**
 * @var RouteCollection $routes
 */

service('auth') ->routes($routes);

auth()->routes($routes);

$routes->get('/','Pages::index');
$routes->post('/','Pages::index');
//Créer un utilisateur
$routes->post('/register_user','UserController::create_user');

//Modifier le comptage physique
$routes->post('/mod_comptage_phys','Pages::compt_physique');

//Page de suivi des stocks
$routes->get('/suivi_stock','Pages::suivi');

//Page d'inventaire des stocks
$routes->get('/inventaire_stock','Pages::inventaire');
//Récupérer l'inventaire par ajax
$routes->post('/ajax_inventaire','Pages::jsonInventory');

//Changer de groupe à un utilisateur
$routes->post('/change_group','UserController::change_group');

$routes->post('/all_stories','FormController::all_stories');

//Changer email de l'utilisateur
$routes->post('/change_usermail','UserController::changeownmail');

//Changer mot de passe un utilisateur
$routes->post('/personal_password_change','UserController::change_password_personal');

//Changer mot de passe un utilisateur
$routes->post('/verify_oldpassword','UserController::check_oldpassword');

//Réinitialiser un magasin
$routes->post('/reset_magasin','MagasinController::reset_mag');

//Supprimer un magasin
$routes->post('/delete_magasin','MagasinController::delete_mag');

//activer un utilisateur du système
$routes->post('/activate_user','UserController::activate');

//désactiver un utilisateur du système
$routes->post('/deactivate_user','UserController::deactivate');

//supprimer un utilisateur du système
$routes->post('/delete_user','UserController::delete_user');

//Réinitialiser le mot de passe d'un utilisateur du système
$routes->post('/reset_password','UserController::reset_password');

//Nombre de tous les utilisateurs
$routes->post('/nombre_user','UserController::recup_usernumber');

//Récupérer tous les utilisateurs 
$routes->post('/recupere_user','UserController::return_all_users');

//verification des droits d'accès à certains contenus
$routes->get('/authentifying','Pages::authentif');

//créer un nouveau magasin
$routes->post('/createmagasin','MagasinController::create_magasin');
//créer un nouveau service
$routes->post('/createservice','MagasinController::create_service');

//Profil utilisateur
$routes->get('/profileuser','UserController::profile_user');

//page  de creation d'user et de certaines vues de l'admin
$routes->get('/profileadmin','UserController::profile_admin');

//page de gestion des postes du lam
$routes->get('/formAjoutP','Pages::formAjoutP');


//qui affiche les magasins
$routes->get('/liste_produit_magasin/(:num)/(:num)','Pages::liste_produit_magasin/$1/$2');

//qui  affiche la liste  des magasins dans le menu de l'app
$routes->get('/menumagasin','MagasinController::menu_magasin');

//qui  ajoute un produit nouvellement créé dans un magasin donné
$routes->post('/addprod_magasin','FormController::add_prod_magasin');

//qui marque une notification comme lue
$routes->post('/marquerlu','UserController::markAsSeen');

//qui donne le nombre de notification 
$routes->post('/nombre_notification','UserController::countNotifications');

//Récupère toutes les catégories de produits
$routes->get('/getcatG','FormController::getcatG');

//Récupère tous les produits d'un magasin
$routes->get('/tableau_loadall/(:num)','Pages::tabloadAll/$1');

//Récupère le dernier produit d'un magasin
$routes->get('/tableau_loadone','Pages::tabloadOne');

//Mise à jour finale du produit modifié du magasin 
$routes->post('/updateprod_magasin','Pages::getUpdateprod_magasin');

//Charger un produit sélectionné un magasin dans le formulaire pour modification
$routes->get('pages/getCharger/(:num)/(:num)/:num','Pages::getCharger/$1/$2/$3');

//
$routes->get('printpdf_hema','Pages::print_pdf');

$routes->post('/pdf_hema','Pages::pdf');

//Créer une catégorie
$routes->post('/createCategorie','MagasinController::create_categ');

//Supprimer une catégorie
$routes->post('/supprCategorie','MagasinController::suppr_categ');

//Récupère une catégorie par son id
$routes->get('/getCat/(:num)','MagasinController::get_cat/$1');

//modification de catégorie
$routes->post('/modifCategorie','MagasinController::modif_categ');

$routes->post('/p','Pages::p_contenu');

$routes->post('/savefile','LivraisonController::save_file');

//Enregistrer une livraison effectuée
$routes->post('/savelivraison','LivraisonController::save_livraison');

//Récupère l'id de la derniere livraison incrémenté de 1 pour la prochaine livraison
$routes->get('/getidlivraison','LivraisonController::id_livraison');

$routes->get('/getinfolivraison','LivraisonController::recup_infolivraison');

$routes->get('/getusernumber','UserController::recup_usernumber');

$routes->get('/getdoc','LivraisonController::doc_livraison');

//Récupération de l'utilisateur ayant effectué une livraison
$routes->get('/getUserlivreur','LivraisonController::user_livreur');

//Récupère les produits périmés d'un magasin donné
$routes->get('/getprodexpire/(:num)','MagasinController::dataprod_exp/$1');

//Les routes  vers les fonctions qui renvoient les données pour l'inventaire des magasins

$routes->get('/getdatainventory1','MagasinController::datainventory1');

$routes->get('/getdatainventory2','MagasinController::datainventory2');

$routes->get('/getdatainventory3','MagasinController::datainventory3');

//donne un login à un nom d'utilisateur donné

$routes->post('format_login','UserController::formatLogin');

$routes->get('after_login', 'AfterLoginController::after_login');

$routes->get('firewall/panel', 'MyFirewall::panel');
//$routes->add('firewall/(:any)', 'MyFirewall::panel');
$routes->post('firewall/panel', 'MyFirewall::panel');

$routes->get('/firewall/panel/(:segment)/(:segment)/', 'MyFirewall::panel');

$routes->post('/firewall/panel/(:segment)/(:segment)/', 'MyFirewall::panel');

$routes->get('/firewall/panel', 'MyFirewall::panel');
$routes->post('/firewall/panel', 'MyFirewall::panel');

$routes->get('/firewall/panel/(:segment)/(:segment)/', 'MyFirewall::panel');
$routes->post('/firewall/panel/(:segment)/(:segment)/', 'MyFirewall::panel');

$routes->get('/quitter','Pages::quit');