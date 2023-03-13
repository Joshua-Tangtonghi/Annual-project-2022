
<?php

include ('lib/database.php'); ?>
<?php include ('partials/header_admin.php'); ?>
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
<?php
            function getIp(){
                if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                return $ip;
            }
             if(isset($_SESSION['email'])){

                $ip=getIp();
                $date=Date('Y-m-d');
                $heure=Date("H:i:s");




                $q = "INSERT INTO login (id_page,date_debut,ip,heure_debut) VALUES (:id_page,:date_debut,:ip,:heure_debut)";
                $req = $db->prepare($q);
                $reponse = $req->execute([
                    'id_page'=>'page validation',
                    'date_debut' => $date,
                    'ip' => $ip,
                    'heure_debut'=>$heure
                ]);

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