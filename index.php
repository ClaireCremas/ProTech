<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css"><!-- ajout de css-->
    <title>Note UP ET GP</title>
</head>

<?php session_start();
    include 'barre_tete.php';
    include './include/database.php'; #connexion à la base de données
    global $db; #permet d'avoir la base de données sous le nom db
    
?>

<body>
    <div class="titre">
        <h1> BIENVENUE SUR LE SITE POUR CONNAITRE VOTRE GPA</h1>
    </div>
    <div>
        <?php
            if (isset($_SESSION['email']) && (isset($_SESSION['date']))){
            ?>
            <p class='text'> Votre pseudo : <?= $_SESSION['email']; ?></p>
            <p class='text'> Votre date de création : <?= $_SESSION['date']; ?></p>
            <?php
            }else{
                echo "<p class='text'>Connectez-vous, ou incrivez-vous pour créer un compte :</p>";
            }
            ?>
    </div>

    <!--- Ajout de la connexion et de l'inscription --->
    <?php
    include './include/connexion.php';
    include './include/inscription.php';
    
 
    ?>

</body>