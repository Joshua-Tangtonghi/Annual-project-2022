<?php include "partials/header_co_inscrip.php"; ?>

<main>
    <?php
    if(isset($_GET['message']) && !empty($_GET['message'])){
        echo '<h3>' . htmlspecialchars($_GET['message']) . '</h3>';
    }
    ?>
    <div class="center">
        <h1>PRESENCE</h1>
        <form action="verification_presence.php" method="post">
            <div class="text">
                <input type="text" class="form-control" type="text" name="nom_association" required>
                <span></span>
                <label>Nom de l'association</label>
            </div>
            <div class="text">
                <input type="text" class="form-control" type="date" name="nom_association" required>
                <span></span>
                <label>Date</label>
            </div>
            <div class="text">
                <input type="text" class="form-control" type="text" name="nom" required>
                <span></span>
                <label>Nom</label>
            </div>
            <div class="text">
                <input type="text" class="form-control" type="text" name="prenom" required>
                <span></span>
                <label>Prenom</label>
            </div>
            <div class="text">
                <input type="text" class="form-control" type="text" name="promotion" required>
                <span></span>
                <label>Promotion</label>
            </div>
            <input type="submit" value="Envoyer">
            <br><br><br>
        </form>
    </div>
</main>

</body>
</html>