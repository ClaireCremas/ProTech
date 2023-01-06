<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="GP1.css">
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
    <h1>GP2 : <?php echo(nom_gp(2)) ?></h1>
    <div class='option'>
        <li><a href="./../Simulation/simulation_GP2.php" class='simulation'> Simulation </a> </li>

    </div>




    <div class='UP UP1'> 
        <?php $id_up=5;?>
    <?php if (validation_up($id_up,$email)==True){
             echo("<style> .UP1{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP1{background-color : #61CA6F;}</style>") ;
             }?>

        <p>UP1 : <?php echo(nom_up($id_up)) ?></p>
        <li> <!-- Donnée de l'up-->
            <ul>Moyenne : <?php $moyenne=moyenne_up_eleve($id_up,$email); echo($moyenne); ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up($id_up) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up($id_up) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,12) ?></ul>
                <ul>Classement : <?php classement_eval($email,12) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(12) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(12)?> </ul>
                <ul>Note min/ Note max : <?php min_note(12) ?> <?php echo('/') ?> <?php max_note(12) ?></ul>
            </li>


            <!-- NOTE DE RATTRAPAGE SI IL Y A -->
            <li class="note">
            <?php if (rattrapage_non_vide(13,$email)==TRUE){
              echo("<ul> Rattrapage </ul>
              <ul> Note : </ul>
              <ul> Note pour valider l'UP : </ul>");
            } ?>

          </li>
        </li>
    </div>
    <!--          UP2          -->
    <div class='UP UP2'> 
    <?php $id_up=6; ?>
    <?php if (validation_up($id_up,$email)==True){
             echo("<style> .UP2{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP2{background-color : #61CA6F;}</style>") ;
             }?>
        <p>UP2 : <?php echo(nom_up($id_up)) ?></p>
        <li> <!-- Donnée de l'up-->
            <ul>Moyenne : <?php $moyenne=moyenne_up_eleve($id_up,$email); echo($moyenne); ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up($id_up) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up($id_up) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,14) ?></ul>
                <ul>Classement : <?php classement_eval($email,14) ?></ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(14) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(14)?> </ul>
                <ul>Note min/ Note max : <?php min_note(14) ?> <?php echo('/') ?> <?php max_note(14) ?></ul>
            </li>
            
        </li>
        <!-- NOTE DE RATTRAPAGE SI IL Y A -->
        <li class="note">
            <?php if (rattrapage_non_vide(15,$email)==TRUE){
              echo("<ul> Rattrapage </ul>
              <ul> Note : </ul>
              <ul> Note pour valider l'UP : </ul>");
            } ?>
    </div>

    <!--                UP3              -->
    <div class='UP UP3'> 
    <?php $id_up=7; ?>
    <?php if (validation_up($id_up,$email)==True){
             echo("<style> .UP3{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP3{background-color : #61CA6F;}</style>") ;
             }?>

        <p>UP3 : <?php echo(nom_up($id_up)) ?></p>
        <li> <!-- Donnée de l'up-->
            <ul>Moyenne : <?php $moyenne=moyenne_up_eleve($id_up,$email); echo($moyenne); ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up($id_up) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up($id_up) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,16) ?></ul>
                <ul>Classement : <?php classement_eval($email,16) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(16) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(16)?> </ul>
                <ul>Note min/ Note max : <?php min_note(16) ?> <?php echo('/') ?> <?php max_note(16) ?></ul>
            </li>

            <!-- NOTE DE RATTRAPAGE SI IL Y A -->
            <li class="note">
            <?php if (rattrapage_non_vide(17,$email)==TRUE){
              echo("<ul> Rattrapage </ul>
              <ul> Note : </ul>
              <ul> Note pour valider l'UP : </ul>");
            } ?>

          </li>
        </li>
    </div>


        <!--                UP4              -->
        <div class='UP UP4'> 
        <?php $id_up=8; ?>
    <?php if (validation_up($id_up,$email)==True){
             echo("<style> .UP4{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP4{background-color : #61CA6F;}</style>") ;
             }?>

        <p>UP4 : <?php echo(nom_up($id_up)) ?></p>
        <li> <!-- Donnée de l'up-->
            <ul>Moyenne : <?php $moyenne=moyenne_up_eleve($id_up,$email); echo($moyenne); ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up($id_up) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up($id_up) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,18) ?></ul>
                <ul>Classement : <?php classement_eval($email,18) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(18) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(18)?> </ul>
                <ul>Note min/ Note max : <?php min_note(18) ?> <?php echo('/') ?> <?php max_note(18) ?></ul>
            </li>


            <!-- NOTE DE RATTRAPAGE SI IL Y A -->
            <li class="note">
            <?php if (rattrapage_non_vide(19,$email)==TRUE){
              echo("<ul> Rattrapage </ul>
              <ul> Note : </ul>
              <ul> Note pour valider l'UP : </ul>");
            } ?>

          </li>
        </li>
    </div>
    <div>
        <li><a href="./../accueil_eleve.php" class="retour">RETOUR</a></li>
    </div>
</body>
</html>