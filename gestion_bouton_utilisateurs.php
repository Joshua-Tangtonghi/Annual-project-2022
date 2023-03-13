<?php
include ('lib/database.php');
if (isset($_POST['Supp'])) {
    $id = ($_POST['Supp']);
    $q = "DELETE FROM utilisateur WHERE id_GES='$id' ";
    $req = $db->prepare($q);
    $req->execute();
    if ($req) {
        header('location: admin_utilisateurs.php?message=Compte supprimé');
        exit;
    }else{
        header('location:admin_utilisateurs.php?message=Erreur lors de la création du compte.');
    }
}
if (isset($_POST['Modif'])) {
    if( !isset($_POST['email']) || empty($_POST['email']) ||
        !isset($_POST['nom']) || empty($_POST['nom']) ||
        !isset($_POST['prenom']) || empty($_POST['prenom']) ||
        !isset($_POST['promotion']) || empty($_POST['promotion']) ||  !isset($_POST['admin'])) {
        header('location:admin_utilisateurs.php?message=Veuillez remplir tous les champs.');
        exit;
    }

    if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        header('location:admin_utilisateurs.php?message=Email invalide.&type=danger');
        exit;
    }

    $email = htmlspecialchars($_POST['email']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $promotion = htmlspecialchars($_POST['promotion']);
    $admin =htmlspecialchars($_POST['admin']);
    $idm = ($_POST['Modif']);


    $q = "UPDATE utilisateur SET prenom=:prenom,nom=:nom,email=:email,promotion=:promotion,admin=:admin WHERE id_GES='$idm' ";
    $req = $db->prepare($q);
    $req->execute( [
        'prenom'=>$prenom,
        'nom'=>$nom,
        'email'=>$email,
        'promotion'=>$promotion,
        'admin'=>$admin

    ]);
    if ($req) {
        header('location: admin_utilisateurs.php?message=Compte modifié');
        exit;
    }else{
        header('location:admin_utilisateurs.php?message=Erreur lors de la modification du compte.');
    }
}