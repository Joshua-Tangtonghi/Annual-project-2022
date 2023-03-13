
<?php

include ('lib/database.php'); ?>
<?php include ('partials/header_admin.php'); ?>
<?php
if (isset($_GET['order']))
    $order = $_GET['order'];
else
    $order = "Id_evenement";
$select = $db->query("SELECT * FROM evenement ORDER by $order");

function theadFill($order, $value, $disp)
{
    if ($order == $value)
        echo '<th><a href="?order=' . $value . ' DESC">' . $disp . '</a></th>';
    else
        echo '<th><a href="?order=' . $value . '">' . $disp . '</a></th>';
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Evenements</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form enctype="multipart/form-data"  method="post" action="gestion_bouton_evenements.php">
                        <thead>
                        <tr>
                            <?php
                            theadFill($order, 'Id_evenement', 'ID');
                            theadFill($order, 'nom_event', 'Nom');
                            theadFill($order, 'date_debut_event', 'date debut');
                            theadFill($order, 'heure_debut_event', 'heure debut');
                            theadFill($order, 'date_fin_event', 'date fin');
                            theadFill($order, 'heure_fin_event', 'heure fin');
                            theadFill($order, 'nombre_places', 'nombre places ');
                            theadFill($order, 'point_open_dispo', 'point open dispo');
                            theadFill($order, 'lieu', 'lieu');
                            theadFill($order, 'description', 'description');
                            theadFill($order, 'Id_association', 'Id association');
                            ?>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php

                        $select = $db->query("SELECT * FROM evenement ");
                        while ($content = $select->fetch()) {
                            echo '<tr>';
                            echo '<td>' . $content['Id_evenement'] . '</td>';
                            echo '<td>' . $content['nom_event'] . '</td>';
                            echo '<td>' . $content['date_debut_event'] . '</td>';
                            echo '<td>' . $content['heure_debut_event'] . '</td>';
                            echo '<td>' . $content['date_fin_event'] . '</td>';
                            echo '<td>' . $content['heure_fin_event'] . '</td>';
                            echo '<td>' . $content['nombre_places'] . '</td>';
                            echo '<td>' . $content['point_open_dispo'] . '</td>';
                            echo '<td>' . $content['lieu'] . '</td>';
                            echo '<td>' . $content['description'] . '</td>';
                            echo '<td>' . $content['Id_association'] . '</td>';
                            echo '<td> <button type="submit" value="'.$content['Id_evenement'].'" name="Supp" class="btn btn-danger">Supp</button></td>';
                            echo '<td> <button type="submit" value="'.$content['Id_evenement'].'" name="Modif" class="btn btn-success">Modifier</button></td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>
                            <td>
                                <h1 class="h3 mb-2 text-gray-800">Modifier</h1>
                            </td>
                            <td>
                                <input  name="nom_event" class="form-control" type="text">
                            </td>
                            <td>
                                <input  name="date_debut_event" class="form-control" type="date"  >
                            </td>
                            <td>
                                <input  name="heure_debut_event" class="form-control" type="time"  >
                            </td>

                            <td>
                                <input  name="date_fin_event" class="form-control" type="date"  >
                            </td>

                            <td>
                                <input  name="heure_fin_event" class="form-control" type="time"  >
                            </td>

                            <td>
                                <input  name="nombre_places" class="form-control" type="number"  >
                            </td>
                            <td>
                                <input  name="point_open_dispo" class="form-control" type="number"  >
                            </td>
                            <td>
                                <input  name="lieu" class="form-control" type="text" >
                            </td>
                            <td>
                                <input  name="description" class="form-control" type="text" >
                            </td>
                            <td>
                                <input  name="id_association" class="form-control" type="number" >
                            </td>
                        </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            <div class="formulaire row col-12">
                <form enctype="multipart/form-data" action="verification_evenement.php" method="post">
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
                        <input class="form-control" type="number" name="point_open_dispo" placeholder="" required>
                    </div>
                    <div class="mb-4">
                        <label>Lieu</label>
                        <input class="form-control" type="text" name="lieu" placeholder="" required>
                    </div>
                    <div class="mb-4">
                        <label>Desription</label>
                        <input class="form-control" type="text" name="description" placeholder="" required>
                    </div>
                    <div class="mb-4">
                        <label>Id assos</label>
                        <input class="form-control" type="number" name="Id_association" placeholder="" required>
                    </div>


                    <input class="btn btn-primary" type="submit" value="Créer">
                </form>
            </div>
        </div>
    </div>

</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Programme OPEN</span>
        </div>
    </div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</body>
</html>