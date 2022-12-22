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
    <h1>GP4: <?php echo(nom_gp(4)) ?></h1>
    <!-- Bouton simulation et Statistiques -->
    <div>
        <li><a href=""> Simulation </a> </li>
        <li><a href="">Statistiques</a></li>
    </div>

    <!-- Parti UP1 -->
    <div class='UP UP1'> 
        <!-- Couleur UP -->
    <?php if (validation_up(13,$email)==True){
             echo("<style> .UP1{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP1{background-color : #61CA6F;}</style>") ;
             }?>

        <p>UP1 : <?php echo(nom_up(1,4)) ?></p> <!-- nom de l'up-->
        <li> <!-- Donnée de l'up-->
            <ul>Moyenne : <?php $moyenne=moyenne_up_eleve(13,$email); echo($moyenne); ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(1,4) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up(13) ?> </ul>
        </li>

        <!-- Différente note de l'up1-->
        <li><!-- NOTE 1-->
            <li class="note"> 
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,41) ?></ul>
                <ul>Classement : <?php classement_eval($email,41) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(41) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(41)?> </ul>
                <ul>Note min/ Note max : <?php min_note(41) ?> <?php echo('/') ?> <?php max_note(41) ?></ul>
            </li>

            <!-- Note de rattrapage si elle existe -->
            <li class="note">
            <?php if (rattrapage_non_vide(45,$email)==TRUE){
                $nombre=return_note($email,45);
                /*ligne à changer*/
                $note_bulletin=(return_note($email,41)+return_note($email,45))/2;
                $arrondi=round($note_bulletin,2);
                echo("<ul> Rattrapage </ul>
                <ul> Note : $nombre  </ul>
                <ul> Note affichée sur le bulletin : $arrondi </ul>");
            } ?>
          </li>
        </li>
    </div>


    <!--          UP2          -->
    <div class='UP UP2'> 
        <!-- Couleur de l'UP2 -->
    <?php if (validation_up(14,$email)==True){
             echo("<style> .UP2{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP2{background-color : #61CA6F;}</style>") ;
             }?>

        <p>UP2 : <?php echo(nom_up(2,4)) ?></p> <!-- Nom de l'UP2-->
        <li>
            <ul>Moyenne : <?php $moyenne=moyenne_up_eleve(14,$email);echo($moyenne); ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(2,4) ?> </ul>
        </li>

        <li>
            <li class="note"> <!-- Note 1 de l'UP2-->
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,40) ?></ul>
                <ul>Classement : <?php classement_eval($email,40) ?></ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(40) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(40)?> </ul>
                <ul>Note min/ Note max : <?php min_note(40) ?> <?php echo('/') ?> <?php max_note(40) ?></ul>
            </li>
            
        </li>
        <!-- Note de rattrapage si elle existe -->
        <li class="note">
            <?php if (rattrapage_non_vide(44,$email)==TRUE){
                $nombre=return_note($email,44);
                $note_bulletin=(return_note($email,40)+return_note($email,44))/2;
                echo("<ul> Rattrapage </ul>
                <ul> Note : $nombre </ul>
                <ul> Note afficher sur le bulletin: $note_bulletin </ul>");
            } ?>
    </div>

    <!--                UP3              -->

    <div class='UP UP3'>  
        <!-- Couleur de de l'UP3-->
    <?php if (validation_up(15,$email)==True){
             echo("<style> .UP3{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP3{background-color : #61CA6F;}</style>") ;
             }?>

        <!-- Nom et donnée de l'UP3-->
        <p>UP3 : <?php echo(nom_up(3,4)) ?></p> 
        <li>
            <ul>Moyenne : <?php $moyenne=moyenne_up_eleve(15,$email); echo($moyenne) ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(3,4) ?> </ul>
        </li>


        <li>
            <li class="note"> <!-- Note 1 de l'UP3-->
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,42) ?></ul>
                <ul>Classement : <?php classement_eval($email,42) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(42) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(42)?> </ul>
                <ul>Note min/ Note max : <?php min_note(42) ?> <?php echo('/') ?> <?php max_note(42) ?></ul>
            </li>
            <!-- Note de rattrapage si elle existe -->
            <li class="note">
            <?php if (rattrapage_non_vide(46,$email)==TRUE){
                $nombre=return_note($email,46);
                echo("<ul> Rattrapage </ul>
                <ul> Note : $nombre </ul>
                <ul> Note pour valider l'UP : </ul>");
            } ?>
          </li>
        </li>
    </div>


        <!--                UP4              -->
        <div class='UP UP4'> 

        <!-- Couleur de l'UP4-->
    <?php if (validation_up(16,$email)==True){
             echo("<style> .UP4{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP4{background-color : #61CA6F;}</style>") ;
             }?>

            <!-- Nom et donnée de l'UP4-->
        <p>UP4 : <?php echo(nom_up(4,4)) ?></p>
        <li>
            <ul>Moyenne : <?php $moyenne=moyenne_up_eleve(16,$email); echo($moyenne); ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(4,4) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,43) ?></ul>
                <ul>Classement : <?php classement_eval($email,43) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(43) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(43)?> </ul>
                <ul>Note min/ Note max : <?php min_note(43) ?> <?php echo('/') ?> <?php max_note(43) ?></ul>
            </li>


            <!-- Note de rattrapage si elle existe-->
            <li class="note">
            <?php if (rattrapage_non_vide(47,$email)==TRUE){
                $nombre=return_note($email,47);
                echo("<ul> Rattrapage </ul>
                <ul> Note : $nombre </ul>
                <ul> Note pour valider l'UP : </ul>");
            } ?>
          </li>
        </li>
    </div>

    <!-- BOUTON RETOUR-->
    <div class="retour">
        <li><a href="./../accueil_eleve.php">RETOUR</a></li>
    </div>
</body>
</html>