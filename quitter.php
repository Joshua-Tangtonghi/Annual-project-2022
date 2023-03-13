<?php

require('lib/database.php');
$id_GES1=$_POST['id_GES1'];
$Id_association=$_POST['Id_association'];


$q = "DELETE FROM inscrit WHERE id_GES = '$id_GES1' AND Id_association = '$Id_association'";
$req = $db->prepare($q);
$reponse = $req->execute([

]);

if($reponse){

	header('location: profil.php?message=Vous avez quitté l\'association.&type=success');
	exit;
}else{
	header('location: profil.php?message=Echec, vous n\'avez pas quitté l\'association.&type=danger');
	exit;
}

?>
