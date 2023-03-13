
<?php

include 'lib/database.php' ?>
<?php include 'partials/header_admin.php' ?>
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
?>
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Associations</h1>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <form enctype="multipart/form-data"  method="post" action="gestion_bouton_association.php">
                                <thead>
                                <tr>
                                    <?php
                                    theadFill($order, 'ID', 'ID');
                                    theadFill($order, 'Nom', 'Nom');
                                    theadFill($order, 'Axe', 'Axe');
                                    theadFill($order, 'Description', 'Description');
                                    theadFill($order, 'Points max', 'Points max');
                                    theadFill($order, 'Heures', 'Heures');
                                    theadFill($order, 'Dates', 'Dates');

                                    ?>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php

                                $select = $db->query("SELECT * FROM association ");
                                while ($content = $select->fetch()) {
                                    echo '<tr>';
                                    echo '<td>' . $content['Id_association'] . '</td>';
                                    echo '<td>' . $content['nom'] . '</td>';
                                    echo '<td>' . $content['axe'] . '</td>';
                                    echo '<td>' . $content['description'] . '</td>';
                                    echo '<td>' . $content['point_max'] . '</td>';
                                    echo '<td>' . $content['heures'] . '</td>';
                                    echo '<td>' . $content['dates'] . '</td>';
                                    echo '<td> <button type="submit" value="'.$content['Id_association'].'" name="Supp" class="btn btn-danger">Supp</button></td>';
                                    echo '<td> <button type="submit" value="'.$content['Id_association'].'" name="Modif" class="btn btn-success">Modifier</button></td>';
                                    echo '</tr>';
                                }
                                ?>
                                <tr>
                                    <td>
                                        <h1 class="h3 mb-2 text-gray-800">Modifier</h1>
                                    </td>
                                    <td>
                                        <input  name="nom" class="form-control" type="text">
                                    </td>
                                    <td>
                                        <input  name="axe" class="form-control" type="text"  >
                                    </td>
                                    <td>
                                        <input  name="description" class="form-control" type="text"  >
                                    </td>
                                    <td>
                                        <input  name="point_max" class="form-control" type="text" >
                                    </td>
                                    <td>
                                        <input  name="heures" class="form-control" type="time"  >
                                    </td>
                                    <td>
                                        <input  name="dates" class="form-control" type="date"  >
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
                            <form enctype="multipart/form-data" action="verification_association.php" method="post">
                                <h1>Nouvelle association</h1>
                                <div class="mb-4">
                                    <label>Nom de l'association</label>
                                    <input class="form-control" type="text" name="nom"  required>
                                </div>
                                <div class="mb-4">
                                    <label>Axe</label>
                                    <select class="form-control" type="text" name="type" required>
                                        <option>Entreprise</option>
                                        <option>Esprit d'équipe</option>
                                        <option>Challenge</option>
                                        <option>Communication</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label>Description</label>
                                    <input class="form-control" type="text" name="description" placeholder="" required>
                                </div>
                                <div class="mb-4">
                                    <label>Nombre de points open</label>
                                    <input class="form-control"type="text" name="point_max" placeholder="" required>
                                </div>
                                <div class="mb-4">
                                    <label>Heures</label>
                                    <input class="form-control" type="time" name="heures" placeholder="" required>
                                </div>
                                <div class="mb-4">
                                    <label>Dates</label>
                                    <input class="form-control" type="date" name="dates" placeholder="" required>
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