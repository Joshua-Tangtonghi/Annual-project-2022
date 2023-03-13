
<?php
include "partials/header.php";
include "lib/database.php";
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
    $order1 = "Id_association";
$select = $db->query("SELECT * FROM association ORDER by $order1");

?>


    <main>
        <div class="container">
            <div class="row col-12">
                <br><br><br><br><br><br>
                <h1>Mon Compte</h1><br><br>
                <div class="overflow-auto">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <form action="verification_modifier_profil.php" method="post">
                            <thead>
                            <canvas id="canvasId" width="165" height="145">

                            </canvas>
                            <img id="scream" />
                            <div class="row col-12">
                            <input class="btn btn-primary" type="button" onclick="color()" value="->couleur peau">
                            <input class="btn btn-primary" type="button" onclick="image()" value="->visage">
                            </div>
                            <script src="js/Avatar.js"></script>

                            <tr>

                                <?php

                                theadFill($order, 'nom', 'Nom');
                                theadFill($order, 'prenom', 'Prénom');
                                theadFill($order, 'promotion', 'Promotion');
                                theadFill($order, 'email', 'Email');
                                theadFill($order, 'point_open', 'Points Open');
                                ?>



                            </tr>

                            </thead>




                                <?php

                                $q = $db->query('SELECT * FROM utilisateur WHERE email = "' . $_SESSION['email'] . '"');
                                while ($utilisateurs = $q->fetch()) {
                                    echo '<tr>';

                                    echo '<td>' . $utilisateurs['nom'] . '</td>';
                                    echo '<td>' . $utilisateurs['prenom'] . '</td>';
                                    echo '<td>' . $utilisateurs['promotion'] . '</td>';
                                    echo '<td>' . $utilisateurs['email'] . '</td>';
                                    echo '<td>' . $utilisateurs['point_open'] . '</td>';
                                    echo '<td><button type="submit" value="'.$utilisateurs['id_GES'].'" name="Modif" class="btn btn-primary">Modifier</button>   </td>';
                                    echo '</tr>';
                                    $id_GES=$utilisateurs['id_GES'];
                                }

                                ?>
                            <tr>
                                <td>
                                    <h1 class="h3 mb-2 text-gray-800">Modifier</h1>
                                </td>
                                <td>
                                    <input  name="nom" class="form-control" type="text" placeholder="Nom" >
                                </td>
                                <td>
                                    <input  name="prenom" class="form-control" type="text" placeholder="Prénom">
                                </td>
                                <td>
                                    <input  name="promotion" class="form-control" type="text"  placeholder="Promotion">
                                </td>
                                <td>
                                    <input  name="email" class="form-control" type="text"  placeholder="Email">
                                </td>


                            </tr>
                        </form>
                        </tbody>

                    </table>
                </div>
            </div>
    <br><br><br>
            <div class="row col-12">
                <br><br><br><br><br><br>
                <h1>Mes Associations</h1><br><br>
                <div class="overflow-auto">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form action="quitter.php" method="post">
                            <thead>


                            <tr>

                                <?php

                                theadFill($order1, 'nom', 'Nom de l association');

                                ?>



                            </tr>

                            </thead>



                            <?php
                            $req = $db->query('SELECT * FROM inscrit ,association where id_GES=(select id_GES from utilisateur where email = "' . $_SESSION['email'] . '") and inscrit.Id_association = association.Id_association ');


                            $req->execute() ;
                            while ($association = $req->fetch()) {
                                echo '<tr>';
                                echo '<td>' . $association['nom'] . '</td>';

                                echo '<td>' .'<input type="hidden" name="id_GES1" value="'.$id_GES.'" >'.' <button type="submit"   class="btn btn-primary" value="'.$association['Id_association'].'" name="Id_association" class="btn btn-danger">Quitter</button></form></td>';
                                echo '</tr>';
                            }

                            ?>

                        </form>
                        </tbody>

                    </table>
                </div>

                <div class="row col-12">
                    <br><br><br><br><br><br>
                    <h1>Mes Evenements</h1><br><br>
                    <div class="overflow-auto">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <form action="quitter_event.php" method="post">
                                <thead>


                                <tr>

                                    <?php

                                    theadFill($order1, 'nom', 'Nom de l\'evenements');

                                    ?>



                                </tr>

                                </thead>



                                <?php
                                $req = $db->query('SELECT * FROM rejoint ,evenement where id_GES=(select id_GES from utilisateur where email = "' . $_SESSION['email'] . '") and rejoint.Id_evenement = evenement.Id_evenement ');


                                $req->execute() ;
                                while ($evenement = $req->fetch()) {
                                    echo '<tr>';
                                    echo '<td>' . $evenement['nom_event'] . '</td>';

                                    echo '<td>' .'<input type="hidden" name="id_GES1" value="'.$id_GES.'" >'.' <button type="submit"   class="btn btn-primary" value="'.$evenement['Id_evenement'].'" name="Id_evenement" class="btn btn-danger">Quitter</button></td>';
                                    echo '</tr>';
                                }

                                ?>

                            </form>
                            </tbody>

                        </table>
                    </div>



    <br><br><br>





    </main>
    <br><br><br><br><br><br>
    <?php include('partials/footer.php') ?>
  </body>
</html>