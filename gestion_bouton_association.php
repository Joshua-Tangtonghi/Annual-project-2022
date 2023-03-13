<?php

include ('lib/database.php');
if (isset($_POST['Supp'])) {
    $id = ($_POST['Supp']);
    $q = "DELETE FROM association WHERE Id_association='$id' ";
    $req = $db->prepare($q);
    $req->execute();
    if ($req) {
        header('location: aso-admin.php?message=Compte supprimé');
        exit;
    } else {
        header('location:aso-admin.php?message=Erreur lors de la création du compte.');
    }
}
if (isset($_POST['Modif'])) {

    if(!isset($_POST['nom']) || empty($_POST['nom']) ||
        !isset($_POST['axe']) || empty($_POST['axe']) ||
        !isset($_POST['description']) || empty($_POST['description']) ||
        !isset($_POST['point_max']) || empty($_POST['point_max'])) {
        header('location:aso-admin.php?message=Veuillez remplir tous les champs.');
        exit;
    }


    $axe = htmlspecialchars($_POST['axe']);
    $nom = htmlspecialchars($_POST['nom']);
    $description = htmlspecialchars($_POST['description']);
    $point_max = $_POST['point_max'];
    $heures = $_POST['heures'];
    $dates =$_POST['dates'];
    $idm = ($_POST['Modif']);


    $q = "UPDATE association SET nom=:nom,axe =:axe ,description=:description,point_max=:point_max,dates=:dates,heures=:heures WHERE Id_association='$idm' ";
    $req = $db->prepare($q);
    $req->execute([
        'nom' => $nom,
        'axe' => $axe,
        'description' => $description,
        'point_max' => $point_max,
        'dates' => $dates,
        'heures' => $heures


    ]);
    if ($req) {
        header('location: aso-admin.php?message=Association modifié');
        exit;
    } else {
        header('location:aso-admin.php?message=Erreur lors de la modification de l\'association.');
    }
}