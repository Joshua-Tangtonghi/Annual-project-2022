<?php require_once ('lib/database.php'); ?>
 <?php

if(isset($_SESSION['email'])){
   $q = 'SELECT admin FROM utilisateur WHERE email = "' . $_SESSION['email'] . '"';
   $select = $db->query($q);
   $select->execute([
       'email'=> $_SESSION['email']
   ]);
   $search = $select->fetchAll();
   $admin = $search[0]['admin'];
}

?>
