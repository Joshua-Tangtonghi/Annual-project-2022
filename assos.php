
<?php include('partials/header.php'); ?>
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
                    'id_page'=>'association',
                    'date_debut' => $date,
                    'ip' => $ip,
                    'heure_debut'=>$heure
                ]);

            }
            ?>
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
            <h1>Association</h1><br><br>
            <div class="overflow-auto">
                <table class="table table-bordered" id="list_asso" width="100%" cellspacing="0">
                    <form enctype="multipart/form-data"  method="post" action="verif_rejoindre_assos.php">
                        <thead>
                        <tr>
                            <?php

                            theadFill($order, 'Nom', 'Nom');
                            theadFill($order, 'Axe', 'Axe');
                            theadFill($order, 'Description', 'Description');
                            theadFill($order, 'Points max', 'Points max');
                            theadFill($order, 'Heures', 'Heures');
                            theadFill($order, 'Dates', 'Dates');

                            ?>
                            <th></th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php

                        $q = $db->query('SELECT * FROM utilisateur WHERE email = "' . $_SESSION['email'] . '"');
                        while ($utilisateurs = $q->fetch()) {
                            $id_GES=$utilisateurs['id_GES'];
                        }

                        $select = $db->query("SELECT * FROM association ");
                        while ($content = $select->fetch()) {
                            echo '<tr>';

                            echo '<td>' . $content['nom'] . '</td>';
                            echo '<td>' . $content['axe'] . '</td>';
                            echo '<td>' . $content['description'] . '</td>';
                            echo '<td>' . $content['point_max'] . '</td>';
                            echo '<td>' . $content['heures'] . '</td>';
                            echo '<td>' . $content['dates'] . '</td>';
                            echo '<td>' .'<input type="hidden" name="id_GES1" value="'.$id_GES.'" >'.' <button type="submit" value="'.$content['Id_association'].'" name="Id_association" class="btn btn-success">Rejoindre</button></td>';
                            echo '</tr>';
                        }
                        ?>

                    </form>
                    </tbody>
                </table>
            </div>
        </div>




    </div>
    <br><br><br><br><br><br>
</main>

<?php include('partials/footer.php'); ?>


