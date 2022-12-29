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
                    <?php if (validation_up(1,$email)==TRUE){
                        $note_pour_valider=return_barre_up(1);
                        $new_moyenne_up=moyenne_simulation_up(1,$email,$note_pour_valider);
                        $new_moyenne_gp=moyenne_simulation_gp(1,$email,1,$note_pour_valider);
                        $new_grade=grade_gp_moyenne($new_moyenne_gp,1);
                        echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                    }
                    else{
                        echo("<ul>OUI</ul>");
                    }?>

                </li>


                <li class="note"> <!-- Note 2-->
                    <ul>GP VALIDE ? :</ul>
                    <?php if (validation_gp(1,$email)==TRUE){
                        $note_pour_valider=note_valider_gp(1,$email,1);
                        $new_moyenne_up=moyenne_simulation_up(1,$email,$note_pour_valider);
                        $new_moyenne_gp=moyenne_simulation_gp(1,$email,1,$note_pour_valider);
                        $new_grade=grade_gp_moyenne($new_moyenne_gp,1);

                        echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                    }
                    else{
                        echo("<ul>OUI</ul>");
                    }?>
                </li>

                <li class="note">
                <ul> Grade voulu :  </ul>
                <input type="text" id="grade">
                <input type="submit">
                <ul> Note à avoir :   </ul>
                <ul> Note affichée sur le bulletin : </ul>
          </li>
    </div>
    <!-- UP2 -->
    <div class='UP UP2'>
        <p>UP2 : <?php echo(nom_up(2,1)) ?></p> <!-- nom de l'up-->
            <li> <!-- Donnée de l'up-->
                <ul>Note actuelle : <?php $moyenne=moyenne_up_eleve(2,$email); echo($moyenne); ?> </ul>
            </li>

        <!-- UP valide-->
            <li>
                <li class="note"> 
                    <ul>UP VALIDE ? : </ul>
                    <?php if (validation_up(2,$email)==TRUE){
                        $note_pour_valider=return_barre_up(2);
                        $new_moyenne_up=moyenne_simulation_up(2,$email,$note_pour_valider);
                        $new_moyenne_gp=moyenne_simulation_gp(1,$email,2,$note_pour_valider);
                        $new_grade=grade_gp_moyenne($new_moyenne_gp,1);
                        echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                    }
                    else{
                        echo("<ul>OUI</ul>");
                    }?>

                </li>


                <li class="note"> <!-- Note 2-->
                    <ul>GP VALIDE ? :</ul>
                    <?php if (validation_gp(1,$email)==TRUE){
                        $note_pour_valider=note_valider_gp(1,$email,2);
                        $new_moyenne_up=moyenne_simulation_up(2,$email,$note_pour_valider);
                        $new_moyenne_gp=moyenne_simulation_gp(1,$email,2,$note_pour_valider);
                        $new_grade=grade_gp_moyenne($new_moyenne_gp,1);

                        echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                    }
                    else{
                        echo("<ul>OUI</ul>");
                    }?>
                </li>

                <li class="note">
                <ul> Grade voulu :  </ul>
                <input type="text" id="grade">
                <input type="submit">
                <ul> Note à avoir :   </ul>
                <ul> Note affichée sur le bulletin : </ul>
          </li>
    </div>

        <!-- UP3 -->
        <div class='UP UP3'>
        <p>UP3 : <?php echo(nom_up(3,1)) ?></p> <!-- nom de l'up-->
            <li> <!-- Donnée de l'up-->
                <ul>Note actuelle : <?php $moyenne=moyenne_up_eleve(3,$email); echo($moyenne); ?> </ul>
            </li>

        <!-- UP valide-->
            <li>
                <li class="note"> 
                    <ul>UP VALIDE ? : </ul>
                    <?php if (validation_up(3,$email)==TRUE){
                        $note_pour_valider=return_barre_up(3);
                        $new_moyenne_up=moyenne_simulation_up(3,$email,$note_pour_valider);
                        $new_moyenne_gp=moyenne_simulation_gp(1,$email,3,$note_pour_valider);
                        $new_grade=grade_gp_moyenne($new_moyenne_gp,1);
                        echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                    }
                    else{
                        echo("<ul>OUI</ul>");
                    }?>

                </li>


                <li class="note"> 
                    <ul>GP VALIDE ? :</ul>
                    <?php if (validation_gp(1,$email)==TRUE){
                        $note_pour_valider=note_valider_gp(1,$email,3);
                        $new_moyenne_up=moyenne_simulation_up(3,$email,$note_pour_valider);
                        $new_moyenne_gp=moyenne_simulation_gp(1,$email,3,$note_pour_valider);
                        $new_grade=grade_gp_moyenne($new_moyenne_gp,1);

                        echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                    }
                    else{
                        echo("<ul>OUI</ul>");
                    }?>
                </li>

                <li class="note">
                <ul> Grade voulu :  </ul>
                <input type="text" id="grade">
                <input type="submit">
                <ul> Note à avoir :   </ul>
                <ul> Note affichée sur le bulletin : </ul>
          </li>
    </div>

        <!-- UP4 -->
        <div class='UP UP4'>
        <p>UP2 : <?php echo(nom_up(4,1)) ?></p> <!-- nom de l'up-->
            <li> <!-- Donnée de l'up-->
                <ul>Note actuelle : <?php $moyenne=moyenne_up_eleve(4,$email); echo($moyenne); ?> </ul>
            </li>

        <!-- UP valide-->
            <li>
                <li class="note"> 
                    <ul>UP VALIDE ? : </ul>
                    <?php if (validation_up(4,$email)==TRUE){
                        $note_pour_valider=return_barre_up(4);
                        $new_moyenne_up=moyenne_simulation_up(4,$email,$note_pour_valider);
                        $new_moyenne_gp=moyenne_simulation_gp(1,$email,4,$note_pour_valider);
                        $new_grade=grade_gp_moyenne($new_moyenne_gp,1);
                        echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                    }
                    else{
                        echo("<ul>OUI</ul>");
                    }?>

                </li>


                <li class="note">
                    <ul>GP VALIDE ? :</ul>
                    <?php if (validation_gp(1,$email)==TRUE){
                        $note_pour_valider=note_valider_gp(1,$email,4);
                        $new_moyenne_up=moyenne_simulation_up(4,$email,$note_pour_valider);
                        $new_moyenne_gp=moyenne_simulation_gp(1,$email,4,$note_pour_valider);
                        $new_grade=grade_gp_moyenne($new_moyenne_gp,1);

                        echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                    }
                    else{
                        echo("<ul>OUI</ul>");
                    }?>
                </li>

                <li class="note">
                <ul> Grade voulu :  </ul>
                <input type="text" id="grade">
                <input type="submit">
                <ul> Note à avoir :   </ul>
                <ul> Note affichée sur le bulletin : </ul>
          </li>
    </div>



    <div class='retour'>
        <a href="./../GP/GP1.php"> RETOUR</a>
    </div>
</body>
</html>