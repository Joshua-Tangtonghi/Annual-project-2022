<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier profil</title>
    <meta name="supersmash" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style2.css">
</head>
<div class="app-container">
<?php
    include('partials/header.php'); 
?>
<html>
  <body>
    <main>
      <div class="container">
        <div class="formulaire row col-12">
          <h1>Modifier mon profil</h1>
          <form enctype="multipart/form-data" action="verification_modifier_profil.php" method="post">          
            <div class="mb-4">
              <label>Email</label>
              <input class="form-control" type="text" name="email" placeholder="Adresse mail">
            </div>
            <div class="mb-4">
              <label>Mot de passe</label>
              <input class="form-control" type="password" name="mot_de_passe" placeholder="">
            </div>
            <div class="mb-4">
              <label>Avatar</label>
              <input class="form-control" type="file" name="avatar" accept="images/jpeg,images/png">
            </div>
            <input class="btn btn-primary" type="submit" value="Modifier">
          </form>
        </div>
      </div>
    </main>
<?php include('partials/footer.php') ?>
  </body>
</html>
