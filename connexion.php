
 <?php include ("partials/header_co_inscrip.php"); ?>

  <main>
      <?php
      if(isset($_GET['message']) && !empty($_GET['message'])){
          echo '<h3>' . htmlspecialchars($_GET['message']) . '</h3>';
      }
      ?>
      <div class="center">
          <h1>CONNEXION</h1>
          <form action="verification_connexion.php" method="post">
              <div class="text">
                  <input type="text" class="form-control" type="email" name="email" required value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                  <span></span>
                  <label>Adresse mail</label>
              </div>
              <div class="text">
                  <input type="password" class="form-control" type="mot_de_passe" name="mot_de_passe" required>
                  <span></span>
                  <label>Mot de passe</label>
              </div>
              <input type="submit" value="Se connecter">
              <div class="signup_btn">
                  Pas encore membre ? <a href="inscription.php">Inscrivez-vous</a>
              </div>
          </form>
      </div>
  </main>

  </body>
</html>