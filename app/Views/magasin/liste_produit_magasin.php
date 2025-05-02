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
    <!--Pricing-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pricing.css">
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
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>


    <!--Page Wrapper-->

    <div class="container-fluid" style="background-image:url('<?= base_url() ?>/assets/img/bg-ocean.jpg');background-size:cover;">

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
                        <div class="menu-icon">
                            <a class="" id="cloche" onclick="toggle_dropdown(this); return false" role="button" class="dropdown-toggle">
                                <i class="fa text-warning fa-bell gran"></i>
                                <span style="margin-left:6px;" id="badge_notif" class="badge badge-primary"></span>
                            </a>

                            <?php

                            use CodeIgniter\I18n\Time;

                            $GLOBALS['now'] = Time::now('Africa/Bangui', 'en_US'); //donne la datetime du  moment -> 2024-01-08 23:05

                            echo '
                                                <div id="notif_body" hidden class="dropdown dropdown-bottom bg-white shadow border animated flipInX" style="display: block; overflow-y:scroll;height:300px;">
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
                                                                <div class="media alert alert-warning alert-dismissible fade show" role="alert">
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
                                                                <button type="button"  onclick="markAs(' . $cat['id_notif'] . ');" class="close btn fa fa-eye text-primary" data-dismiss="alert" aria-label="Close">
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
        <div class="row main-content">
            <section id="mains">

            </section>
            <!--Sidebar left-->
            <div class="col-sm-3 col-xs-6 sidebar pl-0">
                <div style="background-color:darkblue" class="inner-sidebar mr-3">
                    <div class="image animated rotateIn">
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
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="shadow-lg">
                    <nav style="margin-top: 5px;" aria-label="breadcrumb">
                        <ol style="background-image:url('<?= base_url() ?>/assets/img/bg-ocean.jpg');background-size:cover;" class="breadcrumb breadcrumb-arrow  bleu2">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/"><span style="font-size: small;" class="text-dark"><strong>Tableau de bord</strong></span></a></li>
                            <li class="breadcrumb-item"><a href="#"><span style="font-size: small;">Management des magasins</span></a></li>
                            <li id="nom_magasin" class="breadcrumb-item active" aria-current="page"><span style="font-size: small;"> <?= $nummag ?></span></li>
                        </ol>
                    </nav>
                </div>
                <div style="padding-left: 68%; display:flex;" class="col-sm-4 text-right pb-3">
                    <div style="margin-right:10px;">
                        <button type="button" onclick="fix2()" class="btn btn-secondary shadow pull-right bleu8">
                            <i class="fas fa-plus"> Catégorie</i>
                        </button>
                    </div>
                    <button type="button" onclick="fix()" class="btn shadow pull-right bleu1" data-toggle="modal" data-target="#createModal">
                        <i class="fas fa-plus"> Nouveaux Produits</i>
                    </button>
                </div>
                <div class="mt-4 mb-4 p-3 shadow-sm lh-sm" style="background-image:url('<?= base_url() ?>/assets/img/preg.jpg');background-size:cover">
                    <!--Order Listing-->
                    <div class="product-list">

                        <div class="table-responsive product-list">
                            <table data-idstock="<?= $id_stock ?>" class="table table-hover bg-white table-bordered table-striped mt-3" id="productList">
                                <thead class="theadcolor text-light bg-secondary">
                                    <tr>
                                        <th style="width: 10px;" class="p-0 pr-4 align-middle">
                                            <p style="padding-left: 70%;">Id</p>
                                        </th>
                                        <th>Description</th>
                                        <th>Unité</th>
                                        <th>Stock disponible</th>
                                        <th>Catégorie</th>
                                        <th>Stock entré le:</th>
                                        <th>Expiration :</th>
                                    <!--    <th>Détails</th> -->
                                    </tr>
                                </thead>
                                <tbody id="tbod">
                                    <?php
                                    if (isset($produits)) {
                                        $i = 1;
                                        foreach ($produits as $row1 => $p) { ?>

                                            <tr id="<?= $p['id_prod'] ?>">
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <span class="badge center"><?= $p['id_prod_stock'] ?></span>
                                                </td>
                                                <td id="tab_prod"> <?= $p['desc'] ?></td>
                                                <td id="tab_unite"> <?= $p['unite'] ?></td>
            
                                                <?php if ($p['qtite_prod'] > 9) {
                                                    echo "<td class='text-center'>" . $p['qtite_prod'] . "</td>";
                                                } else {
                                                    echo " <td class='text-center'><span class='fa fa-exclamation-circle text-danger'></span>   " . $p['qtite_prod'] . "</td>";
                                                } ?>
                                                 <td class="align-middle">
                                                    <?= $p['libelle'] ?>
                                                </td>
                                                <td class="align-middle"> <?= $p['dateEntree'] ?></td>
                                                <td> <?= $p['dateExp'] ?></td>
                                                <!--
                                                <td class="align-middle text-center">
                                                    <button id="updatings" onclick="editFun(<?= $p['id_prod'] ?>,<?= $p['id_prod_stock'] ?>)" class="btn btn-light icon-round animated jello" data-id="<?= $p['id_prod'] ?>"><i class="fa fa-info"></i></button>
                                                </td>    
                                                 -->
                                            </tr>
                                    <?php $i++;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/Order Listing-->

                    <!--Order Update Modal-->
                    <div class="modal animated fade zoomInDown" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div style="background-image: url(<?= base_url() ?>/assets/img/icone-re3.jpeg);" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><strong>Modification</strong></h5>
                                    <button type="button" class="close bg-gradient-light btn-light" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="background:inherit;" class="mt-1 mb-4 p-3 button-container shadow-lg">
                                        <form action="" id="updateForm" class="mt-3">
                                            <div class="form-group row">
                                                <div class="col-sm-5">
                                                    <input name="id_stk" type="number" value="<?= $id_stock ?>" id="input2" class="form-control" hidden />
                                                    <input name="num_mag" type="text" value="<?= $id_mag ?>" class="form-control" hidden />
                                                    <input name="id_pro" type="text" value="" class="form-control" hidden />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Required1" class="control-label col-sm-2">Produit</label>
                                                <div class="col-sm-4">
                                                    <input name="prdt" type="text" placeholder="nom du produit" id="Required1" class="form-control form-control-sm" required />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-sm-2" for="Required2">Catégorie</label>

                                                <div class="col-sm-4">
                                                    <select id="Required2" name="ctg" class="form-control form-control-sm" required>
                                                        <option id="unique"></option>
                                                        <?php if (isset($categorie)) { ?>
                                                            <?php foreach ($categorie as $key => $cat) { ?>
                                                                <?php $opt = '<option id="' . $cat['libelle'] . '" value="' . $cat['id_catg'] . '">' . $cat['libelle'] . '</option>';
                                                                echo $opt;
                                                                ?>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-2" for="Required3">Quantité</label>
                                                <div class="col-sm-4">
                                                    <input min="1" name="qte" type="number" value="" id="Required3" class="form-control form-control-sm" placeholder="quantité de produit" required />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div>
                                                    <p>
                                                        <label id="lab_datexp" class="control-label col-sm-8" for="Required4">Pour produit expirable</label>
                                                    </p>

                                                </div>
                                                <div>
                                                    <p style="padding-left: 0%;">
                                                        <a class="btn btn-outline-secondary btn-round shadow" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                            <i style="font-size: 20px;" class="fa fa-calendar"> Date d'expiration</i>
                                                        </a>
                                                    </p>
                                                </div>
                                                <div style="padding-left:10%" class="collapse hide shadow" id="collapseExample">
                                                    <div class="card">
                                                        <div class="col-sm-12">
                                                            <input name="d_exp" type="date" class="form-control" id="Required4" placeholder="" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="send" type="submit" class="btn btn-outline-light bg-gradient-light shadow icon-round"><i class="fa fa-check"></i></button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Order Update Modal-->

                    <!--Order Add Modal-->
                    <div class="modal animated fade zoomInDown" data-bs-backdrop="static" data-bs-keyboard="false" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div style="background-image: url(<?= base_url() ?>/assets/img/icone-re3.jpeg);" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><strong>Nouveaux produits</strong></h5>
                                    <button type="button" class="close bg-gradient-light btn-light" data-target="#infoModal" data-toggle="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="background:inherit;" class="mt-1 mb-4 p-3 button-container shadow-lg">
                                        <?php csrf_token() ?>
                                        <form action="" method="post" class="needs-validation" id="createForm" class="mt-3">
                                        <?php csrf_field() ?>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <input name="id_stock" type="number" value="<?= $id_stock ?>" id="input2" class="form-control form-control-sm" hidden />
                                                    <input name="num_mag" value="<?= $num_magasin ?>" hidden>
                                                    <input id="id__unite" name="id_unite" value="" hidden>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Require1" class="control-label col-sm-2">Description du produit :</label>
                                                <div class="col-sm-10">
                                                    <input autofocus name="produit" type="text" placeholder="" id="Require1" class="form-control form-control-sm" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div>
                                                    <label for="Require1" class="control-label col-sm-3">Conditionnement:</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input autofocus name="unite" type="text" placeholder="remplissez" id="input_unite" class="form-control form-control-sm" required />
                                                </div>
                                                <div class="col-sm-1">
                                                    <label> ou </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select id="unite_id" name="select_unite" class="form-control form-control-sm">
                                                        <?php if (isset($conditionnement)) { ?>
                                                            <option id="mycond_id" value="">Sélectionnez</option>
                                                            <?php foreach ($conditionnement as $key => $cat) { ?>
                                                                <option id="<?= $cat['libelle'] ?>" value="<?= $cat['id_unite'] ?>"><?= $cat['libelle'] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Require1" class="control-label col-sm-2">Numéro de lot:</label>
                                                <div class="col-sm-10">
                                                    <input autofocus name="lot" type="text" placeholder="" id="RequireLot" class="form-control form-control-sm" required />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="Require2">Catégorie :</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select id="Require2" name="categorie" class="form-control form-control-sm" required>
                                                        <?php if (isset($categorie)) { ?>
                                                            <option id="mycatg" value="">Sélectionnez</option>
                                                            <?php foreach ($categorie as $key => $cat) { ?>
                                                                <option id="<?= $cat['libelle'] ?>" value="<?= $cat['id_catg'] ?>"><?= $cat['libelle'] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-2" for="Require3">Quantité stocké :</label>
                                                <div class="col-sm-10">
                                                    <input min="1" name="quantite" type="number" value="" id="Require3" class="form-control form-control-sm" placeholder="" required />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div>
                                                    <p>
                                                        <label id="lab_datexp" class="control-label col-sm-12 text-danger" for="Require4">*NB: Pour produit expirable :</label>
                                                    </p>
                                                </div>
                                                <div>
                                                    <p style="padding-left: 0%;">
                                                        <a class="btn btn-outline-secondary btn-round shadow" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                            <i style="font-size: 20px;" class="fa fa-calendar"> Date d'expiration :</i>
                                                        </a>
                                                    </p>
                                                </div>
                                                <div style="padding-left: 10%;" class="collapse hide shadow" id="collapseExample">
                                                    <div class="card">
                                                        <div class="col-sm-12">
                                                            <input name="date_exp" placeholder="jj/mm/aa" type="date" maxlength="100" class="form-control" id="Require4" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id='btn' type="submit" class="btn bg-gradient-light btn-outline-light icon-round"><i class="fa fa-check"></i></button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Order Add Modal-->

                    <!--info Modal-->
                    <div class="modal animated fade lightSpeedIn" data-bs-backdrop="static" data-bs-keyboard="false" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content bg-gradient-light">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalCenterTitle"><strong>Info</strong></h5>
                                </div>
                                <div class="modal-body">
                                    <p class="text-secondary medium text-center"><strong>Voulez-vous quitter le formulaire d'enregistrement ?</strong></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-danger btn-outline-light shadow icon-round" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                    <button type="button" class="btn bg-gradient-light btn-outline-light shadow icon-round" onclick="clik1()" onkeyup="getdata()" data-target="#createModal" data-dismiss="modal" data-toggle="modal"><i class="fa fa-check"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--categorie Modal pour créer de nouvelles catégories-->
                <div class="modal animated fade zoomInDown" data-bs-backdrop="static" data-bs-keyboard="false" id="categModal" tabindex="-1" role="dialog" aria-labelledby="categModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-light">
                            <form method="POST" id="categorieForm">
                                <?php csrf_token() ?>
                                <div style="padding-left:30%;" class="modal-header">
                                    <h5 class="modal-title text-dark" id="categModalCenterTitle"><strong>Nouvelle catégorie</strong></h5>
                                </div>
                                <div style="background-image: url(<?= base_url() ?>/assets/img/blood-tube.jpg);" class="modal-body">
                                    <div style="margin-left: 30px;" class="form-group row">
                                        <label for="Require1" class="control-label col-sm-3">Catégorie</label>
                                        <div class="col-sm-7">
                                            <input autofocus name="newcategorie" type="text" placeholder="nom de la catégorie" id="newCategorie" class="form-control form-control-sm" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-danger btn-outline-light shadow icon-round" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                    <input type="submit" class="btn bg-success btn-outline-light shadow " value="Ok" data-target="#categModal">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end -->

                <!--categorie Modal pour modifier des catégories-->
                <div class="modal animated fade zoomInDown" data-bs-backdrop="static" data-bs-keyboard="false" id="categ_modifModal" tabindex="-1" role="dialog" aria-labelledby="categ_modifModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-light">
                            <form method="POST" id="categorie_modif_Form">
                                <?php csrf_token() ?>
                                <div style="padding-left:30%;" class="modal-header">
                                    <h5 class="modal-title text-dark" id="categModalCenterTitle"><strong>Modification</strong></h5>
                                </div>
                                <div style="background-image: url(<?= base_url() ?>/assets/img/blood-tube.jpg);" class="modal-body">
                                    <div style="margin-left: 30px;" class="form-group row">
                                        <label for="Require1" class="control-label col-sm-3">Catégorie</label>
                                        <div class="col-sm-7">
                                            <input autofocus name="modifcat_name" type="text" placeholder="nom de la catégorie" id="libellemodif_Categorie" class="form-control form-control-sm" required />
                                            <input name="id_catg" type="text" id="idmodif_Categorie" hidden />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-danger btn-outline-light shadow icon-round" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                    <input type="submit" class="btn bg-success btn-outline-light shadow " value="Ok" data-target="#categ_modifModal">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end -->

                <div style="background-image:url('<?= base_url() ?>/assets/img/bg-ocean-light.png');background-size:cover;" class="card shadow">
                    <div class="card-body">
                        <span class=""><strong>Toutes les catégories</strong></span>

                        <div style='display:flex;' class="media border-top pt-1">
                            <div id="cate" class="media-body">
                                <?php if (isset($categorie)) {
                                    foreach ($categorie as $key => $cat) { ?>
                                        <i style='font-size:8px;' class='fa fa-circle small'></i>
                                        <span onmouseenter="color_enter(<?= $cat['id_catg'] ?>, 'color:#0c4093;font-size:15px;font-weight:30px;cursor:pointer;');" onmouseleave="color_leave(<?= $cat['id_catg'] ?>, 'color:black;font-weight:normal;');" id="<?= $cat['id_catg'] ?>" class="bc-description mt-2" data-idcategorie="<?= $cat['id_catg'] ?>"> <?= $cat['libelle'] ?></span><span class="pull-right"><i id="modif<?= $cat['id_catg'] ?>" onmouseenter="color_enter('modif<?= $cat['id_catg'] ?>', 'color:blue;font-size:18px;font-weight:30px;');" onmouseleave="color_leave('modif<?= $cat['id_catg'] ?>', 'color:black;font-weight:normal;');" class="fa fa-pencil btn" onclick="modif_catg(<?= $cat['id_catg'] ?>);"></i><i id="eff<?= $cat['id_catg'] ?>" onmouseenter="color_enter('eff<?= $cat['id_catg'] ?>', 'color:red;font-size:18px;font-weight:30px;');" onmouseleave="color_leave('eff<?= $cat['id_catg'] ?>', 'color:black;font-weight:normal;');" class="fa fa-trash btn" onclick="suppr_catg(<?= $cat['id_catg'] ?>);"></i></span>
                                        <div class="clearfix"></div>
                                        <div class="dropdown-divider"></div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Mini-Inventaire Begin-->
                <div style="margin-top: 100px;" id="divinv" class="col-md-12">

                    <!--PRICE CONTENT START-->
                    <div class="generic_content border shadow clearfix">

                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">

                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">

                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head small">
                                    <span><i class="fa fa-book"></i> Inventaire</span>
                                    <p style="font-weight:lighter; font-stretch:wider;" class="text-center"><?= $nummag ?></p>
                                </div>
                                <!--//HEAD END-->

                            </div>
                            <!--//HEAD CONTENT END-->

                            <!--PRICE START-->
                            <div style="display: flex;" class="">
                                <div class="col-lg-4 col-4 border-right">
                                    <a href="#">
                                        <h4 id="total_product"></h4>
                                        <p id="total" class="coloration small">Produits</p>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-4 border-right">
                                    <a href="#">
                                        <h4 id="expired_product"></h4>
                                        <p id="produitexp" class="coloration small">Produits expirés</p>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-4 border-right">
                                    <a href="#">
                                        <h4 id="used_product">20</h4>
                                        <p id="nbre_ravit" class="coloration small">Nombre de ravitaillement</p>
                                    </a>
                                </div>
                            </div>
                            <!--//PRICE END-->

                        </div>
                        <!--//HEAD PRICE DETAIL END-->

                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                            <ul>
                                <li>
                                    <h6>Produits hors d'usage:</h6>
                                </li>
                            </ul>
                            <div style="margin-left: 10px;" id="produits_expired"></div>
                            <div id="externalPagermag1hema"></div>
                        </div>
                        <!--//FEATURE LIST END-->

                    </div>
                    <!--//PRICE CONTENT END-->

                </div>

                <!--Mini-Inventaire End-->


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
    <script src="<?= base_url() ?>/assets/js/xlsx.full.min.js"></script>

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
    }


    ?>
    <!--end script -->

    <script>
        function suppr_catg($id_catg) {
            $(function() {
                var user = '<?= $permission ?>';
                if (user == "Utilisateur" || user == "Directeur Général") {
                    swal('Info', 'Désolé, cette opération est prohibée !', 'info');
                } else {
                    swal({
                        title: "Supprimer ?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then(function(willSave) {
                        if (willSave) {
                            $.ajax({
                                url: base + "/supprCategorie",
                                data: {
                                    'id_catg': $id_catg
                                },
                                type: "POST",
                                dataType: 'json',
                                error: function(e) {
                                    swal('Erreur', 'La suppression n\'a pas pu aboutir', 'error');
                                },
                            }).done(function(data) {
                                var reponse = data;
                                $('#categModal').modal('hide');
                                if (reponse === 'réussi') {
                                    swal('Info', 'La catégorie est supprimée', 'success').then(function() {
                                        setTimeout(() => {
                                            location.reload();
                                        }, 10);
                                    });
                                } else if (reponse === 'erreur') {
                                    swal('Info', 'Impossible de supprimer cette catégorie ! \n Ses produits existent dans le magasin.', 'info');
                                } else if (reponse === 'empty') {
                                    swal('Info', 'Une erreur est survenue. Veuillez réessayer', 'error');
                                }

                            });
                        }
                    });
                }
            });
        }

        function modif_catg($id_catg) {
            var user = '<?= $permission ?>';
            if (user == "Utilisateur" || user == "Directeur Général") {
                swal('Info', 'Désolé, cette opération est prohibée !', 'info');
            } else {
                $('#categ_modifModal').modal({
                    backdrop: 'static',
                    keyboard: false // pour empêcher la fermeture avec la touche échappe
                });
            }

            $(function() {

                $.ajax({
                    url: base + "/getCat/" + $id_catg,
                    method: "GET",
                    dataType: "json",
                    success: function(data, textStatus, jqXHR) {

                        $('#categorie_modif_Form input[name="modifcat_name"]').val(data['libelle']);
                        $('#categorie_modif_Form input[id="idmodif_Categorie"]').val(data['id_catg']);
                    },
                    error: function(e) {
                        swal('Erreur', 'Une erreur est survenue !\n Veuillez réessayer.', 'error');
                    },
                });

                $('#categorie_modif_Form').submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: base + "/modifCategorie",
                        data: $('#categorie_modif_Form').serialize(),
                        method: "POST",
                        dataType: 'json',
                        error: function(e) {
                            swal('', 'Cette catégorie existe déjà', 'warning');
                        },
                    }).done(function(data) {
                        var reponse = data;
                        $('#categModal').modal('hide');
                        if (reponse === 'réussi') {
                            swal('Info', 'La catégorie est modifiée', 'success').then(function() {
                                setTimeout(() => {
                                    location.reload();
                                }, 1);
                            });
                        } else if (reponse === 'empty') {
                            swal('Info', 'Une erreur est survenue. Veuillez réessayer', 'error');
                        }

                    });
                });
            });
        }

        function clik1() {
            $(function() {

                setTimeout(() => {
                    location.reload();
                }, 500);
            });
        }

        function clik2() {
            $(function() {
                $('#categorieForm').submit(function(e) {
                    e.preventDefault();
                    var newcateg = $("#newCategorie").val().toLowerCase();
                    alert(newcateg);
                    $.ajax({
                        url: base + "/createCategorie",
                        data: {
                            "newcategorie": newcateg
                        },
                        type: "POST",
                        success: function(data, textStatus, jqXHR) {

                        },
                        error: function(e) {
                            swal('', 'Cette catégorie existe déjà', 'warning');
                        },
                    }).done(function() {
                        $('#categModal').modal('hide');
                        swal('Info', 'Une nouvelle catégorie est créée', 'success').then(function() {
                            setTimeout(() => {
                                location.reload();
                            }, 100);
                        });
                    });
                });
            });
        }
        clik2();

        function fix2() {
            var user = '<?= $permission ?>';
            if (user == "Utilisateur" || user == "Directeur Général") {
                swal('Info', 'Désolé, cette opération est prohibée !', 'info');
            } else {
                $('#categModal').modal({
                    backdrop: 'static',
                    keyboard: false // pour empêcher la fermeture avec la touche échappe
                });
            }
        }
    </script>

    <script type="text/javascript">
        function fix() {
            $('#createModal').modal({
                backdrop: 'static',
                keyboard: false // pour empêcher la fermeture avec la touche échappe
            });
        }
    </script>


    <script>
        //Order list dataTable
        $("#productList").DataTable();
        //Nice select
        $('.bulk-actions').niceSelect();
    </script>

    <!--Script de récupération d'élément du tableau-->
    <script>
        function editFun(id,id_prod_stock) {

            var user = '<?= $permission ?>';
            if (user == "Utilisateur" || user == "Directeur Général") {
                swal('Info', 'Désolé, cette opération est prohibée !', 'info');
            } else {

                $('#updateModal').modal({
                    backdrop: 'static',
                    keyboard: false // pour empêcher la fermeture avec la touche échappe
                });
            }
            var idstock = $('#productList').data('idstock');

            $.ajax({
                url: base + "pages/getCharger/" + id + "/" + id_prod_stock + "/" + idstock,
                type: "GET",
                dataType: "json",
                success: function(data, textStatus, jqXHR) {

                    $('#updateForm input[name="prdt"]').val(data['Produit']);
                    $('#updateForm input[name="id_pro"]').val(data['Idp']);

                    $('#updateForm').find('#' + data['Catégorie'] + '').prop('selected', 'true');
                    $('#updateForm input[name="qte"]').val(data['Quantité']);
                    $('#updateForm input[name="d_exp"]').val(data['Expire le:']);
                },
                error: function(e) {
                    alert('error', e.message);
                },
            });
        }
    </script>

    <!--Script d'enregistrement dans la base de données-->
    <script type="text/javascript">
        $('#id__unite').prop('value',$('#input_unite').find('option:selected').val());
        $('#unite_id').on('change', function(e) {
            e.preventDefault();
            var selectedValue = $(this).find('option:selected').val();
            var selectedText = $(this).find('option:selected').text();
            $('#btn').data('unit_id', selectedValue);
            $('#btn').data('unit_libelle', selectedText);
            $('#id__unite').prop('value',selectedValue);
            if (selectedText != "Sélectionnez") {
                $('#input_unite').val(selectedText);
            }

        });


        $('#createForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: base + '/addprod_magasin',
                data: $('#createForm').serialize(),
                dataType: 'json',
                async: true,
                success: function(data) {
                    $('#createForm')[0].reset();
                    //swal('Info', 'Enregistrement effectué avec succès !', 'success');
                    alert("Entrées en stock:"+data['entr_stock']+"\nStock initial:"+data['stock_ini']+"\nStock physique disponible:"+data['stock_phys_dispo']+"\n");
                },
            }).done(function(data) {
                //alert(data['Produit']);
            }).fail(function(error) {
                alert('Il y a une erreur');
            });
        });
    </script>

    <!--Script de mise à jour de la base de données-->
    <script type="text/javascript">
        $('#updateForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: base + '/updateprod_magasin',
                data: $('#updateForm').serialize(),
                //dataType: 'json',
            }).done(function(data) {
                suc()
            }).fail(function(error) {
                alert(error)
            })

            function suc() {
                swal('Info', 'Le produit est bien modifié !', 'success').then(() => {

                    setTimeout(() => {
                        $("#updateModal").modal('hide');
                    }, 500);
                    setTimeout(() => {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.notify('Une entrée a été modifiée.', 'success', 2, function() {}).dismissOthers();
                    }, 500);
                    setTimeout(() => {
                        location.reload();
                    }, 3000);

                });
            };
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
        color1('gran', 'font-size:20px;', 'font-size:15px;');
        color2('bleu1', 'btn btn-light btn-round shadow pull-right bleu1', 'btn shadow pull-right bleu1');
        color2('bleu8', 'btn btn-gradient-secondary btn-round shadow pull-right bleu8', 'btn btn-secondary shadow pull-right bleu8');
        color2('theadcolor', 'bg-gradient-theme text-light theadcolor', 'bg-secondary text-white theadcolor');


        function color_enter(valeur1, classe1) {
            $(function() {
                $('#' + valeur1 + '').prop('style', classe1);
            });
        }

        function color_leave(valeur1, classe2) {
            $(function() {
                $('#' + valeur1 + '').prop('style', classe2);
            });
        }

        function fillinventory() {
            $(function() {
                var idstock = $('#productList').data('idstock');

                //1ere requete pour recup le nombre total de produits
                $.ajax({
                    url: "/getdatainventory1",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        'id_stock': idstock,
                    }
                }).done(function(data1) {

                    if (data1 > 9) {
                        $('#total_product').text(data1);
                        $('#total_product').prop('class', 'text-success');
                    } else {
                        $('#total_product').text(data1);
                        $('#total_product').prop('class', 'text-danger');
                    }



                }).fail(function(data11) {
                    alert('Une erreur est survenue au cours du chargement de la page.');
                });

                //2e requête pour recup le nbre de product expired
                $.ajax({
                    url: "/getdatainventory2",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        'id_stock': idstock,
                    }
                }).done(function(data2) {

                    if (data2 < 10) {
                        $('#expired_product').html('<span class="text-danger">' + data2 + '</span>');
                    } else if (data2 >= 10) {
                        $('#expired_product').html('<span class="text-success">' + data2 + '</span>');
                    } else if (data2 < 2) {
                        $('#produitexp').text('Produit expiré');
                    }

                }).fail(function(data22) {
                    alert('Une erreur est survenue au cours du chargement de la page.');
                });

                //3e requête pour recup le nbre de ravitaillement
                $.ajax({
                    url: "/getdatainventory3",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        'id_stock': idstock,
                    }
                }).done(function(data3) {
                    $('#used_product').text(data3);
                }).fail(function(data33) {
                    alert('Une erreur est survenue au cours du chargement de la page, survenue dans la requête 3');
                });

            });
        }
        fillinventory();

        function inventaire_magasin(id_stock, num_mag) { // fonction qui initialise et coordonne toutes les opérations sur mes jsGrid

            var num_magasin = num_mag;
            var magasin = "#produits_expired";
            var route = "/getprodexpire/";
            var pager = "#externalPagermag1hema";


            $(function() {
                var index_ = null;

                $(magasin).jsGrid({
                    height: "400px",
                    width: "98%",
                    filtering: true,
                    heading: true,
                    editing: true,
                    inserting: false,
                    sorting: true,
                    selecting: true,
                    invalidMessage: "La donnée entrée est invalide !",
                    paging: true,
                    autoload: true,
                    noDataContent: "Il y a aucun produit expiré pour le moment.",
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

                    controller: {
                        loadData: function(filter) {
                            var deferred = $.Deferred();
                            $.ajax({
                                url: base + route + id_stock,
                                type: "GET",
                                data: filter,
                                dataType: "json",
                                success: function(response) {},
                                error: function(error, jqXHR, textStatus) {
                                    console.error("Error :" + error);
                                }

                            }).done(function(d) {

                                deferred.resolve(d);
                            });

                            return deferred.promise();
                            $(magasin).jsGrid("loadData");
                        }

                    },

                    fields: [{
                            name: "id_prod",
                            type: "text",
                            css: "text-secondary",
                            headercss: "text-secondary",
                            autosearch: true,
                            sorter: "number",
                            editing: false,
                            width: 40,
                            title: "Id"
                        },
                        {
                            name: "designation",
                            autosearch: true,
                            sorter: "string",
                            headercss: "text-secondary",
                            type: "text",
                            editing: false,
                            title: "Produit",
                            width: 100
                        },

                        {
                            name: "dateExp",
                            autosearch: true,
                            headercss: "text-secondary",
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
                            headercss: "text-secondary",
                            sorter: "number",
                            type: "text",
                            title: 'Quantité',
                            editing: false,
                            width: 100
                        },

                        {
                            name: "",
                            type: "control",
                            deleteButton: true,
                            filtering: true,
                            headercss: "text-danger",
                            clearFilterButton: true,
                            editButton: false,
                            searchButtonTooltip: "Faire une recherche",
                            clearFilterButtonTooltip: "Effacer le filtre",
                            modeSwitchButton: true,
                            editButtonTooltip: "Insérer la quantité du produit à retirer",
                            align: "center",
                            title: "Action",
                            width: 50

                        },
                    ],
                });

            });

        }

        inventaire_magasin(<?= $id_stock ?>, '<?= $num_magasin ?>');
    </script>
</body>

</html>