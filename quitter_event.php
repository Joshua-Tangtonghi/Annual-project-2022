<?php


require('lib/database.php');
$id_GES1=$_POST['id_GES1'];
$Id_evenement=$_POST['Id_evenement'];


$q = "DELETE FROM rejoint WHERE id_GES = '$id_GES1' AND Id_evenement = '$Id_evenement'";
$req = $db->prepare($q);
$reponse = $req->execute([

]);

if($reponse){

	header('location: profil.php?message=Vous avez quitté l\'evenement.&type=success');
	exit;
}else{
	header('location: profil.php?message=Echec, vous n\'avez pas quitté l\'evenement.&type=danger');
	exit;
}

?>
