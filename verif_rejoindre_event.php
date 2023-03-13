<?php

require('lib/database.php');
$id_GES1=$_POST['id_GES1'];
$Id_evenement=$_POST['Id_evenement'];

$q = "SELECT * FROM rejoint WHERE Id_evenement = '$Id_evenement' and id_GES = '$id_GES1' ";
$req = $db->prepare($q);
$req->execute([
]);

$resultat = $req->fetch();
if($resultat){
    header('location: event.php?message=Vous participez deja a cet evenement.&type=danger');
    exit;
}

$q = "INSERT INTO rejoint  (id_GES, Id_evenement) VALUES (:id_GES, :Id_evenement)";
$req = $db->prepare($q);
$reponse = $req->execute([
    'id_GES' => $id_GES1,
    'Id_evenement' =>$Id_evenement,
]);

if($reponse){
    header('location:profil.php?message=Vous avez rejoints l\'association.&type=success');
    exit;
}else{
    header('location:event.php?message=Erreur.');
}

?>

