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
    <!--Alertify CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/alertify.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/themes/default.rtl.min.css">
    <!--Switchery CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/switchery.min.css">
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

<body>

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
                                                <div id="notif_body" hidden class="dropdown dropdown-bottom bg-white shadow border animated bounceIn" style="display: block; overflow-y:scroll;height:300px;">
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
                    <span class="text-secondary">Accueil <i class="fa fa-angle-right"></i> Profil</span>
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

                <div style="margin-left:100px;" class=" col-sm-10 row mt-3 shadow-lg border-top">

                    <!-- User profile content -->
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-3 button-container custom-tabs">

                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-customContent" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home" data-toggle="tab" href="#custom-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                        <i class="fa fa-user"><strong> Mon compte</strong></i>
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

                                <!-- user modifying -->
                                <div class="tab-pane fade show p-4" id="custom-info" role="tabpanel" aria-labelledby="nav-info">
                                    Bonjour
                                </div>
                                <!-- end user modifying -->
                            </div>
                            <!--/Feed tab-->
                        </div>
                    </div>
                </div>
                <!--/User profile content-->
                <!--Footer-->
                <div style="margin-left: 10px;" class="row mt-5 mb-4 footer">
                    <div class="col-sm-12">
                        <span class="small text-light">&copy; Tous droits reservés<a class="text-info" href="<?= base_url() ?>/#"> Institut Pasteur de Bangui</a></span>
                    </div>
                </div>
                <!--Footer-->
            </div>

        </div>
    </div>

    <!--Main Content-->

    </div>

    <!--Page Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="<?= base_url() ?>/assets/js/jquery-3.7.1.js"></script>

    <!--Popper JS-->
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
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
    <!--JsGrid table-->
    <script src="<?= base_url() ?>/assets/js/jsgrid.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/jsgrid-demo.js"></script>
    <!--Switchery JS-->
    <script src="<?= base_url() ?>/assets/js/switchery.min.js"></script>
    <!--Bootstrap tagsinput-->
    <script src="<?= base_url() ?>/assets/js/bootstrap-tagsinput.min.js"></script>

    <script src="<?= base_url() ?>/assets/js/jq/jquery-ui.js"></script>
    <script src="<?= base_url() ?>/assets/js/moment.js"></script>

    <script type="text/javascript">
        var base = "<?= base_url() ?>";
    </script>

    <script>
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
        });
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
    </script>
</body>

</html>