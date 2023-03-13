<?php include 'lib/database.php'?>

<?php include 'partials/header_admin.php' ?>

<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">

                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Utilisateurs</div>

                                            <?php

                                            $select = $db->query("SELECT count(id_GES) as id_GES  FROM utilisateur ");
                                            $content = $select->fetch();
                                        echo'<div class="h5 mb-0 font-weight-bold text-gray-800">' .$content['id_GES'].'</div>';
                                        ?>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Associations</div>
                                        <?php

                                        $select = $db->query("SELECT count(Id_association) as Id_association  FROM association ");
                                        $content = $select->fetch();
                                        echo'<div class="h5 mb-0 font-weight-bold text-gray-800">' .$content['Id_association'].'</div>';
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            EVENEMENTS</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Nombre connexion totale aujourd'hui</div>
                                        <?php
                                        $date=Date('Y-m-d');
                                        echo $date;
                                        $select = $db->query("SELECT count(Id_tracking) as Id_tracking  FROM login where date_debut='$date' ");
                                        $content = $select->fetch();
                                        echo'<div class="h5 mb-0 font-weight-bold text-gray-800">' .$content['Id_tracking'].'</div>';
                                        ?>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Nombre connexion totale</div>
                                        <?php

                                        $select = $db->query("SELECT count(Id_tracking) as Id_tracking  FROM login ");
                                        $content = $select->fetch();
                                        echo'<div class="h5 mb-0 font-weight-bold text-gray-800">' .$content['Id_tracking'].'</div>';
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Nombre connexion par page</div>
                                        <?php
                                        if (isset($_POST['type'])){
                                            $type=$_POST['type'];
                                            echo $type;
                                            $select = $db->query("SELECT count(Id_tracking) as Id_tracking  FROM login where id_page='$type' ");
                                            $content = $select->fetch();
                                            echo'<div class="h5 mb-0 font-weight-bold text-gray-800">' .$content['Id_tracking'].'</div>';

                                        }

                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <form action="admin_dashboard.php"  enctype="multipart/form-data" method="post">
                                            <div class="mb-4">
                                                <label>Page</label>
                                                <select class="form-control" type="text" name="type" >
                                                    <option>index</option>
                                                    <option>association</option>
                                                    <option>planning</option>
                                                    <option>mon association</option>
                                                    <option>dashboard</option>
                                                    <option>page validation</option>
                                                    <option>axe association</option>
                                                    <option>evenements</option>
                                                </select>

                                                <input class="btn btn-primary" type="submit" value="Afficher">
                                            </div>
                                        </form>
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Nombre connexion totale date précise</div>
                                    <?php
                                    if (isset($_POST['dates'])){
                                        $date_choisi=$_POST['dates'];
                                        echo $date_choisi;
                                        $select = $db->query("SELECT count(Id_tracking) as Id_tracking  FROM login where date_debut='$date_choisi' ");
                                        $content = $select->fetch();
                                        echo'<div class="h5 mb-0 font-weight-bold text-gray-800">' .$content['Id_tracking'].'</div>';

                                    }

                                    ?>
                                </div>
                                <div class="col-auto">
                                    <form action="admin_dashboard.php"  enctype="multipart/form-data" method="post">
                                        <div class="mb-4">
                                            <label>Dates</label>
                                            <input class="form-control" type="date" name="dates" >
                                            <input class="btn btn-primary" type="submit" value="Afficher">
                                        </div>
                                    </form>
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Associations</div>
                                    <?php
                                    if (isset($_POST['dates']) && isset($_POST['type'])){
                                        $date_choisi=$_POST['dates'];
                                        echo  $date_choisi." ";
                                        $type=$_POST['type'];
                                        echo $type;
                                        $select = $db->query("SELECT count(Id_tracking) as Id_tracking  FROM login where date_debut='$date_choisi' AND  id_page='$type'");
                                        $content = $select->fetch();
                                        echo'<div class="h5 mb-0 font-weight-bold text-gray-800">' .$content['Id_tracking'].'</div>';

                                    }

                                    ?>

                                </div>
                                <div class="col-auto">
                                    <form class="was-validated" action="admin_dashboard.php"  enctype="multipart/form-data" method="post">
                                        <div class="mb-4">
                                            <label>Page</label>
                                            <select class="form-control" type="text" name="type" >
                                                <option>index</option>
                                                <option>association</option>
                                                <option>planning</option>
                                                <option>mon association</option>
                                                <option>dashboard</option>
                                                <option>page validation</option>
                                                <option>axe association</option>
                                                <option>evenements</option>
                                            </select>
                                        <label>Dates</label>
                                        <input class="form-control" type="date" name="dates" required >
                                        <input class="btn btn-primary" type="submit" value="Afficher">
                                    </div>
                                    </form>
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



            </div>




        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>


    </div>


</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>



</body>
