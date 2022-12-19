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
    <h1>GP1 : <?php echo(nom_gp(1)) ?></h1>
    <div>
        <li><a href=""> Simulation </a> </li>
        <li><a href="">Statistiques</a></li>
    </div>
    <div class='UP UP1'> 
    <?php if (rattrapage(1,$email,1,1)==True){
             echo("<style> .UP1{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP1{background-color : #61CA6F;}</style>") ;
             }?>

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
                <ul>Classement : <?php classement_eval($email,1) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(1) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(1)?> </ul>
                <ul>Note min/ Note max : <?php min_note(1) ?> <?php echo('/') ?> <?php max_note(1) ?></ul>
            </li>


            <li class="note">
                <ul>Note 2</ul>
                <ul> Note : <?php note($email,2) ?></ul>
                <ul>Classement : <?php classement_eval($email,2) ?></ul>
                <ul>Coefficient :</ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(2) ?></ul>
                <ul>Ecart-Type :  <?php ecart_type_eval(2)?></ul>
                <ul>Note min/ Note max : <?php min_note(2) ?> <?php echo('/') ?> <?php max_note(2) ?></ul>
            </li>

            <!-- NOTE DE RATTRAPAGE SI IL Y A -->
            <li class="note">
            <?php if (rattrapage_non_vide(4,$email)==TRUE){
              echo("<ul> Rattrapage </ul>
              <ul> Note : </ul>
              <ul> Note pour valider l'UP : </ul>");
            } ?>

          </li>
        </li>
    </div>
    <div class='UP UP2'> 
    <?php if (rattrapage(3,$email,2,1)==True){
             echo("<style> .UP2{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP2{background-color : #61CA6F;}</style>") ;
             }?>
        <p>UP2 : <?php echo(nom_up(2,1)) ?></p>
        <li>
            <ul>Moyenne : <?php moyenne_up(2) ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(2,1) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,3) ?></ul>
                <ul>Classement : <?php classement_eval($email,3) ?></ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(3) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(3)?> </ul>
                <ul>Note min/ Note max : <?php min_note(3) ?> <?php echo('/') ?> <?php max_note(3) ?></ul>
            </li>
            
        </li>
    </div>
    <div class="retour">
        <li><a href="./../accueil_eleve.php">RETOUR</a></li>
    </div>
</body>
</html>