<?php
require_once ('lib/database.php');

 if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
  $statement = $db->query('SELECT admin FROM utilisateur WHERE email ="'.$_SESSION['email'].'"');
  $reponse = $statement->fetch(PDO::FETCH_ASSOC);
}

?>
