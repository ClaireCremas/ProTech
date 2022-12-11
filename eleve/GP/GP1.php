<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php session_start();
    include './../../barre_tete.php';
    include './../../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    include('./../../requete.php')
?>
<body>
    <h1>GP1 : <?php echo(nom_gp(1)) ?></h1>
    <div>
        <li><a href=""> Simulation </a> </li>
        <li><a href="">Statistiques</a></li>
    </div>
    <div class='UP'> 
        <style>
            .UP{
                background:green;
            }
        </style>
        <p>UP1 : <?php echo(nom_up(1,1)) ?></p>
        <li>
            <ul>Moyenne : </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : </ul>
        </li>
        <li>
            <li>
                <ul>Note 1</ul>
                <ul> Note : </ul>
                <ul>Classement</ul>
                <ul>Coefficient</ul>
                <ul>Moyenne Groupe</ul>
                <ul>Ecart-Type</ul>
                <ul>Note min/ Note max</ul>
            </li>


            <li>
                <ul>Note 2</ul>
                <ul> Note : </ul>
                <ul>Classement</ul>
                <ul>Coefficient</ul>
                <ul>Moyenne Groupe</ul>
                <ul>Ecart-Type</ul>
                <ul>Note min/ Note max</ul>
            </li>
        </li>
    </div>
</body>
</html>