<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page_garde.css">
    <title>Connaître GPA</title>
</head>
<?php session_start(); ?>
<body>
    <h1> Bienvenue sur ton compte pour connaître ton GPA <?php echo( $_SESSION['email']); ?></h1>
    <p>Ton nom : </p>
    <p>Ton prénom : </p>
    <p>Ton GPA : PAS OUF</p>
    <p><a href="include\information\information.php"> Informations</a></p>
</body>
</html>