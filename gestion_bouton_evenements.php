<?php

include 'lib/database.php';
if (isset($_POST['Supp'])) {
    $id = ($_POST['Supp']);
    $q = "DELETE FROM evenement WHERE Id_evenement='$id' ";
    $req = $db->prepare($q);
    $req->execute();
    if ($req) {
        header('location:evenements_admin.php?message=Evenement supprimé');
        exit;
    } else {
        header('location:evenements_admin.php?message=Erreur lors de la création du compte.');
    }
}
if (isset($_POST['Modif'])) {

    if(!isset($_POST['nom_event']) || empty($_POST['nom_event']) ||
        !isset($_POST['date_debut_event']) || empty($_POST['date_debut_event']) ||
        !isset($_POST['heure_debut_event']) || empty($_POST['heure_debut_event']) ||
        !isset($_POST['date_fin_event']) || empty($_POST['date_fin_event']) ||
        !isset($_POST['heure_fin_event']) || empty($_POST['heure_fin_event']) ||
        !isset($_POST['nombre_places']) || empty($_POST['nombre_places']) ||
        !isset($_POST['point_open_dispo']) || empty($_POST['point_open_dispo']) ||
        !isset($_POST['lieu']) || empty($_POST['lieu']) ||
        !isset($_POST['description']) || empty($_POST['description']) ||
        !isset($_POST['id_association']) || empty($_POST['id_association'])) {
        header('location:evenements_admin.php?message=Veuillez remplir tous les champs.');
        exit;
    }



    $nom_event = htmlspecialchars($_POST['nom_event']);
    $heure_debut_event = $_POST['heure_debut_event'];
    $date_debut_event =$_POST['date_debut_event'];
    $heure_fin_event = $_POST['heure_fin_event'];
    $date_fin_event =$_POST['date_fin_event'];
    $nombre_places=htmlspecialchars($_POST['nombre_places']);
    $point_open_dispo=htmlspecialchars($_POST['point_open_dispo']);
    $lieu=htmlspecialchars($_POST['lieu']);
    $description=htmlspecialchars($_POST['description']);
    $id_association=htmlspecialchars($_POST['id_association']);
    $idm = ($_POST['Modif']);


    $q = "UPDATE evenement  SET nom_event=:nom_event,heure_debut_event=:heure_debut_event,date_debut_event=:date_debut_event,heure_fin_event=:heure_fin_event,date_fin_event=:date_fin_event,nombre_places=:nombre_places,point_open_dispo=:point_open_dispo,lieu=:lieu,description=:description,id_association=:id_association WHERE Id_evenement='$idm' ";
    $req = $db->prepare($q);
    $req->execute([
        'nom_event' => $nom_event,
        'heure_debut_event' => $heure_debut_event,
        'date_debut_event' => $date_debut_event,
        'heure_fin_event' => $heure_fin_event,
        'date_fin_event' => $date_fin_event,
        'nombre_places'=>  $nombre_places,
        'point_open_dispo' => $point_open_dispo,
        'lieu'=> $lieu,
        'description'=> $description,
        'id_association'=> $id_association
    ]);
    if ($req) {
        header('location:evenements_admin.php?message=Evenement modifié');
        exit;
    } else {
        header('location:evenements_admin.php?message=Erreur lors de la modif de l\'evenement.');
    }
}