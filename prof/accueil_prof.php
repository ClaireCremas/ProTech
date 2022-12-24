<!-- Page accueil côté professeurs --->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil_prof.css"> <!--css-->
    <title>Page Professeur</title>
</head>

<?php session_start();
        include './../barre_tete_prof.php';
        include '../include/database.php'; #connexion à la base de donnée
        global $db; #permet d'avoir la base de donnée sous le nom db
    
?>
 <?php include('./../requete.php')?>

<body>
    <?php $email=$_SESSION['email'] ?>
    <h1>Accueil PROF</h1>
    <div class="professeur">
        <p><span class='nom'>Nom</span> : <?php echo($_SESSION['nom']) ?> </p>
        <p><span class='nom'>Prénom</span> : <?php echo($_SESSION['prenom']) ?> </p>
        <p><span class='nom'>Rôle</span> : <?php echo($_SESSION['role']) ?> </p>
    </div>

</body>
</html>