<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta>

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

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
    <!--Alertify CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/alertify.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/themes/default.rtl.min.css">
    <!--Fullcalendar CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/fullcalendar-3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/fullcalendar-3.9.0/fullcalendar.print.min.css" media='print'>
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/js/calendar/bootstrap_calendar.css">
    <!--Map-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jquery-jvectormap-2.0.2.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/js/calendar/bootstrap_calendar.css">
    <!--Nice select -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/js/tabulator-master/dist/css/tabulator_bootstrap5.min.css">

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

<body id="body_corps">
    <!--Page loader-->
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <!--Page loader-->


    <!--Page Wrapper-->

    <div style="background-image:url('<?= base_url() ?>/assets/img/bg-ocean.jpg');background-size:cover;" class="container-fluid">
        <!--Header-->
        <div class="row header shadow-sm">

            <!--Logo-->
            <div class="col-sm-3 pl-0 text-center header-logo">
                <div class="bg-gradient-theme mr-3 pt-3 pb-2 mb-0">
                    <h3 class="logo"><a href="<?= base_url() ?>/#" class="text-secondary logo"> <img class="containering align-self-center mr-3 rounded-circle" src="<?= base_url() ?>/assets/img/labo.svg" width="50px" height="50px" alt="Generic placeholder image">Espace Gestion de<span class="centering">Kits</span></a></h3>
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
                                    } elseif ($duration == str_contains($duration, 'week')) {
                                        $duration = str_replace('week', 'semaine', $duration);
                                    } elseif ($duration == str_contains($duration, 'weeks')) {
                                        $duration = str_replace('weeks', 'semaines', $duration);
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
        <!--Header-->

        <!--Main Content-->

        <div class="row main-content">
            <section id="mains">

            </section>
            <!--Sidebar left-->
            <div class="col-sm-3 col-xs-6 sidebar pl-0">
                <div style="background-color:darkblue" class="inner-sidebar mr-3">
                    <div class="image animated zoomIn">
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
                            <li class="parent" id="list_mag">
                                <a href="<?= base_url() ?>/#" onclick="toggle_menu('mag'); return false" class=""><i class="fas fa-window-maximize mr-3"> </i>
                                    <span style="font-size: small;" class="none">Management des Magasins<i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="mag"></ul>
                            </li>

                            <!--Stocks de Postes-->
                            <li class="parent" id="list_post">
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
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm lh-sm">
                    <!-- header de la page pour impression -->
                    <div id="header" class="tabulator-print-header">
                        <div style="display: box;margin-top:5%">
                            <div class="text-center" style="background-image:url('<?= base_url() ?>/assets/img/icone-reactif2.jpeg');background-size:cover;">
                                <small style="font-weight:600;" class="text-light">GESTION DES KITS</small>
                            </div>
                            <img src="<?= base_url() ?>/assets/img/ipb.png" width="110px" alt="Logo Institut Pasteur">
                            <div style="font-size: 12px;">
                                <small style="padding-left: 0.5%;">UNITES DE SUPPORT</small></br>
                                <small style="padding-left: 2.5%;">*_*_*_*</small></br>
                                <small>SERVICE DE LOGISTIQUE</small>
                            </div>
                        </div>
                        <div style="margin-left:320px;margin-bottom:50px;">
                            <h6 style="letter-spacing: 35px;">SUIVI DE STOCK</h6>
                        </div>
                    </div>
                    <div>
                        <div class="email-msg">
                            <div class="tabulator-cell" id="inventory-table"></div>
                        </div>

                    </div>
                    <div style="margin-top:20px;">
                        <button id="csv-file" class="btn bg-success btn-outline-light"><i class="fa fa-download text-light"></i> Format Excel</button>
                        <button class="btn bg-danger btn-outline-light" id="print-table"><i class="fa  fa-file-pdf text-light"></i> PDF</button>
                    </div>

                </div>

                <!--Footer-->
                <div class="row mt-5 mb-4 footer">
                    <div class="col-sm-8">
                        <span class="text-light">&copy; Tous droits reservés<a class="text-info" href="<?= base_url() ?>/#"> Institut Pasteur de Bangui</a></span>
                    </div>
                </div>
                <!--Footer-->

            </div>
        </div>

        <!--Main Content-->
    </div>

    <!--Page Wrapper-->

    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery-1.12.4.min.js"></script>
    <!-- Tabulator-->
    <script src="<?= base_url() ?>/assets/js/tabulator-master/dist/js/tabulator.min.js"></script>
    <!--Popper JS -->
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

    <!--Echarts.JS-->
    <script src="assets/js/charts/echarts.min.js"></script>

    <!--Echarts.JS-->

    <script src="<?= base_url() ?>/assets/js/charts/jquery.flot.categories.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/charts/jquery.flot.stack.min.js"></script>
    <!--Chart JS-->
    <script src="<?= base_url() ?>/assets/js/charts/chart.min.js"></script>
    <!--Full calendar-->
    <script src="<?= base_url() ?>/assets/css/fullcalendar-3.9.0/lib/moment.min.js"></script>
    <script src="<?= base_url() ?>/assets/css/fullcalendar-3.9.0/fullcalendar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/full-calendar.js"></script>
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
    <!--Alertify JS-->
    <script src="<?= base_url() ?>/assets/js/alertify.min.js"></script>
    <!--/Alertify JS-->
    <!--Nice select-->
    <script src="<?= base_url() ?>/assets/js/jquery.nice-select.min.js"></script>

    <!--Custom Js Script-->
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
    <script src="<?= base_url() ?>/assets/js/xlsx.full.min.js"></script>

    <!-- Initialiser les données de l'inventaire dans tabulator -->
    <script>
        // Définir les données du tableau
        <?php if (isset($suivi)) {
            $tabledata = [];
            $index = 1;
            foreach ($suivi  as $e) {

                $tabledata[] = [
                    "num" => $index,
                    "code" => esc($e->Id),
                    "desc" => strtoupper(esc($e->Produit)),
                    "libelle" => $e->Categorie,
                    "unite_prod" => esc($e->Unite),
                    "stock_ini" => esc($e->Stock_Initial),
                    "entr_stock" => esc($e->Entree_Stock),
                    "stock_phys_dispo" => esc($e->Stock_Disponible),
                    "sort_stock" => esc($e->Sortie_Stock),
                ];
                $index++;
            }
        } ?>

        var tabledata = <?php echo json_encode($tabledata); ?>
        // Initialiser Tabulator
        var table = new Tabulator("#inventory-table", {
            data: tabledata,
            pagination: "local",
            printAsHtml: true,
            printStyled: true,
            printHeader: function() {
                var elm = document.getElementById("header");
                return elm;
            },
            langs: {
                "fr-fr": { //French language definition
                    "columns": {
                        "name": "Nom",
                        "progress": "Progression",
                        "gender": "Genre",
                        "rating": "Évaluation",
                        "col": "Couleur",
                        "dob": "Date de Naissance",
                    },
                    "pagination": {
                        "first": "Premier",
                        "first_title": "Première Page",
                        "last": "Dernier",
                        "last_title": "Dernière Page",
                        "prev": "Précédent",
                        "prev_title": "Page Précédente",
                        "next": "Suivant",
                        "next_title": "Page Suivante",
                        "all": "Toute",
                    },
                },
            },
            rowHeader: {
                headerSort: false,
                resizable: false,
                frozen: true,
                headerHozAlign: "center",
                hozAlign: "center",
                formatter: "rowSelection",
                titleFormatter: "rowSelection",
                cellClick: function(e, cell) {
                    cell.getRow().toggleSelect();
                }
            },
            paginationSize: 30,
            paginationSizeSelector: [3, 6, 8, 10],
            movableColumns: true,
            paginationCounter: "rows",
            groupBy: "libelle",
            layout: "fitColumns",
            history: true, //allow undo and redo actions on the table
            headerSortClickElement: "header",
            selectableRange: true,
            selectableRangeColums: true,
            selectableRangeClearCells: true, // allow to clear all datas selected 
            editTriggerEvent: "dbclick", // allow double click when editing
            clipboard: true,
            clipboardCopyRowRange: "range",
            clipboardPasteParser: "range",
            clipboardPasteAction: "range",
            clipboardCopyConfig: {
                rowHeader: false, //do not include row header in the clipboard output
                columnHeaders: false, //do not include column headers in the clipboard output
            },
            clipboardCopyStyled: false,

            columnDefaults: {
                tooltip: true, //show tool tips on cells
            },
            columns: [{
                    title: "N°",
                    field: "num",
                    width: 100
                },
                {
                    title: "CODE",
                    field: "code",
                    width: 100
                },
                {
                    title: "DESCRIPTION",
                    field: "desc",
                    width: 250
                },
                {
                    title: "UNITE",
                    field: "unite_prod",
                    width: 100
                },
                {
                    title: "STOCK INITIAL",
                    sorter: "number",
                    field: "stock_ini",
                    width: 200
                },
                {
                    title: "ENTREE STOCK",
                    field: "entr_stock",
                    sorter: "number",
                    width: 200
                },
                {
                    title: "SORTIE STOCK",
                    field: "sort_stock",
                    sorter: "number",
                    validator: 'min:0',
                    width: 250,
                },
                {
                    title: "STOCK PHYSIQUE DISPONIBLE",
                    sorter: "number",
                    field: "stock_phys_dispo",
                    width: 200,
                }
            ],
        });
        document.getElementById("print-table").addEventListener("click", function() {

            table.print(false, true); // Impression de la table
            location.reload();
            alertify.set('notifier', 'position', 'bottom-right');
            alertify.notify('Le fichier est bien imprimé !', 'custom', 6, function() {
                console.log('dismissed');
            }).dismissOthers();

        });

        document.getElementById("csv-file").addEventListener("click", function() {
            table.download("xlsx", "data.xlsx");
        });
    </script>

    <script type="text/javascript">
        var base = "<?= base_url() ?>";
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

    <?php

    //Pour afficher l'info par rapport à la restriction d'accès à certaines pages
    if (isset($info)) {
    ?>
        <script>
            $(function() {
                swal("Info", "Désolé ! Vous n'avez pas accès à la page \n que vous veniez de visiter.", "info");
            });
        </script>
        <?php }

    //Pour  montrer le lien vers le profil utilisateur en fonction de l'utilisateur
    //Si l'user est un admin, on aura "Compte et utilisateurs", etc.
    if (isset($permission)) {
        if ($permission == "Administrateur") { ?>
            <script type="text/javascript">
                var base = "<?= base_url() ?>";
                $('#lienprofile').html('<i class="fa fa-cog"> Paramètre et administration</i>');
                $('#lienprofile').attr('href', base + '/profileadmin');
                $('#lienprofile2').attr('hidden', false);
                $('#divider_2').attr('hidden', false);
                $('#lienprofile2').html('<i class="fa fa-shield"> Pare-feu</i>');
                $('#lienprofile2').attr('href', base + '/firewall/panel');
            </script>

        <?php


        }
        if ($permission == "Directeur Général") { ?>
            <script>
                $('#list_mag').prop('hidden', true);
                $('#list_post').prop('hidden', true);
            </script>
    <?php }
    } ?>

</body>

</html>