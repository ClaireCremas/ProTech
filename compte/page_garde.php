<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page_garde2.css">
    <title>Connaître GPA</title>
</head>
<?php session_start(); ?>
<body>
    <h1> Bienvenue sur ton compte pour connaître ton GPA</h1>
    <div class="eleve">
        <p>Ton nom : <?php echo($_SESSION['nom']) ?> </p>
        <p>Ton prénom : <?php echo($_SESSION['prenom']) ?> </p>
        <p>Ton GPA : PAS OUF</p>
    </div>
    <p><a href="include\information\information.php"> Informations</a></p>
    <div>
        <p>GP : </p>
        <p>Grade : </p>
        <p>Moyenne : </p>
    </div>
</body>
</html>