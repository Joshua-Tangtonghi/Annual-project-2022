<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Une erreur est survenue ♥</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style2.css">
        
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/logo.png">
    </head>
    <body>
        
    </body>
</html>
<div class="container">
<?php

$status = $_SERVER['REDIRECT_STATUS'];
$codes = array(
        403 => array('403 Forbidden', 'Le serveur a refusé de répondre à votre demande.'),
        404 => array('404 Not Found', 'Le document/fichier demandé n\'a pas été trouvé sur ce serveur.'),
        405 => array('405 Method Not Allowed', 'La méthode spécifiée dans la ligne de demande n\'est pas autorisée pour la ressource spécifiée.'),
        408 => array('408 Request Timeout', 'Votre navigateur n\'a pas réussi à envoyer une requête dans le temps imparti par le serveur.'),
        500 => array('500 Internal Server Error', 'La demande n\'a pas abouti en raison d\'une condition inattendue rencontrée par le serveur.'),
        502 => array('502 Bad Gateway', 'Le serveur a reçu une réponse invalide du serveur en amont alors qu\'il tentait de répondre à la demande.'),
        504 => array('504 Gateway Timeout', 'Le serveur en amont n\'a pas réussi à envoyer une requête dans le temps imparti par le serveur.'),
);

$title = $codes[$status][0];
$message = $codes[$status][1];
if ($title == false || strlen($status) != 3) {
        $message = 'Please supply a valid status code.';
}

echo '<h1>'.$title.'</h1>
<p>'.$message.'</p>';

?>
<small><a href="index.php" target="_blank">Page d'accueil</a>
</div>