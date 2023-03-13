<?php
session_start();
ini_set("display_errors", 1);
require('lib/database.php');

$q = "SELECT nom_association, axe, description, id_association FROM association";
if(isset($_GET['value'])) {
  $q .= "WHERE nom_association LIKE %" . $_GET['value'] ."%";
}
$req = $db->prepare($q);
$req->execute();

$res = $req->fetchAll();
if($res){
echo '<tr>';
  echo '<th>Nom de l\'association</th>';
  echo '<th>Axe</th>';
  echo '<th>Description</th>';
  if ($_SESSION['admin'] == 1) {
    echo '<th>Supprimer</th>';
  }

echo '</tr>';
foreach ($res as $key => $value) {
  $rejoint = 0;
  $req = $db->prepare('SELECT email FROM UTILISATEURS WHERE email = :email') ;
  $req->execute(['email' => $value['email']]) ;
  $utilisateurs = $req->fetch();
  echo '<tr>';
  echo '<td>' . $value['nom_association'] . '</td>';
  echo '<td>' . $value['axe'] . '</td>';
  echo '<td>' . $value['description'] . '</td>';

    $req2 = $db->prepare('SELECT email FROM INSCRIT WHERE id_association = :id_association') ;
    $req2 ->execute(['id_association' => $value['id_association']]);
    while ($inscrit = $req2->fetch()) {
      if ($inscrit['email'] == $_SESSION['email']) {
        $rejoint = 1;
      }
    }
    if ($rejoint == 0) {
      echo '<td>' . '<form action="rejoindre.php" method="post">' . '<input type="hidden" name="id_association" value="' . $value['id_association'] . '">' . '<input class="btn btn-primary" type="submit" value="Rejoindre">' . '</form>' . '</td>';
    }
  }
}else{
 echo "Aucun rÃ©sultat.";
}