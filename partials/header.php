<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Openges</title>
    <meta name="supersmash" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/responsive.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/logo.png">
</head>
<?php   require_once ('lib/database.php');
        include ('gestion_droit.php');
?>
<body class="light">

<header>
    <div class="toggle">
        <p class=" bold">Dark mode</p>
        <div class="dark-mode-switch">
            <div class="dark-mode-switch-ident"></div>
        </div>
    </div>

    <div class="cont">
        <div class="container">

            <div class="header-container header">

                <a class="navbar-brand logo" href="index.php">
                    <img class="logo" src="assets/images/logo.png"/> </a>

                             <?php

            if(isset($_SESSION['email'])){
                if($admin==1){
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="admin_dashboard.php">Dashboard</a></div>';
                }
                if($admin==0){
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="profil.php">Profil</a></div>';
                }
                if($admin==2){
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="mon_asso.php">Mon Asso</a></div>';
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="profil.php">Profil</a></div>';
                }
                if($admin==3){
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="platon.php">Page validation assos</a></div>';
                }
                if($admin==4){
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="platon.php">Page validation assos</a></div>';
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="admin_dashboard.php">Dashboard</a></div>';
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="mon_asso.php">Mon Asso</a></div>';
                    echo '     <div class="header-right">   <a class="navbar-item bold" href="profil.php">Profil</a></div>';
                }
                echo '<a href="deconnexion.php">
                    <button class="header-btn bold"> DECONNEXION </button>
                </a>';
            }

            else{

                echo '<a href="connexion.php">
                    <button class="header-btn bold"> CONNEXION </button>
                </a>';
            } ?>



                <div class="header-right">
                    <a class="navbar-item bold" href="assos.php">Associations</a>
                    <a class="navbar-item bold" href="planning.php">Planning</a>
                    <a class="navbar-item bold" href="event.php">Événements</a>

                </div>

            </div>

        </div>
    </div>

</header>