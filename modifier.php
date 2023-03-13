
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <?php
  $title = 'Modifier';
  include ('partials/header.php');
  ?>
  <body>
    <main>

      <div class="container">
        <div class="formulaire row col-12">
          <h1>Modifier mon association</h1>
          <form enctype="multipart/form-data" action="verification_modifier.php" method="post">
            <div class="mb-4">
              <label>Nom de l'association</label>
              <input class="form-control" type="text" name="nom_association" placeholder="">
            </div>
            <div class="mb-4">
              <label>Description</label>
              <input class="form-control" type="text" name="description" placeholder="">
            </div>
            <input class="btn btn-primary" type="submit" value="Modifier">
          </form>
        </div>
      </div>
      <?php include('partials/footer.php'); ?>
    </main>
  </body>
</html>
