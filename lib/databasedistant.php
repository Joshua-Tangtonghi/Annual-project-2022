<?php
session_start();

define('HOST', '51.254.35.187');


define('USER', 'monUser');


define('PASSWD', 'myPasswd');


define('DBNAME', 'OPEN_GES');

try {
    $db = new PDO("mysql:host=". HOST .";dbname=". DBNAME, USER, PASSWD, [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,

        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",

        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);


}
catch (Exception $error) {

    echo 'Erreur lors de la connexion à la base de données : '. $error->getMessage();
}
?>