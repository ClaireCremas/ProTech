<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="GP.css">
    <title>Document</title>
</head>

<?php session_start();
    include './../../barre_tete.php';
    include './../../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    include('./../../requete.php')
?>
<body>
    <?php $email=$_SESSION['email'] ?>
    <h1>GP3 : <?php echo(nom_gp(3)) ?></h1>
    <div>
        <li><a href=""> Simulation </a> </li>
        <li><a href="">Statistiques</a></li>
    </div>
    <div class='UP'> 
        <style>
            .UP{
                background:#AAE685;
            }
        </style>
        <p>UP1 : <?php echo(nom_up(1,1)) ?></p>
        <li>
            <ul>Moyenne : <?php moyenne_up(1) ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(1,1) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,1) ?></ul>
                <ul>Classement : </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(1) ?></ul>
                <ul>Ecart-Type : </ul>
                <ul>Note min/ Note max : </ul>
            </li>


            <li class="note">
                <ul>Note 2</ul>
                <ul> Note : <?php note($email,2) ?></ul>
                <ul>Classement :</ul>
                <ul>Coefficient :</ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(2) ?></ul>
                <ul>Ecart-Type :</ul>
                <ul>Note min/ Note max : </ul>
            </li>
        </li>
    </div>
    <div class='UP'> 
        <p>UP2 : <?php echo(nom_up(2,1)) ?></p>
        <li>
            <ul>Moyenne : <?php moyenne_up(2) ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(2,1) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,1) ?></ul>
                <ul>Classement : </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(1) ?></ul>
                <ul>Ecart-Type : </ul>
                <ul>Note min/ Note max : </ul>
            </li>


            <li class="note">
                <ul>Note 2</ul>
                <ul> Note : <?php note($email,2) ?></ul>
                <ul>Classement :</ul>
                <ul>Coefficient :</ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(2) ?></ul>
                <ul>Ecart-Type :</ul>
                <ul>Note min/ Note max : </ul>
            </li>
        </li>
    </div>
</body>
</html>