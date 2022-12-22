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
    <h1>GP3 : <?php echo(nom_gp(3)) ?></h1>
    <!-- Bouton simulation et Statistiques -->
    <div class='option'>
        <li><a href="" class='simulation'> Simulation </a> </li>
        <li><a href="" class='simulation'>Statistiques</a></li>
    </div>

    <!-- Parti UP1 -->
    <div class='UP UP1'> 
        <!-- Couleur UP -->
    <?php if (validation_up(9,$email)==True){
             echo("<style> .UP1{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP1{background-color : #61CA6F;}</style>") ;
             }?>

        <p>UP1 : <?php echo(nom_up(1,3)) ?></p> <!-- nom de l'up-->
        <li> <!-- Donnée de l'up-->
            <ul>Moyenne : <?php moyenne_up_eleve(9,$email) ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(1,3) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up(9) ?> </ul>
        </li>

        <!-- Différente note de l'up1-->
        <li><!-- NOTE 1-->
            <li class="note"> 
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,20) ?></ul>
                <ul>Classement : <?php classement_eval($email,20) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(20) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(20)?> </ul>
                <ul>Note min/ Note max : <?php min_note(20) ?> <?php echo('/') ?> <?php max_note(20) ?></ul>
            </li>


            <li class="note"> <!-- Note 2-->
                <ul>Note 2</ul>
                <ul> Note : <?php note($email,21) ?></ul>
                <ul>Classement : <?php classement_eval($email,21) ?></ul>
                <ul>Coefficient :</ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(21) ?></ul>
                <ul>Ecart-Type :  <?php ecart_type_eval(21)?></ul>
                <ul>Note min/ Note max : <?php min_note(21) ?> <?php echo('/') ?> <?php max_note(21) ?></ul>
            </li>

            <!-- Note de rattrapage si elle existe -->
            <li class="note">
            <?php if (rattrapage_non_vide(39,$email)==TRUE){
                $nombre=return_note($email,39);
                $note_bulletin=(return_note($email,39)+return_note($email,20)+return_note($email,21))/3;
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
    <?php if (validation_up(10,$email)==True){
             echo("<style> .UP2{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP2{background-color : #61CA6F;}</style>") ;
             }?>

        <p>UP2 : <?php echo(nom_up(2,3)) ?></p> <!-- Nom de l'UP2-->
        <li>
            <ul>Moyenne : <?php moyenne_up_eleve(10,$email) ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(2,3) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up(10) ?> </ul>
        </li>

        <li>
            <li class="note"> <!-- Note 1 de l'UP2-->
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,22) ?></ul>
                <ul>Classement : <?php classement_eval($email,22) ?></ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(22) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(22)?> </ul>
                <ul>Note min/ Note max : <?php min_note(22) ?> <?php echo('/') ?> <?php max_note(22) ?></ul>
            </li>
            
            <li class="note"> <!-- Note 2 de l'UP2-->
                <ul>Note 2</ul>
                <ul> Note : <?php note($email,23) ?></ul>
                <ul>Classement : <?php classement_eval($email,23) ?></ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(23) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(23)?> </ul>
                <ul>Note min/ Note max : <?php min_note(23) ?> <?php echo('/') ?> <?php max_note(23) ?></ul>
            </li>

            <li class="note"> <!-- Note 1 de l'UP2-->
                <ul>Note 3</ul>
                <ul> Note : <?php note($email,25) ?></ul>
                <ul>Classement : <?php classement_eval($email,25) ?></ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(25) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(25)?> </ul>
                <ul>Note min/ Note max : <?php min_note(25) ?> <?php echo('/') ?> <?php max_note(25) ?></ul>
            </li>

            <li class="note"> <!-- Note 1 de l'UP2-->
                <ul>Note 4</ul>
                <ul> Note : <?php note($email,24) ?></ul>
                <ul>Classement : <?php classement_eval($email,24) ?></ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(24) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(24)?> </ul>
                <ul>Note min/ Note max : <?php min_note(24) ?> <?php echo('/') ?> <?php max_note(24) ?></ul>
            </li>

        </li>
        <!-- Note de rattrapage si elle existe -->
        <li class="note">
            <?php if (rattrapage_non_vide(26,$email)==TRUE){
                $nombre=return_note($email,26);
                $note_bulletin=(return_note($email,26)+return_note($email,22)+return_note($email,23)+return_note($email,24)+return_note(25))/5;
                echo("<ul> Rattrapage </ul>
                <ul> Note : $nombre </ul>
                <ul> Note afficher sur le bulletin: $note_bulletin </ul>");
            } ?>
    </div>

    <!--                UP3              -->

    <div class='UP UP3'>  
        <!-- Couleur de de l'UP3-->
    <?php if (validation_up(11,$email)==True){
             echo("<style> .UP3{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP3{background-color : #61CA6F;}</style>") ;
             }?>

        <!-- Nom et donnée de l'UP3-->
        <p>UP3 : <?php echo(nom_up(3,3)) ?></p> 
        <li>
            <ul>Moyenne : <?php moyenne_up_eleve(11,$email) ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(3,3) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up(11) ?> </ul>
        </li>


        <li>
            <li class="note"> <!-- Note 1 de l'UP3-->
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,5) ?></ul>
                <ul>Classement : <?php classement_eval($email,5) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(5) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(5)?> </ul>
                <ul>Note min/ Note max : <?php min_note(5) ?> <?php echo('/') ?> <?php max_note(5) ?></ul>
            </li>


            <li class="note"><!-- Note 2 de l'UP3-->
                <ul>Note 2</ul>
                <ul> Note : <?php note($email,6) ?></ul>
                <ul>Classement : <?php classement_eval($email,6) ?></ul>
                <ul>Coefficient :</ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(6) ?></ul>
                <ul>Ecart-Type :  <?php ecart_type_eval(6)?></ul>
                <ul>Note min/ Note max : <?php min_note(6) ?> <?php echo('/') ?> <?php max_note(6) ?></ul>
            </li>

            <!-- Note de rattrapage si elle existe -->
            <li class="note">
            <?php if (rattrapage_non_vide(10,$email)==TRUE){
                $nombre=return_note($email,3);
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
    <?php if (validation_up(12,$email)==True){
             echo("<style> .UP4{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .UP4{background-color : #61CA6F;}</style>") ;
             }?>

            <!-- Nom et donnée de l'UP4-->
        <p>UP4 : <?php echo(nom_up(4,3)) ?></p>
        <li>
            <ul>Moyenne : <?php moyenne_up_eleve(12,$email) ?> </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : <?php coef_up(4,3) ?> </ul>
            <ul>Moyenne groupe : <?php moyenne_up(12) ?> </ul>
        </li>
        <li>
            <li class="note">
                <ul>Note 1</ul>
                <ul> Note : <?php note($email,7) ?></ul>
                <ul>Classement : <?php classement_eval($email,7) ?> </ul>
                <ul>Coefficient : </ul>
                <ul>Moyenne Groupe : <?php moyenne_eval(7) ?></ul>
                <ul>Ecart-Type : <?php ecart_type_eval(7)?> </ul>
                <ul>Note min/ Note max : <?php min_note(7) ?> <?php echo('/') ?> <?php max_note(7) ?></ul>
            </li>


            <!-- Note de rattrapage si elle existe-->
            <li class="note">
            <?php if (rattrapage_non_vide(11,$email)==TRUE){
                $nombre=return_note($email,3);
                echo("<ul> Rattrapage </ul>
                <ul> Note : $nombre </ul>
                <ul> Note pour valider l'UP : </ul>");
            } ?>
          </li>
        </li>
    </div>

    <!-- BOUTON RETOUR-->
    <div>
        <li><a href="./../accueil_eleve.php"  class="retour">RETOUR</a></li>
    </div>
</body>
</html>