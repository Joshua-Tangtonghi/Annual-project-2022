

<?php include('partials/header.php') ?>
<?php
if (isset($_GET['order']))
    $order = $_GET['order'];
else
    $order = "Id_association";
$select = $db->query("SELECT * FROM evenement ORDER by $order");

function theadFill($order, $value, $disp)
{
    if ($order == $value)
        echo '<th><a href="?order=' . $value . ' DESC">' . $disp . '</a></th>';
    else
        echo '<th><a href="?order=' . $value . '">' . $disp . '</a></th>';
}


?>


<main>


    <div class="container">
        <div class="row col-12">
            <br><br><br><br><br><br>
            <h1>Evenements</h1><br><br>
            <div class="overflow-auto">
                <table class="table table-bordered" id="list_asso" width="100%" cellspacing="0">
                    <form enctype="multipart/form-data"  method="post" action="verif_rejoindre_event.php">
                        <thead>
                        <tr>
                            <?php

                            theadFill($order, 'nom_event', 'Nom');
                            theadFill($order, 'date_debut_event', 'date debut event');
                            theadFill($order, 'heure_debut_event', 'heure debut event');
                            theadFill($order, 'date_fin_event', 'date fin event');
                            theadFill($order, 'heure_fin_event', 'heure fin event');
                            theadFill($order, 'nombre_places', 'Nombre places');
                            theadFill($order, 'point_open_dispo', 'point open dispo');
                            theadFill($order, 'lieu', 'Lieu');
                            theadFill($order, 'description', 'Description');

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
                        $select = $db->query("SELECT * FROM evenement ");
                        while ($content = $select->fetch()) {
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
                            echo '<td>' .'<input type="hidden" name="id_GES1" value="'.$id_GES.'" >'.' <button type="submit" value="'.$content['Id_evenement'].'" name="Id_evenement" class="btn btn-success">Rejoindre</button></td>';

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
<?php include('partials/footer.php') ?>



