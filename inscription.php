<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
      <script src="js/puzzle.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/logo.png">
  </head>
  <?php include ('lib/database.php');?>
  <body>
  <main>
    <div class="center">
      <h1>Inscription</h1>
      <form  action="verification_inscription.php" method="post">
        <div class="text">
            <input class="form-control" type="text" name="nom" id="nom" required>
            <span></span>
            <label>Nom</label>
          </div>
          <div class="text">
            <input class="form-control" type="text" name="prenom" id="prenom" required>
            <span></span>
            <label>Prenom</label>
          </div>
        <div class="text">
            <input class="form-control" type="text" name="email" id="email" required>
            <span></span>
            <label>Addresse Mail</label>
        </div>
        <div class="text">
            <input class="form-control" type="text" name="promotion" id="promotion" required>
            <span></span>
            <label>Promotion</label>
          </div>
        <div class="text">
            <input class="form-control" type="password" name="mot_de_passe" id="mot_de_passe" required>
            <span></span>
            <label>Mot de passe</label>
        </div>
        <div class="text">
          <input class="form-control" type="password" name="cmot_de_passe" id="cmot_de_passe"required>
          <span></span>
          <label>Confirmer mot de passe</label>
      </div>
         <div class="mb-3">
             <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox" disabled required>

             <input class="form-check-label" onclick="rand()"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Captcha">

          </div>


          <input type="submit"  value="S'inscrire">
          <div class="login_btn">
          Déjà inscrit ? <a href="connexion.php"> Connectez-vous</a>
        </div>



      </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Veuillez remplir le captcha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="popup">

                            <div class="img_captcha">

                                <form action="verification_inscription.php" method="post">

                                    <h1 name="h1" id="target"></h1>

                                    <input type="text" id="theme" name="theme" value="#" hidden="hidden">

                                        <button  type="button" id="bouton1" name="bouton1" value="0" onclick="tick(1)"><img class="captcha" id="img1" src="assets/images/Captcha/premier/8.jpg"></button>

                                        <button  type="button" id="bouton2" name="bouton2" value="0" onclick="tick(2)"><img class="captcha" id="img2" src="assets/images/Captcha/premier/5.jpg"></button>

                                        <button  type="button" id="bouton3" name="bouton3" value="0" onclick="tick(3)"><img class="captcha" id="img3" src="assets/images/Captcha/premier/6.jpg"></button>

                                        <br>

                                        <button  type="button" id="bouton4" name="bouton4" value="0" onclick="tick(4)"><img class="captcha" id="img4" src="assets/images/Captcha/premier/2.jpg"></button>

                                        <button  type="button" id="bouton5" name="bouton5" value="0" onclick="tick(5)"><img class="captcha" id="img5" src="assets/images/Captcha/premier/4.jpg"></button>

                                        <button  type="button" id="bouton6" name="bouton6" value="0" onclick="tick(6)"><img class="captcha" id="img6" src="assets/images/Captcha/premier/3.jpg"></button>

                                        <br>

                                        <button  type="button" id="bouton7" name="bouton7" value="0" onclick="tick(7)"><img class="captcha" id="img7" src="assets/images/Captcha/premier/9.jpg"></button>

                                        <button   type="button" id="bouton8" name="bouton8" value="0" onclick="tick(8)"><img class="captcha" id="img8" src="assets/images/Captcha/premier/7.jpg"></button>

                                        <button  type="button" id="bouton9" name="bouton9" value="0" onclick="tick(9)"><img class="captcha" id="img9" src="assets/images/Captcha/premier/1.jpg"></button>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input class="captcha_button" type="button"  value="Valider" onclick="checkSolved()" data-bs-dismiss="modal">


                                    </div>
                            </div>
            </div>
        </div>
    </div>
            </main>
  </body>
</html>