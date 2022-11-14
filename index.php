<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="index1.css">
=======
    <link rel="stylesheet" href="index1.css"><!-- ajout de css-->
>>>>>>> 56f57cfd22d5895a01083294c09386acb3214f23
    <title>Note UP ET GP</title>
</head>

<?php session_start();
<<<<<<< HEAD
    include 'barre_tête.php';
=======
    include 'barre_tête.php'; #barre de tête
>>>>>>> 56f57cfd22d5895a01083294c09386acb3214f23
    include './include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    
?>

<body>
    <div class="titre">
        <h1> BIENVENUE SUR LE SITE POUR CONNAITRE VOTRE GPA</h1>
    </div>
    <div>
        <?php
            if (isset($_SESSION['email']) && (isset($_SESSION['date']))){
            ?>
            <p> Votre pseudo : <?= $_SESSION['email']; ?></p>
            <p> Votre date de création : <?= $_SESSION['date']; ?></p>
            <?php
            }else{
                echo "Veuillez vous connectez à votre compte";
            }
            ?>
    </div>

    <!--- Ajout de la connexion et de l'inscription --->
    <?php
    include './include/connexion.php';
    include './include/inscription.php';
    
 
    ?>

</body>