<?php
include ('lib/database.php');

    if( !isset($_POST['email']) || empty($_POST['email']) ||
        !isset($_POST['nom']) || empty($_POST['nom']) ||
        !isset($_POST['prenom']) || empty($_POST['prenom']) ||
        !isset($_POST['promotion']) || empty($_POST['promotion'])  ) {
        header('location:profil.php?message=Veuillez remplir tous les champs.');
        exit;
    }
$q = "SELECT id_GES FROM utilisateur WHERE email = :email";
$req = $db->prepare($q);
$req->execute([
    'email' => $_POST['email']
]);

$resultat = $req->fetch();
if($resultat){
    header('location: profil.php?message=Email déjà utilisé.&type=danger');
    exit;
}
    if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        header('location:profil.php?message=Email invalide.&type=danger');
        exit;
    }

    $email = htmlspecialchars($_POST['email']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $promotion = htmlspecialchars($_POST['promotion']);

    $idm = ($_POST['Modif']);


    $q = "UPDATE utilisateur SET prenom=:prenom,nom=:nom,email=:email,promotion=:promotion WHERE id_GES='$idm' ";
    $req = $db->prepare($q);
    $req->execute( [
        'prenom'=>$prenom,
        'nom'=>$nom,
        'email'=>$email,
        'promotion'=>$promotion,


    ]);
    if ($req) {
        header('location: profil.php?message=Compte modifié');
        exit;
    }else{
        header('location:profil.php?message=Erreur lors de la modif du compte.');
    }
