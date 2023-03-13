<?php
session_start();
require('lib/database.php');

$q = $db->prepare("SELECT point_open FROM INSCRIT WHERE id_GES = :id_GES AND id_association = :id_association");
$q->execute([
	'id_GES' => $_POST['id_GES'],
	'id_association' => $_POST['id_association']
]);
$inscrit = $q->fetch();

if($inscrit['point_open'] == 0){
	header('location: mon_asso.php?message=Erreur, cet utilisateur n\'a pas de points open.&type=danger');
	exit;
}

$value = $inscrit['point_open'] -1;

$q = $db->prepare('UPDATE INSCRIT SET point_open = :point_open WHERE id_GES = :id_GES AND id_association = :id_association');
$q->execute([
  	'id_GES' => $_POST['id_GES'],
	'id_association' => $_POST['id_association'],
  	'point_open' => $value
]);

if ($q) {
	header('location: mon_asso.php?message=Réussi.&type=success');
	exit;
}else{
	header('location: mon_asso.php?message=Echec.&type=danger');
	exit;
}
?>
