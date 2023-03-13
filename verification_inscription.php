<?php


include('PHPMailer/mail.php');


require_once ('lib/database.php');


function writeLogLine($success, $email)
{
    
    $log = fopen('log.txt', 'a+');
    $value = $success ? ' réussie ' : ' échouée ';
    $line = date('Y-m-d H:i:s') . ' - Tentative de connexion' . $value . 'de ' . $email  ."\n";
    fputs($log, $line);
    fclose($log);


}


if (isset($_POST['email']) && !empty($_POST['email'])) {
    setcookie('email', $_POST['email'], time() + 24 * 60 * 60);
}


if( !isset($_POST['email']) || empty($_POST['email']) ||
    !isset($_POST['nom']) || empty($_POST['nom']) ||
    !isset($_POST['prenom']) || empty($_POST['prenom']) ||
    !isset($_POST['promotion']) || empty($_POST['promotion']) ||
    !isset($_POST['mot_de_passe']) || empty($_POST['mot_de_passe']) ||
    !isset($_POST['cmot_de_passe']) || empty($_POST['cmot_de_passe']) || !isset($_POST['checkbox'])) {
    header('location: inscription.php?message=Veuillez remplir tous les champs.');
    exit;
}

if(strlen($_POST['mot_de_passe']) < 6 || strlen($_POST['mot_de_passe']) > 12){
    header('location: inscription.php?message=Le mot de passe doit faire entre 6 et 12 caractères.');
    exit;
}
$mot_de_passe=$_POST['mot_de_passe'];
$cmot_de_passe=$_POST['cmot_de_passe'];
if ($mot_de_passe==$cmot_de_passe) {
} else {
    header('location: inscription.php?message=Vos mot de passe ne correspondent pas.&type=danger');
    exit;
}

if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
    header('location: inscription.php?message=Email invalide.&type=danger');
    exit;
}


$email = htmlspecialchars($_POST['email']);
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$promotion = htmlspecialchars($_POST['promotion']);

$destinataire = $email;
sendmail($destinataire);


$q = "SELECT id_GES FROM utilisateur WHERE email = :email";
$req = $db->prepare($q);
$req->execute([
    'email' => $_POST['email']
]);

$resultat = $req->fetch();
if($resultat){
    header('location: inscription.php?message=Email déjà utilisé.&type=danger');
    exit;
}


$q = "INSERT INTO utilisateur (email, mot_de_passe, nom,prenom,promotion, admin,verif_email) VALUES (:email, :mot_de_passe, :nom,:prenom,:promotion ,:admin,:verif_email)";
$req = $db->prepare($q);
$reponse = $req->execute([
    'email' => $email,
    'mot_de_passe' => hash('sha512', $mot_de_passe),
    'nom' => $nom,
    'prenom'=>$prenom,
    'promotion'=>$promotion,
    'admin' => 0,
    'verif_email' => 0


]);

if($reponse){
    session_start();
    writeLogLine(true, $_POST['email']);
    $_SESSION['email'] = $_POST['email'];
    header('location:redirection.php?message=Vérifiez_votre_boîte_mail.');
    exit;
}else{
    writeLogLine(false, $_POST['email']);
    header('location:inscription.php?message=Erreur_lors_de_la_création_du_compte.');
}

?>