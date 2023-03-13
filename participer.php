<?php
session_start();
require('lib/database.php');

$q = "SELECT id_GES FROM REJOINT WHERE id_evenement = :id_evenement";
$req = $db->prepare($q);
$req->execute([
	'id_evenement' => $_POST['id_evenement']
]);

while($resultat = $req->fetch()){
  if($resultat['email'] == $_SESSION['email']){
  	header('location: event.php?message=Vous participez déjà à cet evenement.&type=danger');
  	exit;
  }
}
$q = "SELECT nombre_places FROM EVENEMENT WHERE id_evenement = :id_evenement";
$req = $db->prepare($q);
$req->execute([
	'id_evenement' => $_POST['id_evenement']
]);

$resultat = $req->fetch();
$q = "SELECT COUNT(id_GES)AS nb FROM REJOINT WHERE id_evenement = :id_evenement";
$req2 = $db->prepare($q);
$req2->execute([
	'id_evenement' => $_POST['id_evenement']
]);

$resultat2 = $req2->fetch();
if($resultat2['nb'] == $resultat['nombre_places']){
	header('location: event.php?message=Cet evenement est complet.&type=danger');
	exit;
}

$q = "INSERT INTO REJOINT (id_evenement, id_GES) VALUES (:id_evenement, :id_GES)";
$req = $db->prepare($q);
$reponse = $req->execute([
  'id_evenement' => $_POST['id_evenement'],
  'id_GES' => $_POST['id_GES'],
  'email' => $_SESSION['email']
]);

if ($reponse) {
	header('location: event.php?message=Vous avez rejoint l\'evenement.&type=success');
	exit;
}else{
	header('location: event.php?message=Echec vous n\'avez pas pu rejoindre l\'evenement.&type=danger');
	exit;
}
?>
