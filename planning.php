<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planning</title>
    <meta name="supersmash" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style2.css">
</head>
<div class="app-container">
<?php
    include('partials/header.php');
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
                    'id_page'=>'planning',
                    'date_debut' => $date,
                    'ip' => $ip,
                    'heure_debut'=>$heure
                ]);

            }
            ?>
<html>
    <body>
    <div class="app-content">
      <div class="plans-section">
        <div class="plans-section-header">
          <p>Associations</p>
          <p class="time">28 mars 2022</p>
        </div>
 
        <div class="plan-boxes jsGridView">
          <div class="plan-box-wrapper">
            <div class="plan-box" style="background-color: #e9e7fd;">
              <div class="plan-box-header">
                <div class="more-wrapper">
            </div>
          </div>
          <div class="plan-box-content-header">
            <p class="box-content-header">Nintendo</p>
            <p class="box-content-subheader">14:00</p>
            <p class="box-content-subheader">Nation II, C01</p>
          </div>
        </div>

        </div>
        <div class="plan-box-wrapper">
            <div class="plan-box" style="background-color: #e9e7fd;">
            <div class="plan-box-header">
                <div class="more-wrapper">
                </div>
            </div>
            <div class="plan-box-content-header">
                <p class="box-content-header">Couch Gaming</p>
                <p class="box-content-subheader">14:00</p>
                <p class="box-content-subheader">Nation II, C02</p>
            </div>
            </div>
        </div>

        <div class="plan-box-wrapper">
            <div class="plan-box" style="background-color: #e9e7fd;">
            <div class="plan-box-header">
                <div class="more-wrapper">
                </div>
            </div>
            <div class="plan-box-content-header">
                <p class="box-content-header">Labo Infra</p>
                <p class="box-content-subheader">14:00</p>
                <p class="box-content-subheader">Nation I, A03</p>
            </div>
            </div>
        </div>

        <div class="plan-box-wrapper">
            <div class="plan-box" style="background-color: #e9e7fd;">
            <div class="plan-box-header">
            </div>
            <div class="plan-box-content-header">
                <p class="box-content-header">Labo IA</p>
                <p class="box-content-subheader">14:00</p>
                <p class="box-content-subheader">Nation I, A24</p>
            </div>
            </div>
        </div>

        <div class="plan-box-wrapper">
            <div class="plan-box" style="background-color: #e9e7fd;">
            <div class="plan-box-header">
                <div class="more-wrapper">
                </div>
            </div>
            <div class="plan-box-content-header">
                <p class="box-content-header">Cinéma</p>
                <p class="box-content-subheader">14:00</p>
                <p class="box-content-subheader">Nation II, C02</p>
            </div>
            </div>
        </div>

        <div class="plan-box-wrapper">
            <div class="plan-box" style="background-color: #e9e7fd;">
            <div class="plan-box-header">
                <div class="more-wrapper">
                </div>
            </div>
            <div class="plan-box-content-header">
                <p class="box-content-header">CS:GO</p>
                <p class="box-content-subheader">14:00</p>
                <p class="box-content-subheader">Nation II, C03</p>
            </div>
            </div>
        </div>

    </div>
  </div>

  <div class="asso-section">
    <div class="plans-section-header">
      <p>Mes associations</p>
    </div>
    <div class="messages">
      <div class="asso-box">
        <div class="asso-content">
          <div class="asso-header">
            <div class="name">Nintendo</div>
          </div>
          <p class="asso-line">14h00</p>
          <p class="asso-line">Nation II C01
          </p>
        </div>
      </div>
      <div class="asso-box">
        <div class="asso-content">
          <div class="asso-header">
            <div class="name">Couch Gaming</div>
          </div>
          <p class="asso-line">14h00</p>
          <p class="asso-line">Nation II C02</p>
        </div>
      </div>
      <div class="asso-box">
        <div class="asso-content">
          <div class="asso-header">
            <div class="name">Labo IA</div>
          </div>
          <p class="asso-line">15h30</p>
          <p class="asso-line">Nation I A24</p>
        </div>
      </div>
      <div class="asso-box">
        <div class="asso-content">
          <div class="asso-header">
            <div class="name">Cinema</div>
          </div>
          <p class="asso-line">16h00</p>
          <p class="asso-line">Nation I A07</p>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

</html>