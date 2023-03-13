<?php

require('lib/database.php');
$id_GES1=$_POST['id_GES1'];
$Id_association=$_POST['Id_association'];

$q = "SELECT * FROM inscrit WHERE Id_association = '$Id_association' and id_GES = '$id_GES1' ";
$req = $db->prepare($q);
$req->execute([
]);

$resultat = $req->fetch();
if($resultat){
    header('location: assos.php?message=Vous participez deja a cet evenement.&type=danger');
    exit;
}

$q = "INSERT INTO inscrit  (id_GES, Id_association) VALUES (:id_GES, :Id_association)";
$req = $db->prepare($q);
$reponse = $req->execute([
    'id_GES' => $id_GES1,
    'Id_association' =>$Id_association,
]);

if($reponse){
    header('location:profil.php?message=Vous avez rejoints l\'association.&type=success');
    exit;
}else{
    header('location:assos.php?message=Erreur.');
}




?>

