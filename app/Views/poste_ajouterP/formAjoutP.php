<?php
$security = \Config\Services::security();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Favicon Icon-->
    <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/x-icon">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/quicksand.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/fontawesome.css">
    <!--Animate CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/animate.min.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/chartist.min.css">
    <!--Map-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jquery-jvectormap-2.0.2.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/calendar/bootstrap_calendar.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap4-modal-fullscreen.min.css">
    <!--Nice select -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/nice-select.css">
    <!--JsGrid CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jsgrid.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jsgrid-theme.min.css">
    <!--Alertify CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/alertify.min.css">
    <!--preloader -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/preloader/dist/prelodr.min.css">
    <title>IPB LAM</title>
    <style>
        .cont {
            position: relative;
            text-align: center;
            padding-right: 50px;
        }

        .g {
            font-weight: bolder;
        }

        .cent {
            position: absolute;
            top: 60%;
            left: 85%;
            transform: translate(-50%, -50%);
        }

        @media print {

            #div1,
            #nav1,
            #divdrop1,
            #divdrop2,
            #divcontain1,
            #divbouton,
            #prod,
            #nav-customContent2 {
                display: none;
            }
        }
    </style>
    <style>
        .containerings {
            position: relative;
            text-align: center;
            width: 250px;
            height: 250px;
        }

        .centerings {
            position: absolute;
            top: 60%;
            right: 57%;
            font-stretch: ultra-expanded;
            color: white;
            font-size: 17px;
            transform: translate(-50%, -50%);
        }
    </style>

    <SCRIPT LANGUAGE="JavaScript">
        /*
Source :  http://www.editeurjavascript.com
 Adaptation : http://www.outils-web.com
*/
        function HeureCheckEJS() {
            krucial = new Date;
            heure = krucial.getHours();
            min = krucial.getMinutes();
            sec = krucial.getSeconds();
            jour = krucial.getDate();
            mois = krucial.getMonth() + 1;
            annee = krucial.getFullYear();
            if (sec < 10)
                sec0 = "0";
            else
                sec0 = "";
            if (min < 10)
                min0 = "0";
            else
                min0 = "";
            if (heure < 10)
                heure0 = "0";
            else
                heure0 = "";
            DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
            which = DinaHeure
            if (document.getElementById) {
                document.getElementById("ejs_heure").innerHTML = which;
            }
            setTimeout("HeureCheckEJS()", 1000)
        }
        window.onload = HeureCheckEJS;
    </SCRIPT>

</head>

<body id="bodyPage">
    <!--Page loader-->
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <!--Page loader-->


    <!--Page Wrapper-->

    <div class="container-fluid">

        <!--Header-->
        <div class="row header shadow-sm">

            <!--Logo-->
            <div class="col-sm-3 pl-0 text-center header-logo">
                <div class="bg-gradient-theme mr-3 pt-3 pb-2 mb-0">
                    <h3 class="logo"><a href="<?= base_url() ?>/#" class="text-secondary logo"> <img class="containering align-self-center mr-3 rounded-circle" src="<?= base_url() ?>/assets/img/labo.svg" width="50px" height="50px" alt="Generic placeholder image">Espace Gestion de <span class="centering">Kits</span></a></h3>
                </div>
            </div>
            <!--Logo-->

            <!--Header Menu-->
            <div class="col-sm-9 bg-gradient-theme header-menu pt-2 pb-0">
                <div class="row">

                    <!--Menu Icons-->
                    <div class="col-sm-4 col-8 pl-0">
                        <!--Toggle sidebar-->
                        <span class="menu-icon" onclick="toggle_sidebar()">
                            <span style="padding-left:20px;" id="sidebar-toggle-btn"></span>
                        </span>
                        <!--Toggle sidebar-->

                        <!--Notification icon-->
                        <div class="menu-icon">
                            <a class="" id="cloche" href="<?= base_url() ?>/#" onclick="toggle_dropdown(this); return false" role="button" class="dropdown-toggle">
                                <i class="fa text-warning fa-bell gran"></i>
                                <span style="margin-left:6px;" id="badge_notif" class="badge badge-primary"></span>
                            </a>

                            <?php

                            use CodeIgniter\I18n\Time;

                            $GLOBALS['now'] = Time::now('Africa/Bangui', 'en_US'); //donne la datetime du  moment -> 2024-01-08 23:05

                            echo '
                                                <div id="notif_body" hidden class="dropdown dropdown-bottom bg-white shadow border animated rubberBand" style="display: block; overflow-y:scroll;height:300px;">
                                                    <a class="dropdown-item text-center" href="#"><strong><span class="text-secondary">Notifications</span></strong></a>
                                                    <div class="dropdown-divider"></div>
                                
                                            ';

                            if (isset($notifications) and $notif_total != 0 and isset($alerts)) {

                                array_map(function ($cat, $al) {

                                    $diff = $GLOBALS['now']->difference($cat['date_notif'])->humanize(); //temps écoulé entre 2 dates -> 12 hours ago ; 3 minutes ago, etc. 
                                    preg_match('/\d+ \w+/', $diff, $matches); // supprime ago pour récupérer 12 hours
                                    if (!isset($matches[0])) {
                                        preg_match('/\w+/', $diff, $matches);
                                        $duration = $matches[0];
                                    } else {
                                        $duration = 'il y a ' . $matches[0];
                                    }

                                    if ($duration == str_contains($duration, 'hours')) {
                                        $duration = str_replace('hours', 'heures', $duration);
                                    } elseif ($duration == str_contains($duration, 'hour')) {
                                        $duration = str_replace('hour', 'heure', $duration);
                                    } elseif ($duration == str_contains($duration, 'Just')) {
                                        $duration = str_replace('Just', 'maintenant', $duration);
                                    } elseif ($duration == str_contains($duration, 'day')) {
                                        $duration = str_replace('day', 'jour', $duration);
                                    } elseif ($duration == str_contains($duration, 'days')) {
                                        $duration = str_replace('days', 'jours', $duration);
                                    } elseif ($duration == str_contains($duration, 'month') or $duration == str_contains($duration, 'months')) {
                                        $duration = str_replace(['month', 'months'], 'mois', $duration);
                                    } elseif ($duration == str_contains($duration, 'year')) {
                                        $duration = str_replace('year', 'an', $duration);
                                    } elseif ($duration == str_contains($duration, 'years')) {
                                        $duration = str_replace('years', 'ans', $duration);
                                    }

                                    echo '
                                                            <a href="#" class="dropdown-item animated jello">
                                                                <div class=" scroll-area media alert alert-warning alert-dismissible fade show" role="alert">
                                                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-warning animated zoomInUp">
                                                                        <i class="fa fa-exclamation-triangle"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                    <h6 class="mt-0 text-secondary animated shake"><strong>' . $cat['type'] . '</strong></h6>
                                                           
                                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                        <p>' . $cat['contenu'] . '</p>
                                                                        <div>
                                                                            <small class="text-secondary"><i style="font-size:6px;" class="fa fa-circle"></i> expire le ' . $al['dateExp'] . '</small>
                                                                        </div>
                                                                         <div style="margin-top:5px;">
                                                                            <small class="text-secondary"><i style="font-size:6px;" class="text-secondary fa fa-circle"></i> identifiant ' . $al['id_prod'] . '</small>
                                                                        </div>
                                                                        <div style="margin-top:5px;">
                                                                            <small class="text-secondary"><i style="font-size:6px;" class="text-secondary fa fa-circle"></i> magasin n°' . $al['id_mag'] . '</small>
                                                                        </div>
                                                                        <div style="margin-top:10px;">
                                                                            <small class="text-primary"><i class="fas fa-clock"></i>' . ' ' . $duration . '</small>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" onclick="markAs(' . $cat['id_notif'] . ');" class="close btn fa fa-eye text-primary" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true"></span>
                                                                </button>
                                                            </div>';
                                }, $notifications, $alerts);
                            } else {
                                echo '
                                                <a href="#" class="dropdown-item">
                                                    <div class="media alert alert-warning alert-dismissible fade show" role="alert">
                                                        <div class="media-body">
                                                        <span>Aucune notification pour le moment.</span>
                                                        </div>
                                                    </div> 
                                                </a>';
                            }

                            echo '   <div class="dropdown-divider"></div>
                                            </div>
                                        </a>
                                            ';

                            ?>
                        </div>
                        <!--Notication icon-->

                        <span style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight:300px; left:90%" id="ejs_heure" class="menu-icon">
                            <i class="fa fa-th-large">Initialisation</i>
                        </span>

                    </div>
                    <!--Menu Icons-->

                    <!--Search box and avatar-->
                    <div style="padding-right: 10%;" class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">

                        <div class="mr-4">
                            <div class="cont" id="dropdownMenuLink" data-toggle="dropdown">
                                <a class="avatar online" href="<?= base_url() ?>/#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span style="background-color:#cb0000;" class="g avatar-initial text-center text-light bleu3"><?= $usr ?></span>
                                </a>
                            </div>
                            <div class="cent avatar-body">
                                <div class="">
                                    <h6><?= $user ?></h6>
                                </div>
                                <span><?= $permission ?></span>
                            </div><!-- avatar-body -->


                            <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
                                <a id="lienprofile" class="dropdown-item" href="<?= base_url() ?>/profileuser"><i class="fa fa-user pr-2"></i> Profil</a>
                                <div class="dropdown-divider"></div>
                                <a id="lienprofile2" class="dropdown-item" hidden></a>
                                <div id="divider_2" class="dropdown-divider" hidden></div>
                                <a id="log-out" class="dropdown-item" href="<?= base_url() ?>/logout"><i class="fa fa-power-off pr-2"> Déconnexion</i></a>
                            </div>
                        </div>
                    </div>
                    <!--Search box and avatar-->
                </div>
            </div>
            <!--Header Menu-->
        </div>
        <!--Header-->

        <!--Main Content-->

        <div class="row main-content" style="background-image: url(<?= base_url() ?>/assets/img/livraison-1.jpeg); background-size:cover; background-position:center;">
            <section id="mains">

            </section>
            <!--Sidebar left-->
            <div class="col-sm-3 col-xs-6 sidebar pl-0">
                <div class="inner-sidebar mr-3">
                    <div class="image  animated zoomIn">
                        <img width="100%" src="<?= base_url() ?>/assets/img/prof1.jpg" alt="logo" class="" />
                    </div>


                    <!--Sidebar Navigation Menu-->
                    <div class="sidebar-menu-container">
                        <ul class="sidebar-menu mt-4 mb-4">

                            <!--Tableau de bord-->
                            <li class="parent">
                                <a href="<?= base_url() ?>/#" onclick="toggle_menu('dashboard'); return false" class=""><i class="fa fa-home mr-3"> </i>
                                    <span style="font-size: small;" class="none">Accueil<i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="dashboard">
                                    <li class="child"><a href="<?= base_url() ?>//" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Tableau de bord</a></li>
                                </ul>
                            </li>

                            <!--Stocks de Magasins-->
                            <li class="parent">
                                <a href="<?= base_url() ?>/#" onclick="toggle_menu('mag'); return false" class=""><i class="fas fa-window-maximize mr-3"> </i>
                                    <span style="font-size: small;" class="none">Management des Magasins<i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="mag">

                                </ul>
                            </li>

                            <!--Stocks de Postes-->
                            <li class="parent">
                                <a href="<?= base_url() ?>/#" onclick="toggle_menu('postes'); return false" class=""><i class="fa fa-cubes mr-3"> </i>
                                    <span style="font-size: small;" class="none">Management des stocks du Labo<i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="postes">
                                    <li class="child"><a id="menulink1" href="<?= base_url() ?>/formAjoutP" class="ml-4"><i class="fa fa-angle-right mr-3"></i>Approvisionnements</a></li>
                                </ul>
                            </li>
                            <!--Stocks suivi-->
                            <li class="parent" id="suivi">
                                <a href="<?= base_url() ?>/#" onclick="toggle_menu('suivi_ch'); return false" class=""><i class="fa fa-cubes mr-3"> </i>
                                    <span style="font-size: small;" class="none">Suivi de stocks<i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="suivi_ch">
                                    <li class="child"><a id="menulink2" href="<?= base_url() ?>/suivi_stock" class="ml-4"><i class="fa fa-angle-right mr-3"></i>Consulter le tableau de suivi de stock</a></li>
                                </ul>
                            </li>
                            <!--Stocks inventaires-->
                            <li class="parent" id="inv">
                                <a href="<?= base_url() ?>/#" onclick="toggle_menu('inv_ch'); return false" class=""><i class="fa fa-book  mr-3"> </i>
                                    <span style="font-size: small;" class="none">Inventaire de stocks<i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="inv_ch">
                                    <li class="child"><a id="menulink3" href="<?= base_url() ?>/inventaire_stock" class="ml-4"><i class="fa fa-angle-right mr-3"></i>Afficher l'inventaire</a></li>
                                </ul>
                            </li>



                        </ul>
                    </div>
                    <!--Sidebar Naigation Menu-->
                </div>
            </div>
            <!--Sidebar left-->

            <!--Sidebar left-->

            <!--Content right-->
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <nav style="margin-top: 5px;" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-arrow bg-light bleu2" style="border-radius:20px;">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/"><span style="font-size: 16px;">Tableau de bord</span></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span style="font-size: 16px;">Management des stocks du Laboratoire</span></li>
                    </ol>
                </nav>

                <!--Dashboard widget-->
                <div class="mt-1 mb-3 button-container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <div class="row pl-0">

                            <!--postes begin-->
                            <?php
                            if (isset($poste)) {
                                foreach ($poste as $key => $cat) {
                                    echo '  <div class="col-sm-4" style="margin-top:20px;">
                                <li class="nav-item">
                                    <div class="menu-icon">
                                        <a type="button" data-toggle="modal" data-id_stock="' . $cat['id_stock'] . '" data-target="#' . $cat['nom_poste'] . 'Modal" role="button">
                                            <div class="card bg-gradient-light shadow" id="' . $cat['nom_poste'] . '" style="border-radius:20px;border:grey 1px solid">
                                                <div class="media p-4">
                                                    <div style="font-size:20px;" class="">
                                                        <img class="card-img-top" style="width:150px; height:100px;border-radius:20px;" src="' . base_url() . '/assets/img/parasito.jpeg" alt="Card image cap">
                                                        <span class="badge badge-primary">' . $cat['nom_poste'] . '</span>
                                                    </div>
                                                    <div class="media-body pl-2">

                                                        <p><small class="text-muted bc-description">Unité ' . $cat['id_poste'] . '</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </div>

                                        ';
                                }
                            }
                            ?>
                            <!--postes end-->
                        </div>
                    </ul>
                    <!-- begin  bouton ajouter un service -->
                    <div style="margin-top: 20px;display:flexbox">
                        <button id="csv-file" class="btn bg-light btn-outline-primary text-dark" onclick="click1()"><i class="fa fa-plus text-primary"></i> Créer un nouveau service</button>
                        <div class="col-lg-10" id="rename" hidden>
                            <?php

                            helper('form');
                            helper('security');
                            $attributes = [
                                'id' => 'RenForm',

                            ];

                            ?>

                            <?= form_open('', esc($attributes)) ?>
                            <?= csrf_field() ?>
                            <table class="table text-dark" id="r_table">
                                <tbody>
                                    <tr>
                                        <td>Libellé du service:</td>
                                        <td style="padding-left: 10%;">
                                            <input type="text" id="name_serv" style="width: 400px;" class="form-control text-dark">
                                        </td>
                                        <td><button onclick="close_mod();" type="button" class="btn btn-outline-danger">Annuler</button></td><td><button onclick="creer_serv();" type="button" class="btn btn-outline-primary">Valider</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?= form_close() ?>
                        </div>
                    </div>
                    <!-- end bouton ajouter un service -->
                    <?php

                    ?>


                    <!----------TOUS LES MODAUX DE GESTION DE CHAQUE POSTE DU LABORATOIRE----------------------------------------------------------------------------------------------------->

                    <!--MODAL START-->
                    <?php

                    if (isset($poste)) {
                        foreach ($poste as $key => $cat) {


                            echo '
                    <div class="modal fade modal-fullscreen" id="' . $cat['nom_poste'] . 'Modal" tabindex="-1" aria-labelledby="' . $cat['nom_poste'] . 'ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div id="div1' . $cat['nom_poste'] . ' " class="modal-header bg-gradient-theme">
                                    <h5 class="modal-title" id="' . $cat['nom_poste'] . 'ModalLabel"><strong>Unité ' . $cat['id_poste'] . ' <i class="fa fa-chevron-right"></i></strong> ' . $cat['nom_poste'] . ' </h5>
                                    <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div style="background-color: aliceblue;" class="modal-body">
                                    <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm custom-tabs-2">

                                        <nav id="nav' . $cat['nom_poste'] . ' ">
                                            <div class="nav nav-tabs nav-fill" id="nav-stockdispo' . $cat['nom_poste'] . ' " role="tablist">
                                                <a class="nav-item nav-link active show" id="nav-profile2' . $cat['nom_poste'] . ' " data-toggle="tab" href="#custom-profile2' . $cat['nom_poste'] . ' " role="tab" aria-controls="nav-profile2' . $cat['nom_poste'] . '" aria-selected="true">
                                                    <i class="fa text-light fa-cubes"></i> Inventaire
                                                </a>
                                                <a class="nav-item nav-link" id="nav-home2' . $cat['nom_poste'] . '" data-toggle="tab" href="#custom-home2' . $cat['nom_poste'] . '" role="tab" aria-controls="nav-home2' . $cat['nom_poste'] . '" aria-selected="false">
                                                    <i class="fa text-light fa-plus"></i> Nouveaux produits
                                                </a>
                                            </div>
                                        </nav>

                                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-stockdispo' . $cat['nom_poste'] . '">
                                            <!--Nouveau tab -->
                                            <div class="tab-pane fade p-4" id="custom-home2' . $cat['nom_poste'] . '" role="tabpanel" aria-labelledby="nav-home' . $cat['nom_poste'] . '">

                                                <!--Hema feed-->
                                                <div id="divdrop2' . $cat['nom_poste'] . '" class="dropdown-divider"></div>
                                                    <div id="divcontain1' . $cat['nom_poste'] . '" class="mt-1 mb-3 p-2 button-container">
                                                        <small id="small1" class="text-theme"><i style="font-size: small;" class="fa fa-circle"></i><strong> Produits à fournir :</strong></small>
                                                        <div class="accordion" id="accordionmagposte' . $cat['nom_poste'] . '">';


                            if (isset($magasin)) {
                                foreach ($magasin as $key => $cate) {

                                    echo '
                                                            
                                                            <div id="chak_magasin' . $cat['nom_poste'] . $cate['id_mgsin'] . '" style="border-top-left-radius: 20px;border-top-right-radius: 20px;" class="card shadow">
                                                                <div style="border-radius: 30px;" class="card-header accordion-header p-1" id="headinmag' . $cat['nom_poste'] . $cate['id_mgsin'] . '">
                                                                    <h5 class="mb-0 panel-title-2">
                                                                        <button style="border-radius: 30px;" class="btn btn-link accordion-btn collapsed" type="button" data-toggle="collapse" data-target="#mag' . $cat['nom_poste'] . $cate['id_mgsin'] . '" aria-expanded="false" aria-controls="mag' . $cat['nom_poste'] . '">
                                                                            ' . $cate['num_magasin'] . '
                                                                        </button>
                                                                    </h5>
                                                                </div>

                                                                <div id="mag' . $cat['nom_poste'] . $cate['id_mgsin'] . '" style="border-radius: 30px;" class="collapse" aria-labelledby="headingmag' . $cat['nom_poste'] . $cate['id_mgsin'] . '" data-parent="#accordionmagposte' . $cat['nom_poste'] . '">
                                                                    <div class="card-body p-3 text-justify accordion-body" style="border-radius: 30px;" >
                                                                        <div id="jsGrid_mag' . $cat['nom_poste'] . $cate['id_mgsin'] . '">
                                                                        </div>
                                                                        <div id="externalPagermag' . $cat['nom_poste'] . $cate['id_mgsin'] . '" class="external-pager text-primary" style="width: 60%;margin-left:20%;padding-left:20px;height:50px;border-radius:30px;opacity:80%;" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                }
                            }
                            echo '                         
                                                        </div>

                                                    </div>
                                                
                                                    
                                                    <div class="card shadow" id="panier' . $cat['nom_poste'] . '">
                                                        <div style="width:90%; margin-left:5%; padding-top:8px;" class="row">
                                                            <!--Logo-->
                                                            <div style="margin-top: 80px;margin-left:5%;" class="col-sm-12 pl-0  header-logo">
                                                                 <!-- header de la page pour impression -->
                                                                <div id="header" class="tabulator-print-header">
                                                                    <div style="display: box;margin-top:5%">
                                                                        <div class="text-center">
                                                                            <small style="font-weight:600;" class="text-dark">GESTION DES KITS</small>
                                                                        </div>
                                                                        <img src="'.base_url().'/assets/img/ipb.png" width="110px" id="imgpasteur' . $cat['nom_poste'] . '" alt="Logo Institut Pasteur">
                                                                        <div style="font-size: 12px;">
                                                                            <small style="padding-left: 0.5%;">UNITES DE SUPPORT</small></br>
                                                                            <small style="padding-left: 4.5%;">*_*_*_*</small></br>
                                                                            <small>SERVICE DE LOGISTIQUE</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Logo-->
                                                            <div>
                                                            </div>
                                                            <div style="margin-top: 20px;">
                                                                <h4 style="color:#02518d;text-align:center;" class="legend"><strong><ins>' . strtoupper("Bon d'approvisionnement") . '</ins></strong></h4>
                                                            </div>
                                                            
                                                            <div style="margin-top: 30px;padding-right:75%;">
                                                                <p><strong><span id="idle' . $cat['nom_poste'] . '" style="color:#02518d"><ins>N°:</ins></span></strong><span class="text"> </span></p>
                                                                <p><span style="color:#02518d"><strong><ins>Pour:</ins></strong></span><span class="text">' . ' ' . $cat['nom_poste'] . '</span></p>
                                                                <p><span style="color:#02518d"><strong><ins>Date du:</ins></strong></span><span id="bonLivraison_' . $cat['id_poste'] . '" class="text"> </span></p>
                                                                <p><span style="color:#02518d"><strong><ins>Responsable:</ins></strong></span><span id="RespoOperation_' . $cat['nom_poste'] . '" class="text"> </span></p>
                                                            </div>
                                                            <table class="table table-bordered table-hover paniertable" data-idlivr="" style="justify-content: center; align-items: center;" style="justify-content: center; align-items: center;" id="cart' . $cat['nom_poste'] . '">
                                                                <thead style="background-color: #02518d; color:white" class="">
                                                                    <tr>
                                                                        <th>Produit</th>
                                                                         <th>Nº Lot</th>
                                                                        <th>Conditionnement</th>
                                                                        <th>Date d\'expiration</th>
                                                                        <th>Quantité</th>
                                                                        <th>Provenance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbody' . $cat['nom_poste'] . '"></tbody>
                                                            </table>
                                                        </div>
                                                        <div id="prod' . $cat['nom_poste'] . '" style="margin-top: 40px;" class="card shadow">
                                                            <div class="row" style="margin-left: 40px;">
                                                                <a id="pay' . $cat['nom_poste'] . '" class="waves-effect waves-light orange white-text"><span id="tt' . $cat['nom_poste'] . '" style="padding-left: 30px;" class="total"></span> </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="divbouton' . $cat['nom_poste'] . '" style="margin-top:20px;display: flex;">
                                                        <div style="margin-top: 10px;margin-left:85%;" class="">
                                                            <button hidden onclick=\'$("#cart' . $cat['nom_poste'] . '").tblToExcel(' . $cat['nom_poste'] . ');\' id="btn_imp_exl' . $cat['nom_poste'] . '" class="btn btn-success shadow-sm " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Générer le fichier Excel"><span class="text-light"><small><strong>Excel </small></strong></span><i class="fa  fa-download text-light"></i></button>

                                                        </div>
                                                        <div style="margin-top: 10px;margin-left:1%" class="">

                                                            <button hidden id="btnfinal' . $cat['nom_poste'] . '" class="btn  btn-success " data-toggle="tooltip" data-placement="right" data-original-title="Veuillez à sélectionner d\'abord les produits"><span class="text-light small"><strong>Valider </strong></span><i class="fa fa-check text-light"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Hema feed -->
                                                
                                                <!--Personal info tab-->
                                                <div class="tab-pane fade active show p-4" id="custom-profile2' . $cat['nom_poste'] . '" role="tabpanel" aria-labelledby="nav-profile2' . $cat['nom_poste'] . '">

                                                    <div class="mt-5 mb-4">
                                                        <span class="mb-2 small">Les 3 dernières livraisons</span>
                                                        <table data-response1="" data-response2="" class="table table-hover table-striped" id="stock_modaltable' . $cat['nom_poste'] . '">
                                                            <thead>
                                                                <tr>
                                                                    <th>Livraison</th>
                                                                    <th>Date</th>
                                                                    <th>Document</th>
                                                                    <th class="text-primary">Détails</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbodyInv' . $cat['nom_poste'] . '"></tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <!--/Personal info tab-->
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>

                        </div>
                    </div>
                    ';
                        }
                    }

                    ?>
                    <!--MODAL END-->

                </div>
                <!--/Dashboard widget-->

                <!--Footer-->
                <div style="padding-top: 70px;" class="row mt-5 mb-4 footer">
                    <div class="col-sm-8">
                        <span class="small">&copy; Tous droits reservés<a class="text-info" href="<?= base_url() ?>/#"> Institut Pasteur de Bangui</a></span>
                    </div>
                </div>
                <!--Footer-->
            </div>
            <!--content right -->

        </div>
        <!--Main Content-->

    </div>
    <!--Page Wrapper-->
    
    <!--preloader-->
    <script src="<?= base_url() ?>/assets/preloader/dist/prelodr.js"></script>            
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery-3.7.1.js"></script>
    <!--Sweet alert JS-->
    <script src="<?= base_url() ?>/assets/js/sweetalert.js"></script>
    <!--Popper JS-->
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <!--Sweet alert JS-->
    <script src="<?= base_url() ?>/assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <script src="<?= base_url() ?>/assets/js/progressbar.min.js"></script>
    <!--Flot.JS-->
    <script src="<?= base_url() ?>/assets/js/charts/jquery.flot.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/charts/jquery.flot.pie.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/charts/jquery.flot.categories.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/charts/jquery.flot.stack.min.js"></script>
    <!--Chart JS-->
    <script src="<?= base_url() ?>/assets/js/charts/chart.min.js"></script>
    <!--Chartist JS-->
    <script src="<?= base_url() ?>/assets/js/charts/chartist.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/charts/chartist-data.js"></script>
    <script src="<?= base_url() ?>/assets/js/charts/demo.js"></script>
    <!--Maps-->
    <script src="<?= base_url() ?>/assets/js/maps/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url() ?>/assets/js/maps/jvector-maps.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="<?= base_url() ?>/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="<?= base_url() ?>/assets/js/calendar/demo.js"></script>
    <!--Nice select-->
    <script src="<?= base_url() ?>/assets/js/jquery.nice-select.min.js"></script>
    <!--JsGrid table-->
    <script src="<?= base_url() ?>/assets/js/jsgrid.min.js"></script>
    <!--Alertify JS-->
    <script src="<?= base_url() ?>/assets/js/alertify.min.js"></script>
    <!--Custom Js Script-->
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
    <!--Custom Js Script-->
    <!--Librairie de Excel -->
    <script src="<?= base_url() ?>/assets/js/jquery.tableToExcel.js"></script>
    <!--Librairie de Excel -->
    <script>
        //Nice select
        $('.bulk-actions').niceSelect();
    </script>
    <script type="text/javascript">
        var base = "<?= base_url() ?>";
    </script>

    <script>
        //Scripts pour créer de nouveaux services a partir des noms entrés par l'user
        function click1() {
            $(function() {
                $("#rename").prop('hidden', false);
            });
        }
        function close_mod() {
            $(function() {
                $("#rename").prop('hidden', true);
            });
        }

        function creer_serv() {
            $(function() {
                var valu = $('#name_serv').val();
                if (valu != "") {
                    swal({
                        title: "Info",
                        text: "Vous allez créer un nouveau service",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then(function(willSave) {
                        if (willSave) {
                            //$('body').prelodr('in', 'Opération en cours...');
                            $.ajax({
                                url: "/createservice",
                                method: 'POST',
                                data: {
                                    'nom_poste': valu
                                },
                                dataType: 'json',

                            }).done(function(data) {
                                //$('#bodyPage').prelodr('out', function(done) {
                                    setTimeout(function() {
                                        //done();
                                        swal('Info', 'L\'entité a été créée avec succès !', 'success').then(function() {

                                            location.reload();
                                        });
                                    }, 2000);

                                //});


                            }).fail(function(data2) {
                                alert('Une erreur est survenue !');
                            });
                        }
                    });
                } else {
                    swal({
                        title: "SVP",
                        text: "Veuillez remplir le champ du formulaire",
                        icon: "warning",
                        dangerMode: false,
                    });
                }
            });
        }
    </script>



    <script>
        $('#cloche').on('click', function(e) {
            e.preventDefault();
            $('#notif_body').prop('hidden', false);

        });

        var nbre = 1;
        var nbre2 = 0;

        <?php
        if (isset($notifications) and $notif_total != 0 and isset($alerts)) { ?>
            $('#badge_notif').prop('class', 'badge badge-danger');
        <?php } elseif (isset($notifications) and $notif_total == 0 and isset($alerts)) { ?>
            $('#badge_notif').text('notifications');
        <?php } ?>

        $(document).on('click', function() {
            <?php

            if (isset($notifications) and $notif_total != 0 and isset($alerts)) { ?>
                if (nbre == 1) {
                    // Créez un nouvel objet Audio
                    var audio = new Audio('<?= base_url("/assets/audio/ping.mp3") ?>');
                    var audio2 = new Audio('<?= base_url("/assets/audio/pop_up.mp3") ?>');

                    setTimeout(() => {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.notify('Vous avez de nouvelles notifications !', 'custom', 6, function() {
                            console.log('dismissed');

                        }).dismissOthers();
                    }, 0)

                    // Jouez le son
                    audio2.play();

                    setTimeout(function() {
                        // Jouez le son
                        audio.play();
                    }, 1000);

                    setTimeout(function() {
                        // Jouez le son
                        audio2.play();
                    }, 6000);
                    nbre = nbre2;
                }
            <?php }

            ?>

        });
    </script>

    <script>
        //function montrant le nombre de notification
        function notif_number() {
            $(document).ready(function() {

                $.ajax({
                    url: '/nombre_notification',
                    method: 'POST',
                }).done(function(data) {
                    if (data > 0) {
                        $('#badge_notif').text(data);
                    }

                }).fail(function(data) {
                    alert('nbre de notification introuvable !');
                });

            });
        }

        notif_number();

        //function pour marquer une notification comme étant lue
        function markAs(id_notif) {

            // Créez un nouvel objet Audio
            var audio3 = new Audio('<?= base_url("/assets/audio/pop_up.mp3") ?>');
            // Jouez le son
            audio3.play();
            $.ajax({
                url: '/marquerlu',
                method: 'POST',
                data: {
                    'idnotif': id_notif,
                },

            }).done(function(data) {
                var nbre_new = $('#badge_notif').text() - 1;
                if (nbre_new > 0) {

                    $('#badge_notif').text(nbre_new);
                } else {
                    $('#badge_notif').prop('class', 'badge badge-primary');
                    $('#badge_notif').text('notifications');
                    $('#notif_body').prop('style', 'display: block; overflow-y:none;height:130px;');
                    $('#notif_body').html(' <a class="dropdown-item text-center" href="#"><strong><span class="text-secondary">Notifications</span></strong></a><div class="dropdown-divider"></div><a href="#" class="dropdown-item"><div class="media alert alert-warning alert-dismissible fade show" role="alert"><div class="media-body"><span>Aucune notification pour le moment.</span></div></div><div class="dropdown-divider"></div></a>');
                }



            }).fail(function(data) {
                alert('marquer lu échoué !');
            });

        }

        function format_notification() {
            if (<?= $notif_total ?> == 0) {
                $('#notif_body').prop('style', 'display: block; overflow-y:none;height:130px;');
                $('#notif_body').html(' <a class="dropdown-item text-center" href="#"><strong><span class="text-secondary">Notifications</span></strong></a><div class="dropdown-divider"></div><a href="#" class="dropdown-item"><div class="media alert alert-warning alert-dismissible fade show" role="alert"><div class="media-body"><span>Aucune notification pour le moment.</span></div></div><div class="dropdown-divider"></div></a>');
            }
        }

        format_notification();
    </script>


    <script>
        $(function() {
            $.ajax({
                url: "/menumagasin",
                method: 'get',
                dataType: 'json',
            }).done(function(data2) {

                var list2 = JSON.stringify(data2);
                var list3 = Object.entries(JSON.parse(list2));

                //sorte de mapping ou parcours d'un objet en affichant une de ses propriétés données
                var nummag = list3.map(function(item) {
                    return item[1].num_magasin; // Retournez la propriété 'num_magasin' de chaque objet.
                });
                var urlmag = list3.map(function(item) {
                    return item[1].url_magasin; // Retournez la propriété 'url_magasin' de chaque objet.
                });
                var id_mag = list3.map(function(item) {
                    return item[1].id_mgsin; // Retournez la propriété 'id_magasin' de chaque objet.
                });
                var idstock = list3.map(function(item) {
                    return item[1].id_stock; // Retournez la propriété 'id_stock' de chaque objet.
                });

                var magasin;
                var url_magasin;
                var id_magasin;
                var id_stock;

                nummag.forEach(function(elm, index) {
                    magasin = nummag[index];
                    url_magasin = urlmag[index];
                    id_magasin = id_mag[index];
                    id_stock = idstock[index];
                    $("#mag").append('<li class="child"><a href="' + base + url_magasin + '/' + id_stock + '" class="ml-4"><i class="fa fa-angle-right mr-2"></i>' + magasin + '</a></li>');
                    //console.log(url_magasin+" "+id_magasin+" "+magasin+"\n");
                });

            }).fail(function(data22) {
                alert('Une erreur est survenue.');
            });
        });
    </script>

    <?php

    //Pour  montrer le lien vers le profil utilisateur en fonction de l'utilisateur
    //Si l'user est un admin, on aura "Compte et utilisateurs", etc.
    if (isset($permission)) {
        if ($permission == "Administrateur") { ?>
            <script type="text/javascript">
                $('#lienprofile').html('<i class="fa fa-cog"> Paramètre et administration</i>');
                $('#lienprofile').attr('href', base + '/profileadmin');
                $('#lienprofile2').attr('hidden', false);
                $('#divider_2').attr('hidden', false);
                $('#lienprofile2').html('<i class="fa fa-shield"> Pare-feu</i>');
                $('#lienprofile2').attr('href', base + '/firewall/panel');
            </script>
    <?php }
    }

    ?>


    <!--Script empêchant l'accès à la page par certains utilisateurs  -->
    <?php if (isset($permission)) {
        if ($permission == "Directeur Général") {

    ?>
            <script type="text/javascript">
                $(function() {
                    location.assign(base + "/");
                });
            </script>

    <?php }
    } ?>
    <!--end script -->

    <script type="text/javascript">
        function color2(valeur, classe1, classe2) {
            $(function() {
                $('.' + valeur + '').on('mouseenter', function() {
                    $('.' + valeur + '').prop('class', classe1);
                });
                $('.' + valeur + '').on('mouseleave', function() {
                    $('.' + valeur + '').prop('class', classe2);
                });
            });
        }

        function color1(valeur, style1, style2) {
            $(function() {
                $('.' + valeur + '').on('mouseenter', function() {
                    $('.' + valeur + '').prop('style', style1);
                });
                $('.' + valeur + '').on('mouseleave', function() {
                    $('.' + valeur + '').prop('style', style2);
                });
            });
        }

        function style(valeur, style1, style2) {
            $(function() {
                $('#' + valeur + '').on('mouseenter', function() {
                    $('#' + valeur + '').prop('style', style1);
                });
                $('#' + valeur + '').on('mouseleave', function() {
                    $('#' + valeur + '').prop('style', style2);
                });
            });
        }
        style('bacterio', 'font-size:40px;border:dotted 2px grey; border-radius:30px;', 'font-size:20px; border-radius:20px;border:grey 1px solid');
        style('btn_imp_pdf', 'font-size:15px;border:solid 2px red;', '');
        style('btn_imp_exl', 'font-size:15px;border:solid 2px green;', '');
        style('btnfinal', 'font-size:15px;border:solid 2px white;', '');
        style('sero', 'font-size:40px;border:dotted 2px grey; border-radius:30px;', 'font-size:20px; border-radius:20px;border:grey 1px solid');
        style('micro', 'font-size:40px;border:dotted 2px grey; border-radius:30px;', 'font-size:20px; border-radius:20px;border:grey 1px solid');
        style('hemato', 'font-size:40px;border:dotted 2px grey; border-radius:30px;', 'font-size:20px; border-radius:20px;border:grey 1px solid');
        style('parasito', 'font-size:40px;border:dotted 2px grey; border-radius:30px;', 'font-size:20px; border-radius:20px;border:grey 1px solid');
        style('virulo', 'font-size:40px;border:dotted 2px grey; border-radius:30px;', 'font-size:20px; border-radius:20px;border:grey 1px solid');
        color1('gran', 'font-size:20px', 'font-size:15px;');
        color2('bleu1', 'btn btn-primary btn-round shadow pull-right bleu1', 'btn btn-dark-light shadow pull-right bleu1');
        color1('bleu3', 'background-color:orange', 'background-color:#cb0000;');

        // Variables globales
        var totals = 0;
        var data_hema = [];
        var gridInstance = null;
        var impression = null;

        function getlivreur() {
            $(function() {
                $.ajax({
                    url: "/getUserlivreur",
                    method: "GET",
                    dataType: "json",
                }).done(function(data) {

                    <?php

                    if (isset($poste)) {
                        foreach ($poste as $key => $cat) {    ?>

                            // alert("Le responsable est retrouvé");
                            $('#RespoOperation_<?= $cat['nom_poste'] ?>').html("    " + data.toUpperCase());


                    <?php    }
                    }
                    ?>
                }).fail(function(data) {
                    alert("Le responsable n'a pas pu être sélectionné.");
                });
            });
        }

        function getid_livr(cartt, idlee) { //pour récupérer l'id d'une livraison et ajouter +1 afin d'afficher sur le bon de la prochaine livraison 
            $(function() {
                var res = null;
                $.ajax({
                    url: "/getidlivraison",
                    method: "GET",
                }).done(function(data) {
                    //alert("idlivr récup");
                    //console.log(Object.entries(JSON.parse(data)));
                    res = Object.entries(JSON.parse(data))

                    $(idlee).html("<ins>N°:  </ins>" + res[0][1]);
                    $(cartt).attr('data-idlivr', res[0][1]);

                }).fail(function() {
                    alert('idlivraison non recup');
                });
                if (res !== 0) {
                    return res;
                };
            })
        }

        <?php

        if (isset($poste)) {

            foreach ($poste as $key => $cat) { ?>

                getid_livr("#cart<?= $cat['nom_poste'] ?>", "#idle<?= $cat['nom_poste'] ?>");
        <?php }
        }
        ?>

        // fonction qui initialise et coordonne toutes les opérations sur mes jsGrid (tous les magasins)
        function tableau_mag(magasin, id_stock, pager, poste, num_magasin, id_magasin, tt, id_poste, cart, idle, btn_imp_pdf, imgpasteur, panier, btnfinal, tbody, Modal, stock_modaltable, tbodyInv, accordion) {
            getlivreur();

            $(function() {
                var $total_p = $(tt);
                $total_p.html('<span style="color:red"><ins><strong>Total:</strong></span></span>' + "  " + totals + "  " + "<strong>Produit</strong>");
                var index_ = null;

                $(magasin).jsGrid({
                    height: "500px",
                    width: "100%",
                    filtering: true,
                    heading: true,
                    editing: true,
                    inserting: false,
                    sorting: true,
                    selecting: true,
                    invalidMessage: "La donnée entrée est invalide !",
                    paging: true,
                    autoload: true,
                    noDataContent: "Pas de données disponibles",
                    pageSize: 7,
                    pageButtonCount: 5,
                    pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} sur {pageCount}",

                    pagePrevText: "Précédente",
                    pageNextText: "Suivante",
                    pageFirstText: "Première",
                    pageLastText: "Dernière",
                    pagerContainer: pager,
                    pageIndex: 1,

                    loadIndication: true,
                    loadIndicationDelay: 500,
                    loadMessage: "Chargement...",
                    loadShading: true,
                    locale: "fr",

                    onInit: function(args) {
                        gridInstance = args.grid;
                    },

                    controller: {
                        loadData: function(filter) {
                            var deferred = $.Deferred();
                            $.ajax({
                                url: base + "/tableau_loadall/" + id_stock,
                                type: "GET",
                                data: filter,
                                dataType: "json",
                                success: function(response) {},
                                error: function(error, jqXHR, textStatus) {
                                    console.error("Error :" + error);
                                }

                            }).done(function(d) {
                                // alert("données du jsgrid récupérées");
                                deferred.resolve(d);
                            }).fail(function() {
                                alert("erreur de recup des données");
                            });

                            return deferred.promise();
                            $(magasin).jsGrid("loadData");
                        }

                    },
                    search: function(filter) {
                        // search with current grid filter
                        $(magasin).jsGrid("search");

                    },
                    invalidNotify: function(args) {
                        var messages = $.map(args.errors, function(error) {
                            return error.field + ": " + error.message;
                        });

                        console.log(messages);
                    },

                    onItemUpdated: function(item) {

                        //Création de la promesse
                        var deferred = $.Deferred();
                        var qté_dispo = item.item['qtite_prod'];
                        var prod = item.item['desc'];
                        var catg = item.item['libelle'];
                        var lot = item.item['lot'];
                        var exp = item.item['dateExp'];
                        var unite = item.item['unite'];
                        var id = item.item['id_prod'];
                        var id_prod_stock = item.item['id_prod_stock'];
                        var qté_p = item.item['qtité_prise'];
                        var index = item.itemIndex;
                        var livraison = $(idle).val();
                        var $tr = null;

                        var $row = this.rowByItem(item.item);
                        var $cell0 = $row.children().eq(0);
                        var $cell1 = $row.children().eq(1);
                        var $cell2 = $row.children().eq(2);
                        var $cell3 = $row.children().eq(3);
                        var $cell4 = $row.children().eq(4);
                        var $cell5 = $row.children().eq(5);
                        var $cell6 = $row.children().eq(6);
                        var $cell7 = $row.children().eq(7);
                        var $cell8 = $row.children().eq(8);
                        var $cell9 = $row.children().eq(9);

                        //verification de la quantité disponible
                        if (qté_p > qté_dispo) {
                            swal("Le stock disponible est insuffisant pour cette quantité !", {
                                icon: "error",
                            });
                        } else

                        {

                            alertify.set('notifier', 'position', 'top-right');
                            alertify.notify('Ajouté au panier.', 'success', 2, function() {}).dismissOthers();

                            //Ajout des produits sélectionnés dans le panier qui est le tableau
                            if ((totals % 2 == 0)) {
                                if (exp == null) {
                                    $tr = $('<tr style="background:#cce5ff" id="tr' + id + '"data-index="' + index + '" data-qte="' + qté_dispo + '" data-stock="' + id_stock + '" data-id="' + id + '" data-id_prod_stock="' + id_prod_stock + '" data-unite="' + unite + '" data-mag="' + id_magasin + '"></tr>');
                                    $tr.html('<td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + prod + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + lot + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + unite + '</center></td><td style="padding-top: 10px;padding-bottom:10px;padding-left: 20px; padding-right:20px;">' + '<center>non expirable</center>' + '</td><td style="padding-top: 10px;padding-bottom:10px;padding-left: 20px; padding-right:20px;"><center>' + qté_p + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + num_magasin + '</center></td><td id="' + qté_p + qté_dispo + 'td' + '"><button id="' + qté_p + qté_dispo + 'btn' + id + '" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>').appendTo($(cart + ">tbody"));
                                } else {
                                    $tr = $('<tr style="background:#cce5ff" id="tr' + id + '"data-index="' + index + '" data-qte="' + qté_dispo + '" data-stock="' + id_stock + '" data-id="' + id + '" data-id_prod_stock="' + id_prod_stock + '" data-unite="' + unite + '" data-mag="' + id_magasin + '"></tr>');
                                    $tr.html('<td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + prod + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + lot + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + unite + '</center></td><td style="padding-top: 10px;padding-bottom:10px;padding-left: 20px; padding-right:20px;"><center>' + exp + '</center></td><td style="padding-top: 10px;padding-bottom:10px;padding-left: 20px; padding-right:20px;"><center>' + qté_p + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + num_magasin + '</center></td><td id="' + qté_p + qté_dispo + 'td' + '"><button id="' + qté_p + qté_dispo + 'btn' + id + '" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>').appendTo($(cart + ">tbody"));
                                }
                            } else if (totals % 2 == 1) {
                                if (exp == null) {
                                    $tr = $('<tr style="background:#6bff81;" id="tr' + id + '"data-index="' + index + '" data-qte="' + qté_dispo + '" data-stock="' + id_stock + '" data-id="' + id + '" data-id_prod_stock="' + id_prod_stock + '" data-unite="' + unite + '" data-mag="' + id_magasin + '"></tr>');
                                    $tr.html('<td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + prod + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + lot + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + unite + '</center></td><td style="padding-top: 10px;padding-bottom:10px;padding-left: 20px; padding-right:20px;">' + '<center>non expirable</center>' + '</td><td style="padding-top: 10px;padding-bottom:10px;padding-left: 20px; padding-right:20px;"><center>' + qté_p + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + num_magasin + '</center></td><td id="' + qté_p + qté_dispo + 'td' + '"><button id="' + qté_p + qté_dispo + 'btn' + id + '" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>').appendTo($(cart + ">tbody"));
                                } else {
                                    $tr = $('<tr style="background:#6bff81;" id="tr' + id + '"data-index="' + index + '" data-qte="' + qté_dispo + '" data-stock="' + id_stock + '" data-id="' + id + '" data-id_prod_stock="' + id_prod_stock + '" data-unite="' + unite + '" data-mag="' + id_magasin + '"></tr>');
                                    $tr.html('<td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + prod + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + lot + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + unite + '</center></td><td style="padding-top: 10px;padding-bottom:10px;padding-left: 20px; padding-right:20px;"><center>' + exp + '</center></td><td style="padding-top: 10px;padding-bottom:10px;padding-left: 20px; padding-right:20px;"><center>' + qté_p + '</center></td><td style="padding-left: 30px; padding-right:30px;padding-top:10px; padding-bottom:10px;"><center>' + num_magasin + '</center></td><td id="' + qté_p + qté_dispo + 'td' + '"><button id="' + qté_p + qté_dispo + 'btn' + id + '" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>').appendTo($(cart + ">tbody"));
                                }
                            }
                            //Ajouter une icone de validation au champ de quantité rempli par l'utilisateur
                            $cell5.html('<i class="fa fa-check text-primary"></i>');
                            $cell0.html('<i class="fa fa-check text-primary"></i>');
                            $cell8.html('<i class="fa fa-check text-success"></i>');
                            $cell9.html('<i class="fa fa-check text-primary"></i>');

                            // Changez la couleur du champ
                            $cell0.addClass("edited-cell");
                            $cell1.addClass("edited-cell");
                            $cell2.addClass("edited-cell");
                            $cell3.addClass("edited-cell");
                            $cell4.addClass("edited-cell");
                            $cell5.addClass("edited-cell");
                            $cell6.addClass("edited-cell");
                            $cell7.addClass("edited-cell");
                            $cell8.addClass("edited-cell");
                            $cell9.addClass("edited-cell");
                            //Ajoute une propriété "éditée" à une ligne pour indiquer qu'elle a été modifiée
                            item.item.edited = true;

                            totals += 1;
                            if (totals <= 1) {
                                $total_p.html('<span style="color:red"><ins><strong>Total:</strong></ins></span>' + "  " + totals + "  " + "<strong>Produit</strong>");
                            }
                            if (totals > 1) {
                                $total_p.html('<span style="color:red"><ins><trong>Total:</strong></ins></span>' + "  " + totals + "  " + "<strong>Produits</strong>");
                            }


                            //Les boutons de suppression des produits du panier
                            $('#' + qté_p + qté_dispo + 'btn' + id + '').on('click', function() {
                                swal({
                                        title: "Etes-vous sûr?",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {

                                            //Récupère l'id du <tr> à supprimer
                                            var $this = $("#tr" + id + "");
                                            $this.addClass("removing").slideUp(function() {
                                                $this.remove();
                                            });

                                            swal("Supprimé !", {
                                                icon: "success",
                                            });
                                            totals--;
                                            if (totals <= 1) {
                                                $total_p.html('<span style="color:red;"><ins><strong>Total:</strong></ins></span>' + "  " + totals + "  " + "<strong>Produit</strong>");
                                                $('#btn_imp_exl' + btn_imp_pdf).removeAttr('hidden');
                                                $(btnfinal).removeAttr('hidden');
                                            }
                                            if (totals > 1) {
                                                $total_p.html('<span style="color:red"><ins><strong>Total:<strong></ins></span> ' + "  " + totals + "  " + "<strong>Produits</strong>");
                                                $(btnfinal).attr('hidden');
                                                $('#btn_imp_exl' + btn_imp_pdf).attr('hidden');
                                            }
                                            $cell5.text("");

                                            $cell0.addClass("unedited-cell");
                                            $cell1.addClass("unedited-cell");
                                            $cell2.addClass("unedited-cell");
                                            $cell3.addClass("unedited-cell");
                                            $cell4.addClass("unedited-cell");
                                            $cell5.addClass("unedited-cell");
                                            $cell6.addClass("unedited-cell");
                                            $cell7.addClass("unedited-cell");
                                            $cell8.addClass("unedited-cell");
                                            $cell9.addClass("unedited-cell");

                                            item.item.edited = false;


                                        } else {
                                            swal("Annulé !", {
                                                icon: "success",
                                            });
                                        }
                                    });

                            });


                            function donne_json() {
                                var datajson_hema = [];

                                $(cart + ' ' + 'tr').each(function() {

                                    var prod = $(this).find('td:eq(0)').text();
                                    var lo = $(this).find('td:eq(1)').text();
                                    var condt = $(this).find('td:eq(2)').text();
                                    var date = $(this).find('td:eq(3)').text();
                                    var qte = $(this).find('td:eq(4)').text();
                                    var prov = $(this).find('td:eq(5)').text();

                                    // Ignore les lignes vides
                                    if (prod !== "" && date !== "" && qte !== "" && prov !== "") {
                                        var row = {};
                                        //row['produit'] = prod;
                                        row['id_stock'] = $(this).data('stock');
                                        row['id_prod_stock'] = $(this).data('id_prod_stock');
                                        row['qtite_prod'] = $(this).data('qte');
                                        row['id_prod'] = $(this).data('id');
                                        row['qtite_livr'] = qte;
                                        row['lot'] = lo;
                                        row['unite'] = condt;
                                        row['id_livr'] = $(cart).data('idlivr');
                                        row['id_magasin'] = $(this).data('mag');

                                        datajson_hema.push(row);
                                    }
                                });

                                return datajson_hema;
                            }

                            $('#btn_imp_exl' + btn_imp_pdf).removeAttr('hidden');
                            $(btnfinal).removeAttr('hidden');

                            function sauvegarde() {
                                $(btnfinal).on("click", function(e) {
                                    e.preventDefault();


                                    <?php $imagePath = getenv('IMAGE_PATH') . 'ipb.png';
                                    $imageData = file_get_contents($imagePath);
                                    $src =  'data:' . mime_content_type($imagePath) . ';base64,' . base64_encode($imageData);
                                    ?>
                                    var image = $(imgpasteur).attr('src', '<?php echo $src; ?>');
                                    var divContent = $(panier).html();


                                    swal({
                                        title: '',
                                        text: "Avez-vous déjà enregistré en format Excel ?",
                                        icon: "warning",
                                        buttons: true,
                                        buttons: ['Annuler', 'Oui'],
                                        dangerMode: true,
                                    }).then(function(willSave) {
                                        if (willSave) {

                                            swal({
                                                text: "Etes-vous sûr?",
                                                icon: "warning",
                                                buttons: true,
                                                buttons: ['Revenir', 'Oui'],
                                                dangerMode: true,
                                            }).then(function(willSave) {
                                                if (willSave) {

                                                    if (totals !== 0) {
                                                        $("#" + qté_p + qté_dispo + 'td' + "").hide();
                                                        var mesData = donne_json();
                                                        $.ajax({
                                                            url: "/savelivraison",
                                                            method: "POST",
                                                            data: {
                                                                'tab': mesData,
                                                                'nbre_prod': totals,
                                                                'id_poste': poste,
                                                                'poste': btn_imp_pdf,
                                                            },
                                                        }).done(function(data) {
                                                            //alert("success savelivraison effectué !");
                                                            console.log("voici les donnée:" + data);

                                                            $.ajax({
                                                                url: '/savefile',
                                                                method: 'POST',
                                                                data: {
                                                                    'contenu': divContent,
                                                                    'idlivr': $(cart).data('idlivr'),
                                                                    'nbre_prod': totals,
                                                                    'id_poste': poste,
                                                                },

                                                            }).done(function(data) {
                                                                $("#" + qté_p + qté_dispo + 'td' + "").show();
                                                                //alert("save_file est effectué !");
                                                            }).fail(function(){
                                                                alert("error, save_file n'est pas effectué !");
                                                            });

                                                        }).fail(function(data) {
                                                            alert("error save_livraison n'est pas effectué !");
                                                        });

                                                        swal("Opération effectuée !", {
                                                            icon: "success",
                                                        }).then(function() {
                                                            getid_livr(idle, cart);

                                                            $(cart).each(function() {
                                                                $("#" + tbody).empty();
                                                            });
                                                            totals = 0;
                                                            if (totals <= 1) {
                                                                $total_p.html('<span style="color:red"><ins><strong>Total:</strong></ins></span>' + "  " + totals + "  " + "<strong>Produit</strong>");
                                                            }
                                                            if (totals > 1) {
                                                                $total_p.html('<span style="color:red"><ins><trong>Total:</strong></ins></span>' + "  " + totals + "  " + "<strong>Produits</strong>");
                                                            }
                                                            location.reload();
                                                        });

                                                    } else {
                                                        swal("Il n'ya aucun produit sélectionné !", {
                                                            icon: "error",
                                                        });
                                                    }
                                                }
                                            });
                                        }
                                    });

                                });
                            }
                            donne_json();
                            sauvegarde();
                        }
                    },
                    rowClick: function(args) {
                        var item = args.item;

                        if (args.item.edited) {
                            return;
                        }

                        this.editItem(args.item);
                    },
                    rowClass: function(item, intemIndex) {

                    },
                    fields: [{
                            name: "id_prod",
                            type: "text",
                            css: "text-light",
                            headercss: "text-light",
                            autosearch: true,
                            sorter: "number",
                            editing: false,
                            width: 40,
                            title: "Id"
                        },

                        {
                            name: "desc",
                            autosearch: true,
                            sorter: "string",
                            headercss: "text-primary",
                            type: "text",
                            editing: false,
                            title: "Produit",
                            width: 180
                        },
                        {
                            name: "libelle",
                            autosearch: true,
                            sorter: "string",
                            type: "text",
                            headercss: "text-primary",
                            title: "Catégorie",
                            editing: false,
                            width: 120
                        },
                        {
                            name: "dateExp",
                            autosearch: true,
                            headercss: "text-primary",
                            title: "Date d'expiration",
                            align: "center",
                            sorter: "date",
                            type: "text",
                            editing: false,
                            sorting: true
                        },
                        {
                            name: "qtite_prod",
                            align: "center",
                            headercss: "text-primary",
                            sorter: "number",
                            type: "text",
                            title: 'Quantité disponible',
                            editing: false,
                            width: 100
                        },
                        {
                            name: "qtité_prise",
                            type: "number",
                            align: "center",
                            headercss: "text-primary small",
                            css: "text-primary",
                            title: "Quantité à prendre\n (champ à remplir)",
                            editcss: "text-primary bg-primary",
                            width: 100,
                            validate: [{
                                validator: "min",
                                param: [1],
                                message: function() {
                                    swal('Erreur', 'La quantité ne peut être inférieure ou égale à zéro !', 'error');
                                }
                            }, ]
                        },
                        {
                            name: "unite",
                            autosearch: true,
                            headercss: "text-primary",
                            title: "Conditionnement",
                            align: "center",
                            sorter: "text",
                            type: "text",
                            editing: false,
                            sorting: true
                        },
                        {
                            name: "lot",
                            autosearch: true,
                            sorter: "string",
                            type: "text",
                            headercss: "text-primary",
                            title: "Nº lot",
                            editing: false,
                            width: 120
                        },

                        {
                            name: "",
                            type: "control",
                            deleteButton: false,
                            filtering: true,
                            headercss: "text-danger",
                            clearFilterButton: false,
                            editButton: false,
                            searchButtonTooltip: "Faire une recherche",
                            clearFilterButtonTooltip: "Effacer le filtre",
                            modeSwitchButton: false,
                            editButtonTooltip: "Insérer la quantité du produit à retirer",
                            align: "center",
                            title: "Action",
                            width: 50

                        },
                        {
                            name: "id_prod_stock",
                            type: "text",
                            css: "text-light",
                            headercss: "text-light",
                            autosearch: true,
                            sorter: "number",
                            editing: false,
                            width: 40,
                            title: "Id du Stock"
                        },
                    ],
                });

            });

        }

        function tableau_inventaire(Modal, id_poste, stock_modaltable, tbodyInv, nomposte) {
            $(document).ready(function() {
                var data_response1 = null;
                //Récupérer l'évènement d'ouverture du modal


                var reponseAjax1 = "";
                var reponseAjax2 = "";
                var final1 = "";
                var final2 = "";

                //Requête pour récupérer les informations sur les livraisons.
                $.ajax({
                    url: "/getinfolivraison",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        'id_poste': id_poste,
                    }
                }).done(function(data) {

                    var rep1 = JSON.stringify(data);
                    //reponseAjax1 =  Object.entries(JSON.parse(rep1));
                    //$(stock_modaltable).attr('data-response1', rep1);
                    data_response1 = rep1;
                    console.log(reponseAjax1);

                    $.ajax({
                        url: "/getdoc",
                        method: 'GET',
                        dataType: 'json',
                        data: {
                            'id_poste': id_poste,
                        }
                    }).done(function(data) {

                        var rep2 = JSON.stringify(data);
                        reponseAjax2 = Object.entries(JSON.parse(rep2));

                        // var donneString = $(stock_modaltable).attr('data-response1');
                        var donneString = data_response1;
                        var donne = Object.entries(JSON.parse(donneString));

                        var doc = reponseAjax2.map(function(item) {
                            return item[1].document; // Retournez la propriété 'document' de chaque objet.
                        });
                        var datelivraisons = reponseAjax2.map(function(item) {
                            return item[1].date_livr; // Retournez la propriété 'document' de chaque objet.
                        });
                        var idB = null;
                        var fileP = null;
                        var document = null;
                        var date = null;

                        donne.forEach(function(elm, index) {
                            var index1 = elm[0];
                            var objet1 = elm[1];
                            idB = objet1.id_bonLivr;
                            fileP = objet1.file_path;
                            document = doc[index];
                            date = datelivraisons[index];


                            // Vous pouvez maintenant accéder aux propriétés de l'objet.
                            $(tbodyInv).append('<tr><td>N° ' + idB + '</td><td>' + date + '</td><td>' + document + '</td><td><i id="doc-' + idB + '"  data-path="' + fileP + '" style="font-size:30px;" class="btn fa fa-eye text-primary"></i></td></tr>');

                            //Récupération de l'id  d'un élément <i></i> au clic
                            $('#doc-' + idB + '').on('click', function(e) {
                                e.preventDefault();

                                var chaine = $(this).data('path'); // Récupérez l'URL complète stockée dans l'attribut data-path.
                                var regex = /\/partials\/[a-zA-Z]+\/Bon de livraison_numero \d+-\d+\d+.\w+.\w+/; //expression régulière
                                //var regex2 = /\/partials\//+nomposte+/\/hemato\/Bon de livraison_numero \d+-\d+\d+.\w+.\w+/; //expression régulière
                                var resultat = chaine.match(regex);

                                if (resultat) {
                                    //console.log("Correspondance trouvée : " + resultat[0]);
                                    var fichier = resultat[0];
                                    var url = fichier;

                                    window.open(url, '_blank');

                                } else {
                                    console.log("Aucune correspondance trouvée.");
                                }

                            });
                        });

                        //Récupérer l'id du corps du tableau, s'il n y a pas de données, afficher le texte ci-dessous 
                        if ($(tbodyInv).is(':empty')) {

                            $(tbodyInv).html('<tr style="background-color:white;" class="text-center"><td><span class="smaller">Il n\'y a aucune donnée pour le moment</span></td></tr>');
                        }

                    }).fail(function(data) {
                        alert("2e requête échouée.");
                        console.log(data);
                    });

                }).fail(function(data) {
                    alert('La requête a échoué !');
                });

            });
        }

        //tableau_inventaire("#jsGrid_magHemato",11,"#externalPagermagHemato","Magasin N°1","Hemato",2,"#ttHemato",2,"#cartHemato","#idleHemato","#btn_imp_pdfHemato","#imgpasteurHemato","#panierHemato","#btnfinalHemato","tbodyHemato","#HematoModal","#stock_modaltableHemato","#tbodyInvHemato","#accordionmagposteHemato");
        //tableau_mag("#jsGrid_magHemato",11,"#externalPagermagHemato","Magasin N°1","Hemato",2,"#ttHemato",2,"#cartHemato","#idleHemato","#btn_imp_pdfHemato","#imgpasteurHemato","#panierHemato","#btnfinalHemato","tbodyHemato","#HematoModal","#stock_modaltableHemato","#tbodyInvHemato","#accordionmagposteHemato");

        <?php

        if (isset($poste)) {

            foreach ($poste as $key => $cat) { ?>

                tableau_inventaire("#<?= $cat['nom_poste'] ?>Modal", "<?= $cat['id_poste'] ?>", "#stock_modaltable<?= $cat['nom_poste'] ?>", "#tbodyInv<?= $cat['nom_poste'] ?>", "<?= $cat['nom_poste'] ?>");

                <?php if (isset($magasin)) {
                    foreach ($magasin as $key => $cate) { ?>

                        tableau_mag("#jsGrid_mag<?= $cat['nom_poste'] ?><?= $cate['id_mgsin'] ?>", "<?= $cate['id_stock'] ?>", "#externalPagermag<?= $cat['nom_poste'] ?><?= $cate['id_mgsin'] ?>", "<?= $cat['id_poste'] ?>", "<?= $cate['num_magasin'] ?>", "<?= $cate['id_mgsin'] ?>", "#tt<?= $cat['nom_poste'] ?>", "<?= $cat['id_poste'] ?>", "#cart<?= $cat['nom_poste'] ?>", "#idle<?= $cat['nom_poste'] ?>", "<?= $cat['nom_poste'] ?>", "#imgpasteur<?= $cat['nom_poste'] ?>", "#panier<?= $cat['nom_poste'] ?>", "#btnfinal<?= $cat['nom_poste'] ?>", "tbody<?= $cat['nom_poste'] ?>", "#<?= $cat['nom_poste'] ?>Modal", "#stock_modaltable<?= $cat['nom_poste'] ?>", "#tbodyInv<?= $cat['nom_poste'] ?>", "#accordionmagposte<?= $cat['nom_poste'] ?>");
        <?php }
                }
            }
        }
        ?>

        function current_date_heure(selecteur) {
            $(document).ready(function() {
                var maintenant = new Date();
                var date = maintenant.toLocaleDateString();
                var heure = maintenant.toLocaleTimeString();
                $(selecteur).append(date);
                $(selecteur).attr('data-date', date);
            });
        }

        <?php

        if (isset($poste)) {
            foreach ($poste as $key => $cat) {    ?>
                current_date_heure("#bonLivraison_<?= $cat['id_poste'] ?>");

        <?php   }
        }
        ?>
    </script>
</body>

</html>