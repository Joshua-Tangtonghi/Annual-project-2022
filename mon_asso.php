




<?php include('partials/header.php') ?>
<?php
if (isset($_GET['order']))
    $order = $_GET['order'];
else
    $order = "Id_association";
$select = $db->query("SELECT * FROM association ORDER by $order");

function theadFill($order, $value, $disp)
{
    if ($order == $value)
        echo '<th><a href="?order=' . $value . ' DESC">' . $disp . '</a></th>';
    else
        echo '<th><a href="?order=' . $value . '">' . $disp . '</a></th>';
}
function theadFill1($order1, $value, $disp)
{
    if ($order1 == $value)
        echo '<th><a href="?order1=' . $value . ' DESC">' . $disp . '</a></th>';
    else
        echo '<th><a href="?order1=' . $value . '">' . $disp . '</a></th>';
}
if (isset($_GET['order1']))
    $order1 = $_GET['order1'];
else
    $order1 = "id_GES";
$select = $db->query("SELECT * FROM utilisateur ORDER by $order1");

?>

    <main>


      <div class="container">
        <div class="row col-12">
        <br><br><br><br><br><br>
        <h1>Mon Association</h1><br><br>
	      <div class="overflow-auto">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <form action="verification_modifier.php" method="post">
                  <thead>


                  <tr>

                      <?php

                      theadFill($order, 'nom', 'nom');
                      theadFill($order, 'axe', 'Axe');
                      theadFill($order, 'description', 'Description');

                      ?>


                      <th></th>
                  </tr>

                  </thead>



                  <?php

                  $q = $db->query('SELECT * FROM association WHERE email = "' . $_SESSION['email'] . '"');
                  while ($association = $q->fetch()) {
                      echo '<tr>';

                      echo '<td>' . $association['nom'] . '</td>';
                      echo '<td>' . $association['axe'] . '</td>';
                      echo '<td>' . $association['description'] . '</td>';
                      echo '<td><button type="submit" value="'.$association['Id_association'].'" name="Modif" class="btn btn-primary">Modifier</button>   </td>';
                      echo '</tr>';
                  }
                  ?>
                  <tr>
                      <td>
                          <h1 class="h3 mb-2 text-gray-800">Modifier</h1>
                      </td>
                      <td>
                          <input  name="nom" class="form-control" type="text" placeholder="nom" >
                      </td>
                      <td>
                        
                          <select class="form-control" type="text" name="axe" placeholder="Axe">
                              <option>Entreprise</option>
                              <option>Esprit d'équipe</option>
                              <option>Challenge</option>
                              <option>Communication</option>
                          </select>
                      </td>
                      <td>
                          <input  name="description" class="form-control" type="text"  placeholder="Description">
                      </td>


                  </tr>
              </form>
                  </tbody>

              </table>
	       </div>
        </div>
          <div class="row col-12">
              <br><br><br><br><br><br>
              <h1 >Liste des Evenements</h1><br><br>
              <div class="overflow-auto">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>


                      <tr>

                          <?php



                          theadFill($order, 'nom_event', 'Nom');
                          theadFill($order, 'date_debut_event', 'date debut');
                          theadFill($order, 'heure_debut_event', 'heure debut');
                          theadFill($order, 'date_fin_event', 'date fin');
                          theadFill($order, 'heure_fin_event', 'heure fin');
                          theadFill($order, 'nombre_places', 'nombre places ');
                          theadFill($order, 'point_open_dispo', 'point open dispo');
                          theadFill($order, 'lieu', 'lieu');
                          theadFill($order, 'description', 'description');

                          ?>





                      </tr>

                      </thead>



                      <?php
                      $req = $db->query('SELECT * FROM evenement where Id_association=(select Id_association from association where email = "' . $_SESSION['email'] . '")');

                      while ($content = $req->fetch()) {
                          echo '<tr>';
                          echo '<td>' . $content['nom_event'] . '</td>';
                          echo '<td>' . $content['date_debut_event'] . '</td>';
                          echo '<td>' . $content['heure_debut_event'] . '</td>';
                          echo '<td>' . $content['date_fin_event'] . '</td>';
                          echo '<td>' . $content['heure_fin_event'] . '</td>';
                          echo '<td>' . $content['nombre_places'] . '</td>';
                          echo '<td>' . $content['point_open_dispo'] . '</td>';
                          echo '<td>' . $content['lieu'] . '</td>';
                          echo '<td>' . $content['description'] . '</td>';

                          echo '</tr>';
                      }
                      ?>

                      </tbody>

                  </table>
              </div>
          </div>

          <div class="row col-12">
              <br><br><br><br><br><br>
              <h1 >Liste des membres</h1><br><br>
              <div class="overflow-auto">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>


                      <tr>

                          <?php


                          theadFill1($order1, 'id_GES', 'id');
                          theadFill1($order1, 'nom', 'Nom');
                          theadFill1($order1, 'prenom', 'Prénom');
                          theadFill1($order1, 'email', 'Email');
                          theadFill1($order1, 'promotion', 'Promotion');
                          theadFill1($order1, 'point_open', 'Point Open');

                          ?>


                          <th></th>
                      </tr>

                      </thead>



                      <?php
                      $req = $db->query('SELECT * FROM inscrit ,utilisateur where Id_association=(select Id_association from association where email = "' . $_SESSION['email'] . '") and inscrit.id_GES = utilisateur.id_GES ');

                      while ($utilisateurs = $req->fetch()) {
                      echo '<tr>';
                      echo '<td>' . $utilisateurs['id_GES'] . '</td>';
                      echo '<td>' . $utilisateurs['nom'] . '</td>';
                      echo '<td>' . $utilisateurs['prenom'] . '</td>';
                      echo '<td>' . $utilisateurs['promotion'] . '</td>';
                      echo '<td>' . $utilisateurs['email'] . '</td>';
                      echo '<td>' . $utilisateurs['point_open'] .'</td>';
                      echo '<td> <form action="open_bouton.php" method="post">

 <button class="btn btn-success" type="submit" name="Plus" value="' . $utilisateurs['id_GES'] . '">+</button>
 <button class="btn btn-danger" type="btn btn-danger" name="Moins" type="submit" value="' . $utilisateurs['id_GES'] . '">-</button></form>
</td>';



                      echo '</tr>';
                      }
                      ?>

                      </tbody>

                  </table>
              </div>
          </div>



          <div class="formulaire row col-12">
              <form enctype="multipart/form-data" action="verification_evenement_asso.php" method="post">
                  <h1>Nouvelle evenements</h1>
                  <div class="mb-4">
                      <label>Nom de l'evenements</label>
                      <input class="form-control" type="text" name="nom_event"  required>
                  </div>
                  <div class="mb-4">
                      <label>Dates debut</label>
                      <input class="form-control" type="date" name="date_debut_event" required>
                  </div>
                  <div class="mb-4">
                      <label>Heures debut</label>
                      <input class="form-control" type="time" name="heure_debut_event"  required>
                  </div>
                  <div class="mb-4">
                      <label>Dates</label>
                      <input class="form-control" type="date" name="date_fin_event"  required>
                  </div>
                  <div class="mb-4">
                      <label>Heures</label>
                      <input class="form-control" type="time" name="heure_fin_event"  required>
                  </div>
                  <div class="mb-4">
                      <label>Nombre de places</label>
                      <input class="form-control" type="number" name="nombre_places" required>
                  </div>
                  <div class="mb-4">
                      <label>Point open dispo</label>
                      <input class="form-control" type="number" name="point_open_dispo" required>
                  </div>
                  <div class="mb-4">
                      <label>Lieu</label>
                      <input class="form-control" type="text" name="lieu"  required>
                  </div>
                  <div class="mb-4">
                      <label>Desription</label>
                      <input class="form-control" type="text" name="description"  required>
                  </div>

                      <?php

                      $q = $db->query('SELECT * FROM association WHERE email = "' . $_SESSION['email'] . '"');
                      while ($association = $q->fetch()) {

                          echo '<input type="hidden" name="Id_association" value="'.$association['Id_association'].'" >'.' <button type="submit"   class="btn btn-primary">Créer</button>';
                      }
                      ?>





              </form>
          </div>
      </div>
    </main>
    <?php include('partials/footer.php') ?>
