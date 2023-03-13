
<?php include 'lib/database.php' ?>


<?php include 'partials/header_admin.php' ?>
   <?php
                                    if (isset($_GET['order']))
                                    $order = $_GET['order'];
                                    else
                                    $order = "id_GES";
                                    $select = $db->query("SELECT * FROM utilisateur ORDER by $order");

                                    function theadFill($order, $value, $disp)
                                    {
                                    if ($order == $value)
                                    echo '<th><a href="?order=' . $value . ' DESC">' . $disp . '</a></th>';
                                    else
                                    echo '<th><a href="?order=' . $value . '">' . $disp . '</a></th>';
                                    }
                                    ?>

            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Utilisateurs</h1>
                <a href="export.php" class="btn btn-success">Exporter information</a>
                <br><br>
                <div class="card shadow mb-4">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <form enctype="multipart/form-data" method="post" action="gestion_bouton_utilisateurs.php">
                                <thead>


                                <tr>
                                    <?php
                                    theadFill($order, 'id_GES', 'ID');
                                    theadFill($order, 'prenom', 'prenom');
                                    theadFill($order, 'nom', 'nom');
                                    theadFill($order, 'email', 'Email');
                                    theadFill($order, 'promotion', 'promotion');
                                    theadFill($order, 'admin', 'admin');
                                    ?>
                                    <th></th>
                                    <th></th>
                                </tr>

                                </thead>



                                    <?php

                                    $select = $db->query("SELECT * FROM utilisateur ");
                                    while ($content = $select->fetch()) {

                                        echo '<tr>';
                                        echo '<td>'.$content['id_GES'] .'</td>';
                                        echo '<td>'.$content['prenom'].'</td>';
                                        echo '<td>'.$content['nom'].'</td>';
                                        echo '<td>'.$content['email'] .'</td>';
                                        echo '<td>'.$content['promotion'] .'</td>';
                                        echo '<td>'.$content['admin'].'</td>';


                                        echo '<td> <button type="submit" value="'.$content['id_GES'].'" name="Supp" class="btn btn-danger">Supp</button></td>';
                                        echo '<td> <button type="submit" value="'.$content['id_GES'].'" name="Modif" class="btn btn-success">Modifier</button></td>';
                                        echo '</tr>';


                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <h1 class="h3 mb-2 text-gray-800">Modifier</h1>
                                        </td>
                                        <td>
                                            <input  name="prenom" class="form-control" type="text"  >
                                        </td>
                                        <td>
                                            <input  name="nom" class="form-control" type="text"  >
                                        </td>
                                        <td>
                                            <input  name="email" class="form-control" type="text"  >
                                        </td>
                                        <td>
                                            <input  name="promotion" class="form-control" type="text" >
                                        </td>
                                        <td>
                                            <input  name="admin" class="form-control" type="text"  >
                                        </td>

                                    </tr>



                                </form>


                                </tbody>

                            </table>

                        </div>
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