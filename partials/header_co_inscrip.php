<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/connexion.css">
    <meta name="supersmash" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/responsive.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/logo.png">

</head>

<body class="light">

<header>


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
                    <a class="navbar-item bold" href="assoc.php">Axe Associations</a>
                    <a class="navbar-item bold" href="planning.php">Planning</a>
                    <a class="navbar-item bold" href="event.php">Événements</a>

                </div>

            </div>

        </div>
    </div>



</header>