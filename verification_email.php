<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verication email</title>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/logo.png">
  </head>
  <body class="d-flex align-items-center justify-content-center">
    <div class="container d-flex align-items-center justify-content-center">
      <div class="text-center">
        <h1 style="color:white">Bonjour,<br> Veuillez écrire le mail avec lequel vous vous êtes enregisté.<br></h1>
        <form method="POST" action="verif_email.php">
            <div>
                <input type="email" id="verif_email" placeholder="Saisissez votre email" name="verif_email" required>
            </div>
                <button class="btn btn-warning" type="submit">Valider</button>
        </form>
      </div>
    </div>
  </body>
</html>