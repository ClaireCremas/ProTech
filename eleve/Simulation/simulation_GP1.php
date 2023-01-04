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
    include './../../barre_tete.php'; #ajout de l'en-tête
    include './../../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    include('./../../requete.php'); #Ajout de la feuille des requete
    $email=$_SESSION['email']; #Mise à jour de l'email de l'utilisateur connecté
    $id_gp=1; #ICI c'est la simulation du GP1
?>





    <!-- TITRE DE LA PAGE -->
    <h1>SIMULATION GP1 : <?php echo(nom_gp($id_gp)) ?> </h1> 





    <!-- UP1 -->
    <?php $id_up=1; #on modifie l'identifiant ?>

    <div class='UP UP1'>
        <p> UP1 : <?php echo(nom_up($id_up,$id_gp)) ?> </p> <!-- nom de l'up-->
            
        <li> <!-- Donnée de l'up-->
                <ul>Note actuelle : <?php $moyenne=moyenne_up_eleve($id_up,$email); echo($moyenne); ?> </ul>
        </li>

        <!-- Simulation -->
        <li>


            <!-- UP valide -->
            <li class="note"> 
                <ul>UP VALIDE ? : </ul>
                <?php if (validation_up($id_up,$email)==TRUE){ #si l'up n'est pas validé on affiche
                    $note_pour_valider=return_barre_up($id_up);
                    $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);
                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>"); #l'up est validé
                }?>

            </li>

            <!-- GP valide -->
            <li class="note"> 
                <ul>GP VALIDE ? :</ul>

                <?php if (validation_gp($id_gp,$email)==TRUE){ #Si le gp n'est pas validé on affiche :
                    $note_pour_valider=note_valider_gp($id_gp,$email,$id_up);
                    $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);

                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>"); #le GP est validé
                }?>
            </li>


            <!-- Simulation pour avoir le grade demandé-->
            <li class="note">
                <ul> Grade voulu : 
                    <form method="post">
                        <input type="text" id="grade" name="grade">
                        <input type='submit' name='grade_send1' id='grade_send1'>
                    </form>
                </ul>

                <?php if(isset($_POST['grade_send1'])){
                    $grade_voulu=$_POST['grade'];
                    $note_pour_grade=note_pour_avoir_grade($id_gp,$email,$id_up,$grade_voulu);
                    if($grade_voulu=='A+'){
                        echo("<ul> Note à avoir : $note_pour_grade </ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='A'){
                        echo("<ul> Note à avoir : $note_pour_grade</ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='B'){
                        echo("<ul> Note à avoir : $note_pour_grade</ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='C'){
                        echo("<ul> Note à avoir : </ul>
                        <ul> Note affichée sur le bulletin : $note_pour_grade </ul>");
                    }
                    else{
                        echo("ce grade n'existe pas");
                    }
                }
                ?>
            </li>
        </li>
    </div>






    <!-- UP2 -->
    <div class='UP UP2'>
        <?php $id_up=2; #on modifie l'identifiant?>
        <p>UP2 : <?php echo(nom_up($id_up,$id_gp)) ?></p> <!-- nom de l'up-->
        <li> <!-- Donnée de l'up-->
            <ul>Note actuelle : <?php $moyenne=moyenne_up_eleve($id_up,$email); echo($moyenne); ?> </ul>
        </li>

        <!-- UP valide-->
        <li>
            <li class="note"> 
                <ul>UP VALIDE ? : </ul>
                <?php if (validation_up($id_up,$email)==TRUE){ 
                    $note_pour_valider=return_barre_up($id_up);
                    $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);
                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>");
                }?>
            </li>

            <!-- GP valide-->
            <li class="note"> 
                <ul>GP VALIDE ? :</ul>
                <?php if (validation_gp($id_gp,$email)==TRUE){#si le gp n'est pas validé 
                    $note_pour_valider=note_valider_gp($id_gp,$email,$id_up);
                    $new_moyenne_up=moyenne_simulation_up(2,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);

                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>");
                }?>
            </li>


            <!-- Simulation pour avoir le grade demandé-->
            <li class="note">
                <ul> Grade voulu : 
                    <form method="post">
                        <input type="text" id="grade" name="grade">
                        <input type='submit' name='grade_send2' id='grade_send2'>
                    </form>
                </ul>

                <?php if(isset($_POST['grade_send2'])){
                    $grade_voulu=$_POST['grade'];
                    $note_pour_grade=note_pour_avoir_grade($id_gp,$email,$id_up,$grade_voulu);
                    if($grade_voulu=='A+'){
                        echo("<ul> Note à avoir : $note_pour_grade </ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='A'){
                        echo("<ul> Note à avoir : $note_pour_grade</ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='B'){
                        echo("<ul> Note à avoir : $note_pour_grade</ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='C'){
                        echo("<ul> Note à avoir : </ul>
                        <ul> Note affichée sur le bulletin : $note_pour_grade </ul>");
                    }
                    else{
                        echo("ce grade n'existe pas");
                    }
                }
                ?>

        </li>
    </div>






    <!-- UP3 -->
        <div class='UP UP3'>
        <?php $id_up=3;?>
        <p>UP3 : <?php echo(nom_up($id_up,$id_gp)) ?></p> <!-- nom de l'up-->
            <li> <!-- Donnée de l'up-->
                <ul>Note actuelle : <?php $moyenne=moyenne_up_eleve($id_up,$email); echo($moyenne); ?> </ul>
            </li>

        <!-- UP valide-->
        <li>
            <li class="note"> 
                <ul>UP VALIDE ? : </ul>
                <?php if (validation_up($id_up,$email)==TRUE){
                    $note_pour_valider=return_barre_up($id_up);
                    $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);
                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>");
                }?>
            </li>

            <!-- GP Valide -->
            <li class="note"> 
                <ul>GP VALIDE ? :</ul>
                <?php if (validation_gp($id_gp,$email)==TRUE){
                    $note_pour_valider=note_valider_gp($id_gp,$email,$id_up);
                    $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);

                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>");
                }?>
            </li>


                      <!-- Simulation pour avoir le grade demandé-->
                      <li class="note">
                <ul> Grade voulu : 
                    <form method="post">
                        <input type="text" id="grade" name="grade">
                        <input type='submit' name='grade_send3' id='grade_send3'>
                    </form>
                </ul>

                <?php if(isset($_POST['grade_send3'])){
                    $grade_voulu=$_POST['grade'];
                    $note_pour_grade=note_pour_avoir_grade($id_gp,$email,$id_up,$grade_voulu);
                    if($grade_voulu=='A+'){
                        echo("<ul> Note à avoir : $note_pour_grade </ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='A'){
                        echo("<ul> Note à avoir : $note_pour_grade</ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='B'){
                        echo("<ul> Note à avoir : $note_pour_grade</ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='C'){
                        echo("<ul> Note à avoir : </ul>
                        <ul> Note affichée sur le bulletin : $note_pour_grade </ul>");
                    }
                    else{
                        echo("ce grade n'existe pas");
                    }
                }
                ?>
            </li>

        </li>
    </div>







    <!-- UP4 -->
        <div class='UP UP4'>
        <?php $id_up=4; ?>
        <p>UP4 : <?php echo(nom_up($id_up,$id_gp)) ?></p> <!-- nom de l'up-->
        <li> <!-- Donnée de l'up-->
            <ul>Note actuelle : <?php $moyenne=moyenne_up_eleve($id_up,$email); echo($moyenne); ?> </ul>
        </li>

        <!--Différentes simulations-->
        <li>
            <!-- UP valide-->
            <li class="note"> 
                <ul>UP VALIDE ? : </ul>
                <?php if (validation_up($id_up,$email)==TRUE){
                    $note_pour_valider=return_barre_up($id_up);
                    $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);
                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>");
                }?>

            </li>

            
            <!-- GP valide -->
            <li class="note">
                <ul>GP VALIDE ? :</ul>
                <?php if (validation_gp($id_gp,$email)==TRUE){
                    $note_pour_valider=note_valider_gp($id_gp,$email,$id_up);
                    $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);

                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>");
                }?>
            </li>

                        <!-- Simulation pour avoir le grade demandé-->
                        <li class="note">
                <ul> Grade voulu : 
                    <form method="post">
                        <input type="text" id="grade" name="grade">
                        <input type='submit' name='grade_send4' id='grade_send4'>
                    </form>
                </ul>

                <?php if(isset($_POST['grade_send4'])){
                    $grade_voulu=$_POST['grade'];
                    $note_pour_grade=note_pour_avoir_grade($id_gp,$email,$id_up,$grade_voulu);
                    if($grade_voulu=='A+'){
                        echo("<ul> Note à avoir : $note_pour_grade </ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='A'){
                        echo("<ul> Note à avoir : $note_pour_grade</ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='B'){
                        echo("<ul> Note à avoir : $note_pour_grade</ul>
                        <ul> Note affichée sur le bulletin : </ul>");
                    }
                    elseif($grade_voulu=='C'){
                        echo("<ul> Note à avoir : </ul>
                        <ul> Note affichée sur le bulletin : $note_pour_grade </ul>");
                    }
                    else{
                        echo("ce grade n'existe pas");
                    }
                }
                ?>
            </li>
        </li>
    </div>



    <div class='retour'>
        <a href="./../GP/GP1.php"> RETOUR</a>
    </div>


</body>
</html>