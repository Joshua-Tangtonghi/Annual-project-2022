<?php
session_start();
require('lib/database.php');
if (isset($_POST['Plus'])) {
	$id = ($_POST['Plus']);
	$q = $db->prepare("SELECT point_open FROM utilisateur WHERE id_GES = '$id' ");
	$q->execute([
	]);
	$inscrit = $q->fetch();

	$value=$inscrit['point_open']+1;

	$q = $db->prepare("UPDATE utilisateur SET point_open = :point_open where id_GES= '$id' ");
	$q->execute([
		'point_open'=>$value
	]);

	if ($q) {
		header('location: mon_asso.php?message=Réussi.&type=success');
		exit;
	} else {
		header('location: mon_asso.php?message=Echec.&type=danger');
		exit;
	}
}

if (isset($_POST['Moins'])) {
	$id = ($_POST['Moins']);
	$q = $db->prepare("SELECT point_open FROM utilisateur WHERE id_GES = '$id' ");
	$q->execute([
	]);
	$inscrit = $q->fetch();

	$value=$inscrit['point_open']-1;

	$q = $db->prepare("UPDATE utilisateur SET point_open = :point_open where id_GES= '$id' ");
	$q->execute([
		'point_open'=>$value
	]);

	if ($q) {
		header('location: mon_asso.php?message=Réussi.&type=success');
		exit;
	} else {
		header('location: mon_asso.php?message=Echec.&type=danger');
		exit;
	}
}
?>
