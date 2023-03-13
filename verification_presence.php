<?php

require_once 'lib/database.php';

if ( !isset($_POST['nom_association']) || empty($_POST['nom_association']) ||
    !isset($_POST['nom']) || empty($_POST['nom']) ||
    !isset($_POST['prenom']) || empty($_POST['prenom']) ||
    !isset($_POST['promotion']) || empty($_POST['promotion']) ) {
    header('location: inscription.php?message=Veuillez remplir tous les champs.');
    exit;
}

$nom_association = htmlspecialchars($_POST['nom_association']);
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$promotion = htmlspecialchars($_POST['promotion']);
$date = htmlspecialchars($_POST['date']);

$q = "INSERT INTO presence (nom_association, nom, prenom, promotion, date, presence) VALUES (:nom_association, :nom, :prenom, :promotion, :date, :presence)";
$req = $db->prepare($q);
$reponse = $req->execute([
    'nom_association' => $nom_association,
    'nom' => $nom,
    'prenom'=>$prenom,
    'promotion'=>$promotion,
    'date'=>$date,
    'presence' => 1
]);

if($reponse){
    header('location:index.php?message=Ok.');
    exit;
}else{
    header('location:presence.php?message=Not ok.');
}

?>