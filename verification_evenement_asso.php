<?php

require_once 'lib/database.php';

if(!isset($_POST['nom_event']) || empty($_POST['nom_event']) ||
    !isset($_POST['date_debut_event']) || empty($_POST['date_debut_event']) ||
    !isset($_POST['heure_debut_event']) || empty($_POST['heure_debut_event']) ||
    !isset($_POST['date_fin_event']) || empty($_POST['date_fin_event']) || !isset($_POST['nombre_places']) || empty($_POST['nombre_places']) || !isset($_POST['point_open_dispo']) || empty($_POST['point_open_dispo']) || !isset($_POST['lieu']) || empty($_POST['lieu']) || !isset($_POST['description']) || empty($_POST['description']) || !isset($_POST['heure_fin_event']) || empty($_POST['heure_fin_event'])) {
    header('location:mon_asso.php?message=Veuillez remplir tous les champs.');
    exit;
}

if ($_POST['point_open_dispo'] < 0) {
    header('location:mon_asso.php?message=Le nombre de points open est inférieur à 0.&type=danger');
    exit;
}

$date_debut = $_POST['date_debut_event'] . ' ' . $_POST['heure_debut_event'];
$date_fin = $_POST['date_fin_event'] . ' ' . $_POST['heure_fin_event'];
$date_actuelle = new DateTime("now");
$date_debut_event = new DateTime($date_debut);
$date_fin_event = new DateTime($date_fin);

if ( $date_debut_event < $date_actuelle) {
    header('location:mon_asso.php?message=Erreur dans la date de debut.&type=danger');
    exit;
}
if ( $date_fin_event < $date_debut_event) {
    header('location:mon_asso.php?message=Erreur dans les dates.&type=danger');
    exit;
}

$q = "SELECT nom_event FROM evenement WHERE nom_event = :nom_event";
$req = $db->prepare($q);
$req->execute([
    'nom_event' => $_POST['nom_event']
]);
$resultat = $req->fetch();
if($resultat){
    header('location:mon_asso.php?message=Ce nom d\'evenement est déjà uilisé.&type=danger');
    exit;
}


$q = "INSERT INTO evenement (nom_event,date_debut_event,heure_debut_event,date_fin_event,heure_fin_event,nombre_places,point_open_dispo,lieu,description,Id_association) VALUES (:nom_event,:date_debut_event,:heure_debut_event,:date_fin_event,:heure_fin_event,:nombre_places,:point_open_dispo,:lieu,:description,:Id_association)";
$req = $db->prepare($q);
$reponse = $req->execute([
    'nom_event' => $_POST['nom_event'],
    'date_debut_event' => $_POST['date_debut_event'],
    'heure_debut_event' => $_POST['heure_debut_event'],
    'date_fin_event' => $_POST['date_fin_event'],
    'heure_fin_event' => $_POST['heure_fin_event'],
    'nombre_places' => $_POST['nombre_places'],
    'point_open_dispo' => $_POST['point_open_dispo'],
    'lieu' => $_POST['lieu'],
    'description' => $_POST['description'],
    'Id_association' => $_POST['Id_association']



]);

if ($reponse) {
    header('location:mon_asso.php?message=Evenements créé avec succès.&type=success');
    exit;
}else{
    header('location:mon_asso.php?message=Echec lors de la creation de l\'evenement.&type=danger');
    exit;
}
?>
