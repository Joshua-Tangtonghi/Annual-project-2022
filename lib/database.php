<?php

try {
    $db = new PDO('mysql:host=localhost:3306;dbname=db', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    echo 'Impossible de se connecterà la base de donnée';
    echo $e->getMessage();
    die();
}
