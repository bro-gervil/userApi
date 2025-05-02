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
    <!--Pricing-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pricing.css">
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
    <link rel="stylesheet" href="<?= base_url() ?>/assets/js/calendar/bootstrap_calendar.css">
    <!--Nice select -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/nice-select.css">
    <!--preloader -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/preloader/dist/prelodr.min.css">

    <!--Alertify CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/alertify.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/themes/default.rtl.min.css">
    <!--Switchery CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/switchery.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap4-modal-fullscreen.min.css">
    <!--Bootstrap tagsinput css-->
    <!--JsGrid CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jsgrid.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jsgrid-theme.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jq/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jq/jquery-ui.theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jq/jquery-ui.structure.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap-tagsinput.css">


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
    </style>
    <style>
        .containering {
            position: relative;
            text-align: center;
            color: white;
        }

        .centering {
            position: absolute;
            top: 60%;
            right: 72%;
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

    <!--Page Wrapper-->

    <div class="container-fluid">

        <!--Header-->
        <nav class="" role="navigation">
            <div class="row header shadow-lg">

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
                            <div class="menu-icon hover">
                                <a class="" id="cloche" href="<?= base_url() ?>/#" onclick="toggle_dropdown(this); return false" role="button" class="dropdown-toggle">
                                    <i class="fa text-warning fa-bell gran"></i>
                                    <span style="margin-left:6px;" id="badge_notif" class="badge badge-primary"></span>
                                </a>

                                <?php

                                use CodeIgniter\I18n\Time;

                                $GLOBALS['now'] = Time::now('Africa/Bangui', 'en_US'); //donne la datetime du  moment -> 2024-01-08 23:05

                                echo '
                                                <div id="notif_body" hidden class="dropdown dropdown-bottom bg-white shadow border animated bounceOut" style="display: block; overflow-y:scroll;height:300px;">
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
                                                            <a id="unity' . $cat['id_notif'] . '" href="#" class="dropdown-item animated jello">
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

                                echo '                  <div class="dropdown-divider"></div>
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
        </nav>
        <!--Header-->

        <!--Main Content-->

        <div class="row main-content">

            <!--Sidebar left-->
            <div class="col-sm-3 col-xs-6 sidebar pl-0 main-content2">
                <div style="background-color:darkblue" class="inner-sidebar mr-3">
                    <div class="image">
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

            <!--Content right-->
            <div style="background-image:url('<?= base_url() ?>/assets/img/bg-ocean-light2.png');background-size:cover;" class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div style="margin:20px;">
                    <h5 class="mb-0 text-secondary"><strong>Profil utilisateur</strong></h5>
                    <span class="text-secondary">Accueil <i class="fa fa-angle-right"></i> Paramètre et administration</span>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--User profile header-->
                        <div style="border-radius: 1px;" class="mt-1 mb-3 button-container bg-gradient-theme shadow-sm">
                            <div class="profile-bg p-5">
                                <div class="avatar2">
                                    <span style="background-color:#cb0000;" class="g avatar-initial2 text-center text-light"><?= $usr ?></span>
                                </div>
                            </div>
                            <div class="profile-bio-main container-fluid">
                                <div class="row">
                                    <div class="col-md-5 offset-md-3 col-sm-12 offset-sm-0 col-12 bio-header">
                                        <h3 class="mt-4"><?= strtoupper($user) ?></h3>
                                        <span class="text-muted mt-0 bio-request"><?= $permission ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/User profile header-->

                    </div>
                </div>

                <div class="row mt-3">

                    <!-- User profile content -->
                    <div style="margin-left: 10px;" class="col-sm-12">
                        <div style="border-radius: 0px;background-image:url('<?= base_url() ?>/assets/img/bg-ocean-light2.png');background-size:cover;" class="mt-1 mb-3 p-3 button-container shadow-sm custom-tabs">

                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-customContent" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home" data-toggle="tab" href="#custom-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                        <i class="fa fa-user"> Mon compte</i>
                                    </a>
                                    <a class="nav-item nav-link" id="nav-profile" data-toggle="tab" href="#custom-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                        <i class="fa fa-users"> Gestion des utilisateurs</i>
                                    </a>
                                </div>
                            </nav>

                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-customContent">
                                <div class="tab-pane fade show active p-4" id="custom-home" role="tabpanel" aria-labelledby="nav-home">

                                    <!--Single feed-->
                                    <div class="feed-single mb-3">

                                        <div class="table-responsive mb-4">
                                            <table class="table table-borderless table-striped m-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nom complet</th>
                                                        <td id="tdname"></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Adresse e-mail</th>
                                                        <td id="tdmail"></td>
                                                        <td hidden id="newmail"></td>
                                                        <td hidden id="tdmail_input"><input style="width: 300px;" id="mail_input" class="form input-border-bottoms" name="mail_name"><small id="show_error" style="margin-left:5px;" class="text-danger animated jello" hidden>format d'adresse incorrect !</small></td>
                                                        <td id="tdformail">
                                                            <i id="tdmodifymail" role="button" class=" btn btn-outline-light fa fa-edit text-dark"></i>
                                                            <i id="btnvalid" hidden style="font-size:15px;border:1px solid;margin-right:4px;" role="button" class=" btn btn-outline-light fa fa-check text-success"></i>
                                                            <i id="btnskip" hidden style="font-size:15px;border:1px solid;" role="button" class=" btn btn-outline-light fa fa-times text-danger"></i>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mot de passe</th>
                                                        <td id="tdpass">********************</td>
                                                        <td hidden id="tdpass_input1">
                                                            <div>
                                                                <input id="input_pass3" style="border-bottom: 1px solid white;" type="password" placeholder="Ancien mot de passe" class="form form-control" name="pass1_name">
                                                            </div>
                                                            <div>
                                                                <input id="input_pass1" style="border-bottom: 1px solid white;" type="password" placeholder="Nouveau mot de passe" class="form form-control" name="pass1_name">
                                                            </div>
                                                            <div>
                                                                <input id="input_pass2" style="border-bottom: 1px solid white;" type="password" placeholder="confirmer le mot de passe" class="form form-control" name="pass2_name">
                                                            </div>
                                                        </td>
                                                        <td id="tdforpass">
                                                            <i id="btnmodifypass" role="button" class=" btn btn-outline-dark fa fa-edit text-light"></i>
                                                            <i id="btnvalid_pass" hidden style="font-size:15px;border:1px solid;margin-right:4px;" role="button" class=" btn btn-outline-light fa fa-check text-success"></i>
                                                            <i id="btnskip_pass" hidden style="font-size:15px;border:1px solid;" role="button" class=" btn btn-outline-light fa fa-times text-danger"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="dropdown-divider"></div>

                                    </div>
                                    <!--/Single feed-->
                                </div>
                                <!--/Feed tab-->

                                <!--Personal info tab-->
                                <div class="tab-pane fade p-4" id="custom-profile" role="tabpanel" aria-labelledby="nav-profile">
                                    <div class="mt-1 mb-3 button-container border bg-light shadow-sm lh-sm">
                                        <div class="p-2 px-3 mb-0 border-bottom email-chat bg-dark">
                                            <h6 class="mb-0"><span class="align-bottom text-light" style="line-height: 35px;"><i class="fa fa-users"> Utilisateurs</i></span>

                                            </h6>

                                            <div class="clearfix"></div>

                                        </div>

                                        <div id="user_list" class="email-chat-body mt-0">

                                        </div>
                                    </div>
                                </div>
                                <!--/Personal info tab-->
                            </div>
                        </div>
                    </div>
                    <!--/User profile content-->
                    <div class="text-center">
                        <button id="add_user" onclick="showStory();" style="width: 1300px;margin-left:66px" class="btn bg-secondary btn-sm btn-outline-light">
                            <i class="fa fa-user-plus"></i> Historique des opérations
                        </button>
                    </div>
                    <!--User profile sidebar-->
                    <div style="margin-left: 8px;margin-right:10px;" class="col-sm-12">
                        <div style="background-image:url('<?= base_url() ?>/assets/img/bg-ocean-light2.png');background-size:cover;border-radius:8px;" class="mt-1 mb-3 bg-white shadow-lg p-3 button-container">

                            <div style="background-image: url(<?= base_url() ?>/assets/img/belle_image_floue.png);background-size:950px;background-position:10px;border-radius:8px;" class="mb-3">
                                <div class="row user-about">
                                    <div class="col-sm-4 border-right text-center">
                                        <h4 id="user_number" class="text-light badge badge-dark "></h4>
                                        <p id="title1" class="text-dark">Utilisateurs</p>
                                    </div>
                                    <div class="col-sm-4 col-4 text-center">
                                        <h4 id="activated" class="text-light badge badge-dark">0</h4>
                                        <p id="title2" class="text-light">Utilisateurs connectés</p>
                                    </div>
                                    <div class="col-sm-4 col-4 border-left text-center">
                                        <h4 id="deactivated" class="text-light badge badge-dark"></h4>
                                        <p id="title3" class="text-light">Utilisateurs désactivés</p>
                                    </div>
                                </div>
                            </div>

                            <div style="opacity: 40%;" class="dropdown-divider"></div>

                            <div class="mb-3">
                                <h6 class="text-dark text-center">Comptes utilisateurs</h6>
                                <div class="text-center">
                                    <button id="add_user" data-target="#UserModal" data-toggle="modal" style="width: 920px;" class="btn bg-secondary btn-sm btn-outline-light">
                                        <i class="fa fa-user-plus"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /User profile sidebar -->

                    <div style="margin-left: 8px;" class="mt-1 mb-5 button-container col-sm-12">
                        <div style="background-image:url('<?= base_url() ?>/assets/img/bg-ocean-light2.png');background-size:cover;border-radius:8px;" class="card text-center shadow-lg">
                            <div class="card-header">
                                <h6>Magasins</h6>
                            </div>
                            <div style="display:block;" class="card-body col-sm-12">
                                <div class="row" id="les_mags"></div>
                            </div>
                            <div class="row card-footer">
                                <div class="col-lg-12">
                                    <button id="new_magasin" onclick="rename();" style="width: 920px;" class="btn bg-secondary btn-sm btn-outline-light">
                                        <i class="fa fa-plus"></i> Créer un lieu de stockage
                                    </button>
                                </div>
                                <div class="col-lg-10" id="rename" style="padding-left: 17%;" hidden>
                                    <?php

                                    helper('form');
                                    helper('security');
                                    $attributes = [
                                        'id' => 'RenForm',

                                    ];

                                    ?>

                                    <?= form_open('', esc($attributes)) ?>
                                    <?= csrf_field() ?>
                                    <table class="table shadow-lg text-dark" id="r_table">
                                        <tbody>
                                            <tr>
                                                <td>Renommer:</td>
                                                <td style="padding-left: 10%;">
                                                    <input type="text" id="name_mag" style="width: 400px;" class="form-control text-dark">
                                                </td>
                                                <td><button onclick="creer_maga();" type="button" class="btn btn-round btn-outline-dark">Valider</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--modal pour créer un utilisateur-->
                <div class="modal  modal-fullscreen animated fade zoomIn" data-bs-backdrop="static" style="overflow-y: hidden;" data-bs-keyboard="false" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="infoModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-theme">
                            <div class="modal-header">
                                <button type="button" class="close bg-gradient-light btn-light" data-target="#UserModal" data-toggle="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--Floating label-->
                                <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-lg">
                                    <h6 class="mb-3 text-secondary  animated zoomInRight"><i class="fa fa-user-plus text-dark" style="font-size:20px;"></i> Nouvel utilisateur</h6>
                                    <div class="dropdown-divider text-theme"></div>
                                    <div style="margin-left:580px;">
                                        <i class="fa fa-users text-theme animated rubberBand" style="font-size: 150px;"></i>
                                    </div>
                                    <?php

                                    helper('form');
                                    helper('security');
                                    $attributes = [
                                        'id' => 'UserForm',

                                    ];

                                    $name  = 'fullname_name';
                                    $name = encode_php_tags($name);
                                    $email = 'email_name';
                                    $email = encode_php_tags($email);
                                    $login = 'login_name';
                                    $login = encode_php_tags($login);
                                    $password = 'password_name';
                                    $password = encode_php_tags($password);
                                    $group = 'group_name';
                                    $group = encode_php_tags($group);

                                    ?>
                                    <div class="row" style="margin-left: 400px;">
                                        <?= form_open('', esc($attributes)) ?>
                                        <?= csrf_field() ?>
                                        <div class="form-group floating-label input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card text-theme"></i></span>
                                            </div>
                                            <input id="full_name" name="<?= esc($name) ?>" class="form-control" style="width:500px;" type="text" inputmode="name" autocomplete="name" required>
                                            <label id="full_name_label" for="" style="font-size: 14px; margin-left:50px;">Nom complet</label>
                                        </div>
                                        <div id="floating_email" class="form-group floating-label input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope text-theme"></i></span>
                                            </div>
                                            <input id="e_mail" name="<?= esc($email) ?>" class="form-control" style="width:500px;" type="email" inputmode="email" autocomplete="email" required>
                                            <label id="e_mail_label" for="" style="font-size: 14px; margin-left:50px;">E-mail</label>
                                        </div>
                                        <div class="form-group floating-label input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user text-theme"></i></span>
                                            </div>
                                            <input id="login_user" name="<?= esc($login) ?>" class="form-control" style="width:500px;" type="text" required>
                                            <label id="login_label" for="" style="font-size: 14px; margin-left:50px;">Login</label>
                                        </div>

                                        <div class="form-group floating-label input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock text-theme"></i></span>
                                            </div>
                                            <input id="pass_word" name="<?= esc($password) ?>" class="form-control" style="width:500px;" type="password" required>
                                            <label id="password_label" for="" style="font-size: 14px; margin-left:50px;">Mot de passe</label>
                                        </div>

                                        <div class="form-group floating-label input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa  fa-child text-theme"></i></span>
                                            </div>
                                            <select id="group" name="<?= esc($group) ?>" class="form-control" style="width:500px;" type="" required>
                                                <option value="user">Utilisateur</option>
                                                <option value="dg">Directeur Général</option>
                                                <option value="admin">Surveillant Général</option>
                                            </select>
                                            <label id="group_label" for="" style="font-size: 14px; margin-left:50px;">Rôle</label>
                                        </div>

                                        <input id="hidden" type="hidden" name="activate_name">
                                        <div class="form-group">
                                            <button id="btncreate_user" style="width:542px;" type="button" autocomplete="off" data-complete-text="Création complète" class="btn btn-theme  btn-outline-theme">Enregistrer</button>
                                        </div>

                                        <!--
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar" style="width:100%;">
                                                <span class="sr-only">Création du compte</span>
                                            </div>
                                        </div>
                                        -->
                                        <?= form_close() ?>
                                    </div>
                                </div>
                                <!--Floating label-->
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modal end-->

                    <!--Footer-->
                    <div class="row mt-5 mb-4 footer">
                        <div class="col-sm-8">
                            <span style="margin: 30px;" class="small text-light">&copy; Tous droits reservés<a class="text-info" href="<?= base_url() ?>/#"> Institut Pasteur de Bangui</a></span>
                        </div>
                    </div>
                    <!--Footer-->
                </div>
            </div>

            <!--Main Content-->

            <!--userModal concernant les utilisateurs-->
            <div class="modal animated fade rubberBand" data-bs-backdrop="static" data-bs-keyboard="false" id="categ_modifModal" tabindex="-1" role="dialog" aria-labelledby="categ_modifModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content bg-light">
                        <form method="POST" id="categorie_modif_Form">
                            <div style="background-image: url(<?= base_url() ?>/assets/img/bg-user.jpg);right:50%;left:50%;" class="modal-header">
                                <div>
                                    <h5 class="modal-title  text-secondary" id="username_title"></h5>
                                </div>
                                <div id="group_title" class="pull-right"></div>
                            </div>
                            <div style="position: relative;">
                                <div style="background-image: url(<?= base_url() ?>/assets/img/belle_image_floue.png);background-size:750px;background-position:20px;" class="modal-body">
                                    <div style="position:relative;">
                                        <table class="table shadow-lg table-dark" id="project_table" style="opacity: 60%;border-radius:10px;">

                                            <tbody>
                                                <tr>
                                                    <td>Nom complet</td>
                                                    <td>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" id="fullname_info" style="width: 400px;" readonly="true">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Login</td>
                                                    <td>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" id="log_info" style="width: 400px;" class="input-border-bottom" readonly="true">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Adresse email</td>
                                                    <td>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" id="addr_info" style="width: 400px;" class="input-border-bottom" readonly="true">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Rôle</td>
                                                    <td>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" style="width: 400px;" id="group_mod" class="input-border-bottom" readonly="true">
                                                        <div hidden="true" class="form-group floating-label" id="select_group">
                                                            <select style="width: 200px;" id="element_select" class="custom-select">
                                                                <option value="">Sélectionner...</option>
                                                                <option value="superadmin">Administrateur</option>
                                                                <option value="admin">Surveillant Général</option>
                                                                <option value="dg">Directeur Général</option>
                                                                <option value="user">Utilisateur</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> <i id="modify_group" class="fa fa-edit btn mt-3 btn-color-change" style="font-size: large;"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>Créé le:</td>
                                                    <td>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" style="width: 400px;" id="createdate_info" class="input-border-bottom" readonly="true">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Statut du compte</td>
                                                    <td>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" style="width: 400px;" id="active_info" class="input-border-bottom" readonly="true">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Dernière connexion le:</td>
                                                    <td>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="100" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" style="width: 400px;" id="lastlog_info" class="input-border-bottom" readonly="true">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn bg-gradient-danger btn-outline-light shadow icon-round  animated flip" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                <button id="save_modify_user" type="button" class="btn bg-gradient-dark btn-outline-light shadow icon-round  animated flip"><i class="fa fa-check-circle"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end userModal -->


            <!--StoryModal concernant l'admin-->
            <div style="overflow-y:auto;" class="modal animated fade rubberBand" data-bs-backdrop="static" data-bs-keyboard="false" id="StoryModal" tabindex="-1" role="dialog" aria-labelledby="story_ModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content bg-light">
                        <div style="background-image: url(<?= base_url() ?>/assets/img/bg-user.jpg);right:50%;left:50%;" class="modal-header">
                            <div>
                                <h7 class="modal-title text-secondary"><strong>Historique</strong></h7>
                            </div>
                            <div id="group_title" class="pull-right"></div>
                        </div>
                        <div style="position: relative;">
                            <div style="background-image: url(<?= base_url() ?>/assets/img/prof2.jpg);background-size:750px;background-position:20px;overflow-y:scroll;height:500px;" class="modal-body">
                                <div style="position:relative;">
                                    <div class="col-md-12 col-sm-12">
                                        <!--Email messages-->
                                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm lh-sm">
                                            <div class="email-msg">
                                                <div class="email-inbox-menu">
                                                    <div class="pull-left px-1 pt-2 pb-2 mr-3">

                                                    </div>

                                                    <div class="pull-right">

                                                    </div>



                                                    <span class="clearfix"></span>
                                                </div>


                                                <div class="email-msg-list table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                            <th></th>
                                                            <th><span class="text-primary">Responsable</span></th>
                                                            <th><span class="text-primary">Opération</span></th>
                                                            <th><span class="text-primary">Date</span></th>
                                                        </thead>
                                                        <tbody id="tbodyStory">

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/Email messages-->

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer bg-dark">
                            <button type="button" class="btn bg-gradient-danger btn-outline-light shadow icon-round  animated flip" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>

                    </div>
                </div>
            </div>
            <!--end StoryModal -->


        </div>

        <!--Page Wrapper-->

        <!-- Page JavaScript Files-->
        <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery-1.12.4.min.js"></script>

        <!--preloader-->
        <script src="<?= base_url() ?>/assets/preloader/dist/prelodr.js"></script>
        <!--Popper JS-->
        <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
        <!--Bootstrap-->
        <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
        <!--Switchery JS-->
        <script src="<?= base_url() ?>/assets/js/switchery.min.js"></script>
        <!--Sweet alert JS-->
        <script src="<?= base_url() ?>/assets/js/sweetalert.js"></script>
        <!--Progressbar JS-->
        <script src="<?= base_url() ?>/assets/js/progressbar.min.js"></script>
        <!--Datatable-->
        <script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>
        <!--Bootstrap Calendar JS-->

        <!--Nice select-->
        <script src="<?= base_url() ?>/assets/js/jquery.nice-select.min.js"></script>
        <!--Form validator-->
        <script src="<?= base_url() ?>/assets/js/form-validator/jquery.form-validator.min.js"></script>
        <!--Alertify JS-->
        <script src="<?= base_url() ?>/assets/js/alertify.min.js"></script>
        <!--/Alertify JS-->
        <script src="<?= base_url() ?>/assets/js/bootstrap-tagsinput.min.js"></script>
        <!--Custom Js Script-->
        <script src="<?= base_url() ?>/assets/js/custom.js"></script>
        <!--Custom Js Script-->
        <!--Librairie de PDF -->
        <script src="<?= base_url() ?>/assets/js/cdnjs/jspdf.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/tableHTMLExport.js"></script>
        <!--Librairie de PDF -->
        <!--JsGrid table-->
        <script src="<?= base_url() ?>/assets/js/jsgrid.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jsgrid-demo.js"></script>
        <!--Bootstrap tagsinput-->
        <script src="<?= base_url() ?>/assets/js/bootstrap-tagsinput.min.js"></script>

        <script src="<?= base_url() ?>/assets/js/jq/jquery-ui.js"></script>
        <script src="<?= base_url() ?>/assets/js/moment.js"></script>

        <script type="text/javascript">
            var base = "<?= base_url() ?>";
        </script>

        <script type="text/javascript">
            $(function() {

                $('body').prelodr({
                    prefixClass: 'prelodr',
                    show: function() {
                        console.log('Show callback')
                    },
                    hide: function() {
                        console.log('Hide callback')
                    }
                })

                $('#btnmodifypass').on('click', function() {
                    // Show prelodr (Chaining support)
                    $('#bodyPage').prelodr('in', 'Traitement en cours...');
                    $('#bodyPage').prelodr('out', function(done) {
                        setTimeout(function() {
                            done();
                        }, 1000);
                    });
                })

            })
        </script>

        <script type="text/javascript">
            function showStory() {
                $('#StoryModal').modal({
                    backdrop: 'static',
                    keyboard: false // pour empêcher la fermeture avec la touche échappe
                });
            }

            function print_allStories() {
                $.ajax({
                    url: '/all_stories',
                    method: 'POST',
                }).done(function(data) {
                    //alert('All stories will be printed');
                    var donnes = Object.entries(JSON.parse(data));

                    donnes.forEach(function(elm, index) {
                        //Tableau
                        index1 = elm[0];
                        objet1 = elm[1];
                        var id = objet1.id_his;
                        var respo = objet1.responsable;
                        var opera = objet1.operation;
                        var date = objet1.date_his;
                        $("#tbodyStory").append('<tr><td class="align-middle border-left-0"><i class="fa fa-caret-square-right text-primary"></i></td><td class="align-middle"><span class="badge badge-primary">' + respo + '</span></td><td class="align-middle"><span class="small">' + opera + '</span></td><td class="align-middle"><span class="small">' + date + '</span></td></tr>');
                    });

                }).fail(function(data) {
                    alert('L\'historique est introuvable !');
                });

            }
            print_allStories();
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

                $('#unity' + id_notif).prop('class', 'dropdown-item animated shake');

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
            function print_all_users() {

                $(function() {

                    <?php if (isset($identities) && isset($users_groups)) { ?>

                        var rep1 = JSON.stringify(<?= $identities ?>);
                        var reponseAjax1 = Object.entries(JSON.parse(rep1));

                        var rep2 = JSON.stringify(<?= $users_groups ?>);
                        var reponseAjax2 = Object.entries(JSON.parse(rep2));

                        var index1 = null;
                        var objet1 = null;
                        var id_user = null;
                        var name_user = null;
                        var group_user = null;
                        var group_user2 = null;
                        var active_user = null;
                        var date_create_user = null;
                        var create_user = null;
                        var last_log_user = null;
                        var last = null;
                        var active_word = null;
                        var active_word2 = null;
                        var color = null;
                        var fullname = null;
                        var adress = null;

                        reponseAjax2.forEach(function(elm, index) {
                            //Premier tableau (tableau natif)
                            index1 = elm[0];
                            objet1 = elm[1];

                            //Deuxième tableau à partir des indexes du premier tableau
                            elm2 = reponseAjax1[index];
                            index2 = elm2[0];
                            objet2 = elm2[1];

                            id_user = objet1.user_id; //affiche l'id de l'utilisateur connecté
                            name_user = objet1.username; //affiche le username de l'utilisateur connecté
                            group_user = objet1.group; //affiche le group de l'utilisateur connecté
                            group_user2 = objet1.group;
                            active_user = objet1.active;
                            activeuser = JSON.stringify(objet1.active);
                            date_create_user = JSON.stringify(objet1.created_at);
                            create_user = objet1.created_at;
                            last_log_user = JSON.stringify(objet1.last_active);
                            last = objet1.last_active;

                            adress = objet2.secret;
                            fullname = objet2.name;


                            $('#tdname').html(fullname);
                            $('#tdmail').html(adress);
                            $("#tdmodifymail").data('id', id_user);
                            $("#tdmodifypasse").data('id', id_user);

                            //Pour la modif de l'adresse de l'utilisateur
                            $("#tdmodifymail").on('click', function(e) {
                                e.preventDefault();
                                $(this).attr('hidden', true);
                                //$(this).data('adress',adress);
                                $("#btnskip").removeAttr('hidden');
                                $("#btnvalid").removeAttr('hidden');
                                $('#tdmail').attr('hidden', true);
                                $('#tdmail_input').prop('hidden', false);
                                $('#tdmail_input :first-child').val($(this).data('adress'));
                                $('#tdmail_input :first-child').trigger('focus');

                            });

                            var verify = "non";
                            $('#mail_input').on('keyup', function(e) {
                                e.preventDefault();
                                //Vérifie le format de l'adresse e-mail
                                var regex = /[a-zA-Z0-9]+\@+\w+\.+\w+/; //expression régulière
                                var newmail = $(this).val();

                                if (!(newmail.match(regex)) && newmail.length > 9) {

                                    $(this).removeClass('input-border-bottoms');
                                    $(this).css('border', '1px solid red');
                                    $("#show_error").removeAttr('hidden');
                                } else if ((newmail.match(regex))) {
                                    $(this).css('border', '1px solid green');
                                    $("#show_error").attr('hidden', true);
                                    verify = "oui";
                                }

                            });

                            $('#mail_input').on('click', function(e) {
                                e.preventDefault();
                                $(this).css('border', '0px');
                            });

                            $("#btnskip").on('click', function(e) {
                                e.preventDefault();
                                $(this).prop('hidden', true);
                                $('#tdmail').attr('hidden', false);
                                $('#tdmail_input').prop('hidden', true);
                                $("#btnvalid").prop('hidden', true);
                                $('#mail_input').css('border', '0px');
                                $('#tdmodifymail').removeAttr('hidden');
                            });

                            $('#btnvalid').on('click', function(e) {
                                e.preventDefault();
                                var newmail = $('#tdmail_input :first-child').val();

                                if (verify == "non") {
                                    swal({
                                        title: 'Erreur',
                                        text: "Le format de l'adresse e-mail est incrorrect !",
                                        icon: "warning",
                                    }).then(function() {
                                        $(this).removeClass('input-border-bottoms');
                                        $(this).css('border', '1px solid red');
                                        $("#show_error").removeAttr('hidden');
                                        $('#mail_input').trigger('focus');
                                    });
                                } else {
                                    $("#tdmail").prop('hidden', false);
                                    //$("#newmail").html(newmail);
                                    $(this).prop('hidden', true);
                                    $('#tdmodifymail').removeAttr('hidden');
                                    $('#tdmodifymail').data('adress', newmail);
                                    $('#tdmail').html(newmail);
                                    $('#tdmail_input').prop('hidden', true);
                                    $("#btnskip").prop('hidden', true);

                                    $.ajax({
                                        url: "/change_usermail",
                                        method: 'POST',
                                        dataType: 'json',
                                        data: {
                                            "mail": newmail,
                                        },
                                    }).done(function(data) {
                                        swal("Effectué", "Votre adresse e-mail a été modifié avec succès!", {
                                            icon: "success",
                                        }).then(function() {
                                            window.location.href = base + "/logout";
                                        });
                                    }).fail(function(data) {
                                        alert('Failed');
                                    });
                                }

                            });

                            //Pour la modif du mot de passe de l'utilisateur
                            $("#btnmodifypass").on('click', function(e) {

                                e.preventDefault();


                                $(this).attr('hidden', true);
                                $("#btnskip_pass").removeAttr('hidden');
                                $("#btnvalid_pass").removeAttr('hidden');
                                $('#tdpass').attr('hidden', true);
                                $('#tdpass_input1').prop('hidden', false);
                                $('#input_pass3').trigger('focus');
                            });
                            $("#btnskip_pass").on('click', function(e) {
                                e.preventDefault();
                                $(this).prop('hidden', true);
                                $('#tdmail').attr('hidden', false);
                                $('#tdpass_input1').prop('hidden', true);
                                $("#btnvalid_pass").prop('hidden', true);
                                $('#btnmodifypass').removeAttr('hidden');
                                $('#tdpass').attr('hidden', false);
                            });

                            $('#input_pass1').on('click', function(e) {
                                e.preventDefault();
                                var oldpassword = $('#input_pass3').val();
                                var char_count = oldpassword.length;
                                var checkpassword = $('#input_pass2').val();

                                $('#input_pass1').css('border', '0px');

                                $.ajax({
                                    url: "/verify_oldpassword",
                                    method: 'POST',
                                    dataType: 'json',
                                    data: {
                                        "oldpassword": window.btoa(oldpassword),
                                    },
                                }).done(function(data) {
                                    let rst = data.response.toString();
                                    if (data.response != "ok") {
                                        $('#input_pass3').css('border', '1px solid red');
                                        swal("Réessayez", "Cet ancien mot de passe ne correspond pas à ce compte !", {
                                            icon: "error",
                                        }).then(function() {
                                            $('#input_pass3').trigger('focus');
                                        });
                                    } else {
                                        $('#input_pass3').css('border', '1px solid green');
                                    }
                                    console.log(rst);
                                }).fail(function(data) {
                                    alert("échoué");
                                });

                            });

                            $('#input_pass3').on('click', function(e) {
                                e.preventDefault();
                                $(this).css('border', '0px');
                            });

                            $('#input_pass2').on('click', function(e) {
                                e.preventDefault();
                                var newpassword = $('#input_pass1').val();
                                var char_count = newpassword.length;
                                var checkpassword = $('#input_pass2').val();

                                $('#input_pass2').css('border', '0px');
                                if (char_count < 8) {
                                    swal("Réessayez", "Le mot de passe doit contenir au moins 8 caractères !", {
                                        icon: "error",
                                    });
                                    $('#input_pass1').css('border', '1px solid red');
                                }
                            });


                            $('#btnvalid_pass').on('click', function(e) {
                                e.preventDefault();
                                var newpassword = $('#input_pass1').val();
                                var char_count = newpassword.length;
                                var checkpassword = $('#input_pass2').val();
                                var oldpassword = $('#input_pass3').val();

                                if (newpassword.length == 0 || checkpassword.length == 0 || oldpassword.length == 0) {
                                    swal("S'il vous plaît", "Veuillez remplir tous les champs !", {
                                        icon: "error",
                                    });
                                } else {

                                    if (newpassword != checkpassword) {
                                        swal("Réessayez", "Les mots de passe ne sont pas identiques !", {
                                            icon: "error",
                                        });
                                        $('#input_pass2').css('border', '1px solid red');
                                    } else {
                                        $.ajax({
                                            url: "/personal_password_change",
                                            method: 'POST',
                                            dataType: 'json',
                                            data: {
                                                "password": window.btoa(newpassword),
                                            },
                                        }).done(function(data) {
                                            swal("Effectué", "Votre mot de passe a été modifié avec succès!", {
                                                icon: "success",
                                            }).then(function() {
                                                window.location.href = base + "/logout";
                                            });

                                        }).fail(function(error) {
                                            alert('échouée');
                                        });
                                    }
                                }
                            });

                        });

                    <?php
                    } ?>

                    // Sélectionnez le bouton à l'aide de son ID
                    var bouton = document.getElementById("modify_group");
                    // Créez une variable pour suivre si le bouton a été cliqué
                    var boutonClique = false;

                    // Attachez un gestionnaire d'événements de clic au bouton
                    bouton.addEventListener("click", function() {
                        // Mettez à jour la variable lorsque le bouton est cliqué
                        boutonClique = true;

                    });

                    $.ajax({
                        url: "/recupere_user",
                        method: 'POST',
                        dataType: 'json',
                    }).done(function(data2) {
                        //console.log(data2);
                        //$('#user_number').html(data2['total_user']);

                        //console.log(data2);

                        var rep1 = JSON.stringify(data2['identities']);
                        var reponseAjax1 = Object.entries(JSON.parse(rep1));

                        var rep2 = JSON.stringify(data2['users_groups']);
                        var reponseAjax2 = Object.entries(JSON.parse(rep2));
                        $("#user_list").data('list', reponseAjax2);
                        var index1 = null;
                        var objet1 = null;
                        var id_user = null;
                        var name_user = null;
                        var group_user = null;
                        var group_user2 = null;
                        var active_user = null;
                        var date_create_user = null;
                        var create_user = null;
                        var last_log_user = null;
                        var last = null;
                        var active_word = null;
                        var active_word2 = null;
                        var color = null;
                        var fullname = null;
                        var adress = null;
                        var logged_in = null;
                        var avatar = null;
                        reponseAjax2.forEach(function(elm, index) {
                            //Premier tableau (tableau natif)
                            index1 = elm[0];
                            objet1 = elm[1];

                            //Deuxième tableau à partir des indexes du premier tableau
                            elm2 = reponseAjax1[index];
                            index2 = elm2[0];
                            objet2 = elm2[1];

                            id_user = objet1.user_id; //affiche l'id de chaque utilisateur
                            name_user = objet1.username; //affiche le username de chaque utilisateur
                            group_user = objet1.group; //affiche le group de chaque utilisateur
                            group_user2 = objet1.group;
                            active_user = objet1.active;
                            activeuser = JSON.stringify(objet1.active);
                            date_create_user = JSON.stringify(objet1.created_at);
                            create_user = objet1.created_at;
                            last_log_user = JSON.stringify(objet1.last_active);
                            last = objet1.last_active;
                            logged_in = objet1.logged_in;

                            adress = objet2.secret;
                            fullname = objet2.name;

                            if (last == null) {
                                last = "Aucune activité pour le moment";
                            }
                            //alert(id_user+'\n'+name_user+'\n'+group_user+'\n'+date_create_user+'\n'+active_user+'\n'+last_log_user+'\n');

                            switch (group_user) {
                                case 'superadmin':
                                    group_user = 'Administrateur';
                                    break;
                                case 'admin':
                                    group_user = 'Surveillant Général';
                                    break;
                                case 'dg':
                                    group_user = 'Directeur Général';
                                    break;
                                case 'user':
                                    group_user = 'Utilisateur';
                                    break;

                                default:
                                    break;
                            }

                            switch (active_user) {
                                case '0':
                                    active_word = 'activer';
                                    color = 'success';
                                    break;
                                case '1':
                                    active_word = 'désactiver';
                                    color = 'danger';
                                    break;
                                default:
                                    break;
                            }
                            switch (active_user) {
                                case '0':
                                    active_word2 = 'désactivé';
                                    color = 'success';
                                    break;
                                case '1':
                                    active_word2 = 'activé';
                                    color = 'danger';
                                    break;
                                default:
                                    break;
                            }

                            if (logged_in == "0") {
                                avatar = "avatar";
                            } else if (logged_in == "1") {
                                avatar = "avatar online";
                            }
                            $('#user_list').append('<div id="' + id_user + '" data-id="' + id_user + '"  data-name="' + name_user + '" data-fullname="' + fullname + '" data-adress="' + adress + '"  data-group="' + group_user + '"  data-active="' + active_word2 + '"  data-datecreate="' + create_user + '"  data-last="' + last + '" class="media p-3 border-bottom b "><div class="cont" data-toggle="dropdown"><a id="ancre_' + id_user + '" class="' + avatar + '" ria-haspopup="true" aria-expanded="false"><span style="background-color:#cb0000;" class="g avatar-initial text-center text-light bleu3">' + name_user[0] + '</span></a></div><div class="media-body dd"><p><strong>' + name_user + '</strong></p><small>' + group_user + '</small></div><div class="all_btn" hidden="true"><a id="' + id_user + 'infos" role="button" class="btn btn-round btn-outline-secondary shadow-sm pull-right btninfo" style="font-size:10px; margin-right:8px;" data-id="' + id_user + '" data-fullname="' + fullname + '" data-adress="' + adress + '"   data-name="' + name_user + '"  data-group="' + group_user + '"  data-active="' + active_word2 + '"  data-datecreate="' + create_user + '"  data-last="' + last + '"><i class="fa fa-info text-info"></i><a id="' + id_user + 'active" data-id="' + id_user + '"  data-name="' + name_user + '"  data-group="' + group_user + '"  data-active="' + active_word2 + '"  data-datecreate="' + create_user + '"  data-last="' + last + '" class="btn btn-outline-secondary shadow-sm pull-right btnactive" style="font-size:10px; margin-right:8px;"><i class="fa fa-check-circle ' + color + '"> ' + active_word + '</i><a id="' + id_user + 'delete" data-id="' + id_user + '"  data-fullname="' + fullname + '" data-adress="' + adress + '"   data-name="' + name_user + '"  data-group="' + group_user + '"  data-active="' + active_word2 + '"  data-datecreate="' + create_user + '"  data-last="' + last + '" class="btn btn-outline-secondary shadow-sm pull-right btndelete" style="margin-left:6px;margin-right:6px; font-size:10px;"><i class="fa fa-trash text-danger"> supprimer</i></a><a id="' + id_user + 'reset" data-id="' + id_user + '"  data-name="' + name_user + '"  data-group="' + group_user + '" data-fullname="' + fullname + '" data-adress="' + adress + '" data-active="' + active_word2 + '"  data-datecreate="' + create_user + '"  data-last="' + last + '" class="btn btn-secondary btn-outline-secondary shadow-sm pull-right btnreset" style="margin-left:6px;font-size:10px;"><i class="fa fa-undo text-dark"> réinitialiser</i></a></div></div>');


                            $('#' + id_user + '').on('mouseenter', function() {
                                $(this).prop('style', 'background-color:orange');
                                $(this).children('.all_btn').prop('hidden', false);
                                //alert('est entré dans ' + $(this).data('name'));

                                // $('#'+$(this).data('id')+'infos').on('click',function(){
                                //    alert('clic sur '+$(this).data('name'));
                                //});
                            });
                            $('#' + id_user + '').on('mouseleave', function() {
                                $(this).prop('style', 'background-color:white');
                                $(this).children('.all_btn').prop('hidden', true);
                                //alert('est entré dans ' + $(this).data('name'));
                            });
                        });

                        //bouton pour voir les infos du compte de l'utilisateur
                        $('.btninfo').on('click', function(e) {
                            e.preventDefault();

                            //Envoie des infos de l'user dans le modal
                            $("#username_title").html('<strong><i class="fa fa-user text-dark animated zoomInRight"></i>' + ' ' + $(this).data('name') + '</strong>');
                            $("#group_title").html('<small class"text">' + $(this).data('group') + '</small>');
                            $("#log_info").val($(this).data('name'));
                            $("#group_mod").val($(this).data('group'));
                            $("#fullname_info").val($(this).data('fullname'));
                            $("#addr_info").val($(this).data('adress'));
                            $("#createdate_info").val($(this).data('datecreate'));
                            $("#active_info").val($(this).data('active'));
                            $('#lastlog_info').val($(this).data('last'));
                            $('#save_modify_user').data('iduser', $(this).data('id'));

                            $('#categ_modifModal').modal({
                                backdrop: 'static',
                                keyboard: false, // pour empêcher la fermeture avec la touche échappe
                            });

                            $('#modify_group').on('click', function(e) {
                                e.preventDefault();

                                $('#select_group').removeAttr('hidden');
                                $('#element_select').on('change', function(e) {
                                    e.preventDefault();
                                    var selectedValue = $(this).find('option:selected').val();
                                    var selectedText = $(this).find('option:selected').text();
                                    $('#save_modify_user').data('group', selectedValue);
                                    $('#save_modify_user').data('grouptext', selectedText);
                                    $('#group_mod').val(selectedText);

                                });
                            });
                            //alert('cliqué sur '+$(this).data('name'));
                        });

                        //bouton activer/désactiver l'utilisateur
                        $('.btnactive').on('click', function(e) {
                            e.preventDefault();

                            if ($(this).data('active') == 'activé') {
                                var id = $(this).data('id');
                                swal({
                                    title: "Info",
                                    text: "Vous allez désactiver le compte",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then(function(willSave) {
                                    if (willSave) {
                                        $.ajax({
                                            url: "/deactivate_user",
                                            method: 'POST',
                                            data: {
                                                'id_user': id,
                                            },
                                            dataType: 'json',
                                        }).done(function(data) {
                                            swal("Ok", "Le compte a été désactivé !", {
                                                icon: "success",
                                            }).then(function() {
                                                location.reload();
                                            });

                                        }).fail(function(data) {
                                            alert('activation failed');
                                        });
                                        //alert('activation et clic dans ' + $(this).data('name'));
                                    }
                                });
                            } else {
                                var id = $(this).data('id');
                                swal({
                                    title: "Info",
                                    text: "Vous allez activer le compte",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then(function(willSave) {
                                    if (willSave) {
                                        $.ajax({
                                            url: "/activate_user",
                                            method: 'POST',
                                            data: {
                                                'id_user': id,
                                            },
                                            dataType: 'json',
                                        }).done(function(data) {
                                            swal("Ok", "Le compte a été activé !", {
                                                icon: "success",
                                            }).then(function() {
                                                location.reload();
                                            });

                                        }).fail(function(data) {
                                            alert('activation failed');
                                        });
                                        //alert('activation et clic dans ' + $(this).data('name'));
                                    }
                                });
                            }
                        });

                        //bouton supprimer l'utilisateur
                        $('.btndelete').on('click', function(e) {
                            e.preventDefault();
                            var id = $(this).data('id');
                            swal({
                                title: "Attention",
                                text: "Vous allez supprimer le compte",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            }).then(function(willSave) {
                                if (willSave) {
                                    $.ajax({
                                        url: "/delete_user",
                                        method: 'POST',
                                        data: {
                                            'id_user': id,
                                        },
                                        dataType: 'json',
                                    }).done(function(data) {
                                        swal("Ok", "Le compte a été supprimé !", {
                                            icon: "success",
                                        }).then(function() {
                                            location.reload();
                                        });
                                    }).fail(function(data) {
                                        alert('deleting failed');
                                    });
                                    //alert('suppression et clic dans ' + $(this).data('name'));
                                }
                            });
                        });

                        //bouton réinitialiser l'utilisateur
                        $('.btnreset').on('click', function(e) {
                            e.preventDefault();
                            var id = $(this).data('id');
                            swal({
                                title: "Attention",
                                text: "Vous allez réinitialiser le mot de passe de l'utilisateur",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            }).then(function(willSave) {
                                if (willSave) {
                                    $.ajax({
                                        url: "/reset_password",
                                        method: 'POST',
                                        data: {
                                            'id_user': id,
                                        },
                                        dataType: 'json',
                                    }).done(function(data) {
                                        swal("Ok", "Le mot de passe sera forcé à  être réinitialisé!", {
                                            icon: "success",
                                        }).then(function() {
                                            location.reload();
                                        });
                                    }).fail(function(data) {
                                        alert('user resetting failed !');
                                    });
                                    //alert('réinitialisation et clic dans ' + $(this).data('name'));
                                }
                            });
                        });




                    }).fail(function(data) {
                        alert('Requête de récupération de la liste des utilisateurs échouée');
                    });
                });

            }
            print_all_users();

            //Fonction pour sauvegarder le groupe modifié d'un utilisateur
            function saveUser_in_newgroup() {
                $('#save_modify_user').on('click', function(e) {
                    e.preventDefault();
                    var id = $(this).data('iduser');
                    var group = $(this).data('group');
                    var group_text = $(this).data('grouptext');

                    swal({
                        title: "Info",
                        text: "Enregistrer les modifications ?",
                        icon: "warning",
                        buttons: true,
                        buttons: ["Annuler", "Oui"],
                        closeOnClickOutside: true,
                        dangerMode: true,
                    }).then(function(willSave) {
                        if (willSave) {
                            $.ajax({
                                url: "/change_group",
                                method: 'POST',
                                data: {
                                    'id_user': id,
                                    'group': group,
                                },
                                dataType: 'json',
                            }).done(function(data) {

                                swal("Ok", "désormais " + group_text + "", {
                                    icon: "success",
                                }).then(function() {
                                    location.reload();
                                });
                            }).fail(function(data) {
                                alert('changement de groupe échoué !');
                            });
                        }
                    });
                });
            }
            saveUser_in_newgroup();

            function color1(valeur, style1, style2) {
                $(function() {
                    $('.' + valeur + '').on('mouseenter', function() {
                        $('.' + valeur + '').prop('class', style1);
                    });
                    $('.' + valeur + '').on('mouseleave', function() {
                        $('.' + valeur + '').prop('class', style2);
                    });
                });
            }
            color1('btn-color-change', 'fa fa-edit btn btn-color-change text-primary', 'fa fa-edit btn btn-color-change text-light');
        </script>

        <script>
            function activate_count() {
                $('#div_checked').on('click', function() {

                    if ($('#toggle_checked').prop('checked') == false) {
                        $('#hidden').val('deactivated');
                    }
                    if ($('#toggle_checked').prop('checked') == true) {
                        $('#hidden').val('activated');
                    }

                });
            }
            activate_count();

            //Fonction pour  récupérer le nombre des utilisateurs
            function nbre_user() {
                $.ajax({
                    url: "/nombre_user",
                    method: 'POST',
                    dataType: 'json',
                }).done(function(data2) {
                    console.log(data2);
                    $('#user_number').html(data2['total_user']);
                    if (data2['total_user'] < 2) {
                        $('#title1').text('Utilisateur');
                    }
                    $('#activated').html(data2['active']);
                    if (data2['active'] < 2) {
                        $('#title2').text('Utilisateur connecté');
                    }
                    $('#deactivated').html(data2['deactive']);
                    if (data2['deactive'] < 2) {
                        $('#title3').text('Utilisateur désactivé');
                    }
                }).fail(function(data) {
                    alert('Requête de récupération des utilisateurs échouée');
                });
            }
            nbre_user();
        </script>

        <script>
            $('body').prelodr({
                prefixClass: 'prelodr',
                show: function() {
                    console.log('Show callback')
                },
                hide: function() {
                    console.log('Hide callback')
                }
            })
            $('#btncreate_user').on('click', function(e) {
                e.preventDefault();
                $('body').prelodr('in', 'Création de l\'utilisateur...');
                var full_name = $('#full_name').val();
                var e_mail = $('#e_mail').val();
                var log_in = $('#login_user').val();
                var pass_word = $('#pass_word').val();

                //Vérifie le format de l'adresse e-mail
                var regex = /[a-zA-Z0-9]+\@+\w+\.+\w+/; //expression régulière
                //var resultat = e_mail.match(regex);

                if ($('#full_name').val() == '') {
                    swal('' + $('#full_name_label').text() + '' + " vide", "Veuillez remplir le champ !", {
                        icon: "warning",
                    });
                    $('#full_name').prop('class', 'form-control alert alert-danger');
                } else if ($('#e_mail').val() == '') {
                    swal('' + $('#e_mail_label').text() + '' + " vide", "Veuillez remplir le champ !", {
                        icon: "warning",
                    });
                    $('#e_mail').prop('class', 'form-control alert alert-danger');
                } else if (!(e_mail.match(regex))) {

                    swal("L'adresse email est invalide !", "Veuillez vérifier le champ", {
                        icon: "warning",
                    });
                    $('#e_mail').prop('class', 'form-control alert alert-danger');
                    $('#floating_email').prop('class', 'form-group input-group mb-3');
                    $('#e_mail_label').html('<i class="fa fa-warning text-danger"><span class="text-danger"> E-mail</span></i>');

                } else if ($('#log_in').val() == '') {
                    swal('' + $('#log_in_label').text() + '' + " vide", "Veuillez remplir le champ !", {
                        icon: "warning",
                    });
                    $('#log_in').prop('class', 'form-control alert alert-danger');
                } else if ($('#pass_word').val() == '') {
                    swal('' + $('#password_label').text() + '' + " vide", "Veuillez remplir le champ !", {
                        icon: "warning",
                    })
                } else {
                    $('#UserForm').submit();
                    //alert('permission to submit because fullname = ' + full_name);
                }
            });

            $('#UserForm').on('submit', function(e) {

                e.preventDefault();
                $.ajax({
                    url: '/register_user',
                    method: 'POST',
                    data: $('#UserForm').serialize(),

                }).done(function(data) {
                    $('body').prelodr('out', 'Utilisateur créé...');
                    $('#UserForm')[0].reset();

                    swal('Effectué', "Utilisateur créé avec succès !", {
                        icon: "success",
                    });
                    console.log(data);
                }).fail(function(data) {
                    alert('La requête a échoué!');
                }).progress(function(data) {
                    $('body').prelodr('in', 'Création de l\'utilisateur...');
                });
            });
        </script>

        <script>
            function recup_name() {
                $('#full_name').on('keyup', function(e) {
                    e.preventDefault();

                    var full_name = escape($(this).val());
                    //alert(full_name);
                    $.ajax({
                        url: '/format_login',
                        method: 'POST',
                        data: {
                            'fullname': full_name,
                        },

                    }).done(function(data) {
                        //alert('success for fullname\n'+data);
                        var regex = /[a-zA-Z]+/; //expression régulière
                        var resultat = data.match(regex);
                        var login1;
                        if (resultat[0].length !== null) {
                            login1 = resultat[0];
                            $('#login_user').val(login1);
                            $('#pass_word').val(login1);
                            $('#hidden').val('activated');
                            //alert($("#goup").prop('selected'));
                        }

                    }).fail(function(data) {
                        alert('fullname échoué !');
                    });

                });

            }

            recup_name();
        </script>

        <script>
            //Script pour créer de nouveau magasin
            function rename() {
                $(function() {
                    $("#rename").prop('hidden', false);
                });
            }

            function creer_maga() {
                $(function() {
                    var valu = $('#name_mag').val();
                    if ( valu != "") {
                        swal({
                        title: "Info",
                        text: "Vous allez créer un lieu de stockage",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then(function(willSave) {
                        if (willSave) {
                            $('body').prelodr('in', 'Création du magasin en cours...');
                            $.ajax({
                                url: "/createmagasin",
                                method: 'POST',
                                data: {
                                    'num_mag': valu
                                },
                                dataType: 'json',

                            }).done(function(data) {
                                $('#bodyPage').prelodr('out', function(done) {
                                    setTimeout(function() {
                                        done();
                                        swal('Info', 'Le magasin a été créé avec succès !', 'success').then(function() {

                                            location.reload();
                                        });
                                    }, 2000);

                                });


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
            //Affichage de tous les magasins dans l'espace admin de l'admin et un bouton supprimer et réinitialiser
            $(function() {
                $.ajax({
                    url: "/menumagasin",
                    method: 'GET',
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

                        $('#les_mags').append('<div class="col-sm-6 mb-3"><div class="card shadow bg-secondary"><div class="card-body"><div class="media shadow-lg bg-dark text-light" style="position:relative;><span style="margin-left: 90px;" class="small"><i class="fa fa-th-large text-light"></i>' +magasin + ' </span></div><div class="mt-4 mb-4"><div class="row user-about"><div class="col-sm-6 col-4 border-right"><button type="button" data-idstock="' + id_stock + '" data-idmagasin="' + id_magasin + '" class="btn btn-sm btn-outline-danger btnMagDelete"><i class="fa fa-trash"> Supprimer</i></button></div><div class="col-sm-4 col-4 border-left"><button type="button" data-idstock="' + id_stock + '" data-idmagasin="' + id_magasin + '" class="btn btn-sm btn-sm btn-outline-light btnMagReset"><i class="fa fa-refresh"> Réinitialiser</i></button></div></div></div><div class="dropdown-divider"></div></div></div></div>');

                    });

                    $('.btnMagDelete').on('click', function(e) {
                        e.preventDefault();
                        var idmag = $(this).data('idmagasin');
                        var idstock = $(this).data('idstock');

                        swal({
                            title: "Info",
                            text: "Vous allez supprimer ce magasin",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then(function(willSave) {
                            if (willSave) {
                                $.ajax({
                                    url: '/delete_magasin',
                                    method: 'POST',
                                    data: {
                                        'idstock': idstock,
                                        'idmagasin': idmag,
                                    },
                                    dataType: 'json',
                                }).done(function(data) {
                                    swal('Ok', "Suppression effectuée avec " + data + " !", {
                                        icon: "success",
                                    }).then(function() {
                                        location.reload();
                                    });

                                }).fail(function(data) {
                                    alert('Une erreur est survenue');
                                });
                                //alert('Cliqué sur le magasin. Son id est '+$(this).data('idmagasin'));
                            }
                        });
                    });

                    $('.btnMagReset').on('click', function(e) {
                        e.preventDefault();
                        var idmag = $(this).data('idmagasin');
                        var idstock = $(this).data('idstock');
                        swal({
                            title: "Info",
                            text: "Vous allez réinitialiser ce magasin",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then(function(willSave) {
                            if (willSave) {
                                $.ajax({
                                    url: '/reset_magasin',
                                    method: 'POST',
                                    data: {
                                        'idstock': idstock,
                                        'idmagasin': idmag,
                                    },
                                    dataType: 'json',
                                }).done(function(data) {
                                    swal('Ok', "Le magasin a été réinitialisé avec " + data + " !", {
                                        icon: "success",
                                    }).then(function() {
                                        location.reload();
                                    });

                                }).fail(function(data) {
                                    alert('Une erreur est survenue');
                                });
                                //alert('Cliqué sur le magasin. Son id est '+$(this).data('idmagasin'));
                            }
                        });
                    });


                }).fail(function(data22) {
                    alert('Une erreur est survenue.');
                });
            });
        </script>

        <script>
            $(function() {
                $.ajax({
                    url: "/menumagasin",
                    method: 'GET',
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
                    $('#lienprofile').attr('href', base + '/profileadmin')
                </script>
        <?php }
        }

        ?>

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
                        $('.' + valeur + '').css('font-size', '30px');
                    });
                    $('.' + valeur + '').on('mouseleave', function() {
                        $('.' + valeur + '').prop('style', style2);
                    });
                });
            }

            color1('bleu3', 'background-color:orange', 'background-color:#cb0000;');

            color1('gran', 'font-size:20px', 'font-size:15px;');
            color2('bleu1', 'btn btn-light btn-round shadow pull-right bleu1', 'btn shadow pull-right bleu1');
            color2('bleu8', 'btn btn-gradient-secondary btn-round shadow pull-right bleu8', 'btn btn-secondary shadow pull-right bleu8');
            color2('theadcolor', 'bg-gradient-theme text-light theadcolor', 'bg-secondary text-light theadcolor');
            // color2('bleu2','breadcrumb breadcrumb-arrow bg-secondary b-colored bleu2','breadcrumb breadcrumb-arrow bg-white bleu2');

            function getuser_nombre() { //pour récupérer le nombre d'utilisateurs ajoutés 
                $(function() {
                    var res = null;
                    $.ajax({
                        url: "/getusernumber",
                        method: "GET",
                    }).done(function(data) {
                        alert("nombre d'users récupérés");
                        //console.log(Object.entries(JSON.parse(data)));
                        res = Object.entries(JSON.parse(data))

                        $("#user_number").html(res[0][1]);

                    }).fail(function() {
                        alert('nombre d\'users non récupéré');
                    });
                })
            }
        </script>
</body>

</html>