<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once ('lib/database.php');
function writeLogLine($success, $email)
{

	$log = fopen('log.txt', 'a+');
	$value = $success ? 'réussie' : 'échouée';
	$line = date('Y-m-d H:i:s') . ' - Tentative de connexion' . $value . 'de ' . $email. "\n";
	fputs($log, $line);
	fclose($log);


}



if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + (24 * 60 * 60) );
}


if( !isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['mot_de_passe']) || empty($_POST['mot_de_passe']) ){
	header('location: connexion.php?message=Remplir les deux champs.&type=danger');
	
	exit;
}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: connexion.php?message=Email invalide.');
	exit;
}

$q ='SELECT id_GES FROM utilisateur WHERE email = :email AND verif_email=0';
$req = $db->prepare($q);
$req->execute([
    'email' => $_POST['email'],
]);

$reponse = $req->fetchAll();


if ($reponse){
    header('location:connexion.php?message=Verifier votre email.');
    exit;
}
$q ='SELECT id_GES FROM utilisateur WHERE email = :email AND mot_de_passe = :mot_de_passe';
$req = $db->prepare($q);
$req->execute([
	'email' => $_POST['email'],
	'mot_de_passe' => hash('sha512',$_POST['mot_de_passe'])
]);

$reponse = $req->fetchAll();


if (count($reponse) == 0){
	writeLogLine(false, $_POST['email']);
	header('location:connexion.php?message=Identifiants incorrects.');
	exit;
}else{
	session_start();
	writeLogLine(true, $_POST['email']);
	$_SESSION['email'] = $_POST['email'];
	header('location:index.php?message=compte connecté.');
	exit;
}

?>
