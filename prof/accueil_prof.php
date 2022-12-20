<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Professeur</title>
</head>
<body>
    <?php session_start();
        include './../barre_tete.php';
        include '../include/database.php'; #connexion à la base de donnée
        global $db; #permet d'avoir la base de donnée sous le nom db
    
    ?>
    <h1>Accueil PROF</h1>
</body>
</html>