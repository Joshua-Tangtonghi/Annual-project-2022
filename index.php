<?php include 'partials/header.php' ?>
<?php require_once 'lib/database.php'?>
    <main>




    <div class="rectangle">
        <div class="hero row">
            <div class="hero-right col-sm-6 col-sm-6">
                <h2 class="header-headline-1"> PROGRAMME</h2>
                <h1 class="header-headline-2">OPEN</h1>
            </div>

            <div class="col-sm-6 col-sm-6 fren">
                <img class="frens img-responsive" src="assets/images/frens.png"/>
            </div>

        </div>
    </div>
    <br><br><br><br><br><br>

    <div class="presentation row">
        <div id="presentation-content" class="col-sm-8">

            <div class="title">
                <h2 class="underline">
                    <span class="title">Programme OPEN ESGI</span>
                </h2>
            </div>
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
                    'id_page'=>'index',
                    'date_debut' => $date,
                    'ip' => $ip,
                    'heure_debut'=>$heure
                ]);

            }
            ?>
            <div class="axes">
                <div class="text-left">
                    <div class="h3">

                        AXE ENTREPRISE
                    </div>
                    <span>  A pour objectif de développer la connaissance du monde professionnel. Il implique d'étroites relations avec les sociétés de hautes technologies, les professionnels de l'informatique et des systèmes d'information.
                </span>
                </div>
                <br><br>
                <div class="text-right">
                    <div class="h3">

                        AXE ESPRIT D'ÉQUIPE
                    </div>
                    <span>  A pour objectif de développer l'esprit de groupe, la convivialité, le respect de l'autre, d'apprendre à travailler en équipe et à développer un esprit de solidarité.
                </span>
                </div>
                <br><br>

                <div class="text-left">
                    <div class="h3">
                        AXE CHALLENGE
                    </div>
                    <span>  A pour objectif de développer l'esprit de compétition, de pousser au dépassement de soi dans son domaine de passion, de se fixer des objectifs ambitieux et de trouver le moyen de les atteindre.
                </span>
                </div>
                <br><br>
                <div class="text-right">
                    <div class="h3">

                        AXE COMMUNICATION
                    </div>
                    <span> A pour objectif de développer le relationnel, la confiance en soi et les qualités de communication des étudiants en dépassant ses craintes et son éventuelle timidité.
                </span>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>

    <section class="liens" id="liens">
    <div>
        <div class="link_axe entreprise">
            <img class="img_axe" src="assets/images/alternance.jpg" style="width: 16vw; border-radius: 20px;">
        </div>
    </div>

    <div>
        <div class="link_axe espritdequipe">
            <img class="img_axe" src="assets/images/jeux.jpg" style="width: 16vw; border-radius: 20px;">
        </div>
    </div>

    <div>
        <div class="link_axe challenge">
            <img class="img_axe" src="assets/images/labo.jpg" style="width: 16vw; border-radius: 20px;">
        </div>
    </div>

    <div>
        <div class="link_axe communication">
            <img class="img_axe" src="assets/images/japonais.jpg" style="width: 16vw; border-radius: 20px;">
        </div>
    </div>

</section>

    <br><br><br><br><br><br>
    </main>
<?php include ('partials/footer.php'); ?>