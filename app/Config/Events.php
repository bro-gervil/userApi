<?php

namespace Config;


use App\Models\FormAddMagasinModel;
use App\Models\NotificationModel;
use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;
use CodeIgniter\Shield\Commands\User;
use CodeIgniter\Shield\Models\UserModel as Us;
use App\Models\UserModel;
use App\Models\GroupModel;
use App\Models\Prod_stockModel;
use App\Models\InventoryModel;
use Event;

//Definition de l'évènement de récupération des produits près à expiration et creation de notification
define('product_event','product_event');
$groupsModel = new GroupModel();

//Definition de l'évènement de récupération des emails non envoyés et de les envoyer aux utilisateurs concernés



//Definition de l'évènement de vérification si un user est connecté
define('mailing','mail');
$Usmodel = new UserModel();

$modelformMag = new Prod_stockModel();
//define('nbre_notif_event','nbre_notif_event');
//$modelnotif = new NotificationModel();

define('inventory_event','inventory_event');
$modelInventaire = new InventoryModel();

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */


Events::on('pre_system', static function () {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static fn ($buffer) => $buffer);
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        Services::toolbar()->respond();
        // Hot Reload route - for framework use on the hot reloader.
        if (ENVIRONMENT === 'development') {
            Services::routes()->get('__hot-reload', static function () {
                (new HotReloader())->run();
            });

          
        }
    }
  
});

Events::on('product_event',[$modelformMag,'create_notif_from_expiring_prod'],1);
Events::on('inventory_event',[$modelInventaire,'inventaire_prod'],1);
Events::on('mailing',[$Usmodel,'send_mails']);

//Events::on('nbre_notif_event',[$modelnotif,'NotificationCount'],1);

    //Events::trigger('login', $user);
  //déclenche lorsqu'un nouvel utilisateur s'enregistre dans le système
    //
    //$modelformMag = new FormAddMagasinModel();
   // Events::trigger('register', $user);
    //Events::on('register', 'SomeLibrary::handleRegister');

    //se lance directement lorsqu'une connexion est réussie
    //Events::on('login', [$modelformMag, 'create_notif_from_expiring_prod'], 25);
   
    //déclenche lorsqu'une tentative de connexion échoue
    //Events::on('failedLogin', function ($credentials) {
    //    dd($credentials);
    //});

    //lancé lorsqu'un utilisateur se connexion par lien magique avec succès
    //Events::on('magicLogin', function () {
    //    $user = auth()->user();
    //});

    //'login' => ['App\Models\NotificationModel::sayHello',],
   
