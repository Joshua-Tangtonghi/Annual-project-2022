<?php
    
    include ('lib/database.php');

    if(isset($_POST['verif_email']) || !empty($_POST['verif_email'])) {

        $_check_email = $db->prepare("SELECT id_GES FROM utilisateur WHERE email = :email");
        $_check_email->execute([
            ':email' => $_POST['verif_email']
        ]);
        $check_email = $_check_email->fetch();
    
        if($check_email){
            $query = $db->prepare("UPDATE utilisateur SET verif_email = 1 WHERE email = :email");
            $query->execute([
                ':email' => $_POST['verif_email']
            ]);
            header('location:connexion.php?message=Email_vérifier');
        } else {
            header('location:verification_email.php?message=Erreur_email_non_trouver'); 
        }
    }
    
?>