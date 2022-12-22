<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="simulation_GP.css">
    <title>Simulation GP1</title>
</head>
<body>
<?php session_start();
    include './../../barre_tete.php';
    include './../../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    include('./../../requete.php');
    $email=$_SESSION['email'];
?>

    <h1>SIMULATION GP1 : <?php echo(nom_gp(1)) ?> </h1>
    <!-- UP1 -->
    <div class='UP UP1'>
        <p>UP1 : <?php echo(nom_up(1,1)) ?></p> <!-- nom de l'up-->
            <li> <!-- Donnée de l'up-->
                <ul>Note actuelle : <?php $moyenne=moyenne_up_eleve(1,$email); echo($moyenne); ?> </ul>
            </li>

        <!-- UP valide-->
            <li>
                <li class="note"> 
                    <ul>UP VALIDE ? : </ul>
                    <ul> Note pour valider : </ul>
                    <ul>Nouvelle moyenne : </ul>
                    <ul>Nouveau Grade : </ul>
                </li>


                <li class="note"> <!-- Note 2-->
                    <ul>GP VALIDE ? :</ul>
                    <ul> Note pour valider :</ul>
                    <ul>Nouvelle moyenne : </ul>
                    <ul>Nouveau Grade :</ul>
                </li>

                <li class="note">
                <ul> Grade voulu :  </ul>
                <ul> Note à avoir :   </ul>
                <ul> Note affichée sur le bulletin : </ul>
          </li>
    </div>



    <div class='retour'>
        <a href="./../GP/GP1.php"> RETOUR</a>
    </div>
</body>
</html>