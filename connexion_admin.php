
<?php include 'lib/database.php' ?>


<?php include 'partials/header_admin.php' ?>
<?php
if (isset($_GET['order']))
    $order = $_GET['order'];
else
    $order = "Id_tracking";
$select = $db->query("SELECT * FROM login ORDER by $order");

function theadFill($order, $value, $disp)
{
    if ($order == $value)
        echo '<th><a href="?order=' . $value . ' DESC">' . $disp . '</a></th>';
    else
        echo '<th><a href="?order=' . $value . '">' . $disp . '</a></th>';
}
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Connexion par page</h1>
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form enctype="multipart/form-data" method="post" action="gestion_bouton_utilisateurs.php">
                        <thead>


                        <tr>
                            <?php
                            theadFill($order, 'Id_tracking', 'Id');
                            theadFill($order, 'id_page', 'page');
                            theadFill($order, 'date_debut', 'date');
                            theadFill($order, 'ip', 'ip');
                            theadFill($order, 'heure_debut', 'heure');
                            ?>
                        </tr>

                        </thead>



                        <?php

                        $select = $db->query("SELECT * FROM login ");
                        while ($content = $select->fetch()) {

                            echo '<tr>';
                            echo '<td>'.$content['Id_tracking'] .'</td>';
                            echo '<td>'.$content['id_page'].'</td>';
                            echo '<td>'.$content['date_debut'].'</td>';
                            echo '<td>'.$content['ip'] .'</td>';
                            echo '<td>'.$content['heure_debut'] .'</td>';

                            echo '</tr>';


                        }
                        ?>




                    </form>


                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tentative de connexion</h1>
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form enctype="multipart/form-data" method="post" action="gestion_bouton_utilisateurs.php">
                        <thead>




                        </thead>



                        <?php
                        $file = 'log.txt';
                        $orig = file_get_contents($file);
                        $a = htmlentities($orig);

                        echo '<code>';
                        echo '<pre>';

                        echo $a;

                        echo '</pre>';
                        echo '</code>';
                        ?>




                    </form>


                    </tbody>

                </table>

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