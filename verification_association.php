<?php

require_once ('lib/database.php');

if(!isset($_POST['nom']) || empty($_POST['nom']) ||
	!isset($_POST['description']) || empty($_POST['description']) ||
	!isset($_POST['point_max']) || empty($_POST['point_max']) ||
	!isset($_POST['type']) || empty($_POST['type']) || !isset($_POST['heures']) || empty($_POST['heures']) || !isset($_POST['dates']) || empty($_POST['dates']) ) {
	header('location:aso-admin.php?message=Veuillez remplir tous les champs.');
	exit;
}

if ($_POST['point_max'] < 0) {
  header('location: aso-admin.php?message=Le nombre de points open est inférieur à 0.&type=danger');
  exit;
}



$q = "SELECT nom FROM association WHERE nom = :nom";
$req = $db->prepare($q);
$req->execute([
	'nom' => $_POST['nom']
]);
$resultat = $req->fetch();
if($resultat){
	header('location: aso-admin.php?message=Ce nom d\'association est déjà uilisé.&type=danger');
	exit;
}


$q = "INSERT INTO association (nom, axe, description, point_max,heures,dates) VALUES (:nom, :axe, :description, :point_max,:heures,:dates)";
$req = $db->prepare($q);
$reponse = $req->execute([
  'nom' => $_POST['nom'],
  'axe' => $_POST['type'],
  'description' => $_POST['description'],
  'point_max' => $_POST['point_max'],
	'heures' => $_POST['heures'],
	'dates' => $_POST['dates']
]);

if ($reponse) {
	header('location: aso-admin.php?message=Association créé avec succès.&type=success');
	exit;
}else{
	header('location: aso-admin.php?message=Echec lors de la création de l\'association.&type=danger');
	exit;
}
?>
