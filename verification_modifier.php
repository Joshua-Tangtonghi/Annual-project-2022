<?php
include ('lib/database.php');

if (isset($_POST['nom']) && !empty($_POST['nom'])) {
    $q = "SELECT Id_association FROM ASSOCIATION WHERE nom = :nom";
    $req = $db->prepare($q);
    $req->execute([
        'nom' => $_POST['nom']
    ]);
    $result = $req->fetch();
    if ($result) {
        header('location: modifier.php?message=Ce nom d\'association est déjà uilisé.&type=danger');
        exit;
    }
}
    if(!isset($_POST['nom']) || empty($_POST['nom']) ||
        !isset($_POST['axe']) || empty($_POST['axe']) ||
        !isset($_POST['description']) || empty($_POST['description']) ) {
        header('location:mon_asso.php?message=Veuillez remplir tous les champs.');
        exit;
    }

    $nom = htmlspecialchars($_POST['nom']);
    $axe = htmlspecialchars($_POST['axe']);
    $description = htmlspecialchars($_POST['description']);

    $idm = ($_POST['Modif']);


    $q = "UPDATE association SET nom=:nom,axe=:axe,description=:description WHERE Id_association='$idm' ";
    $req = $db->prepare($q);
    $req->execute( [
        'nom'=>$nom,
        'axe'=>$axe ,
        'description'=>$description


    ]);
    if ($req) {
        header('location:mon_asso.php?message=Association modifié');
        exit;
    }else{
        header('location:admin_utilisateurs.php?message=Erreur lors de la modification de l\'association.');
    }
