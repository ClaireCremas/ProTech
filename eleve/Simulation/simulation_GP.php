<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="simulation_GP.css">
    <?php echo("<title>Simulation GP</title>"); ?>
</head>
<body>


<?php session_start();
    include './../../barre_tete.php'; #ajout de l'en-tête
    include './../../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    include('./../../requete.php'); #Ajout de la feuille des requete
    $email=$_SESSION['email']; #Mise à jour de l'email de l'utilisateur connecté
    $id_gp=$_GET['num_gp']; #ICI c'est la simulation du GP1
    $nom_gp=nom_gp($id_gp);



    /* TITRE DE LA PAGE */
    echo("<h1>SIMULATION GP : $nom_gp </h1>");

    $id_up_gp = id_up_gp($id_gp);
    $i=1;
    foreach($id_up_gp as $id_up) {
        $nom=nom_up($id_up,$id_gp);
        $moyenne=moyenne_up_eleve($id_up,$email);

        echo("<div class='UP UP$id_up'>
            <p>UP$i : $nom </p> 
            <li> <ul>Note actuelle : $moyenne </ul></li>");

        echo("<li class='note'> 
            <ul>UP VALIDE ? : </ul>");
            if (validation_up($id_up,$email)==TRUE){ #si l'up n'est pas validé on affiche
                $note_pour_valider=return_barre_up($id_up);
                $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);
                echo("<ul>NON </ul>
                    <ul>Note pour valider : $note_pour_valider </ul>
                    <ul>Nouvelle moyenne : $new_moyenne_up</ul>
                    <ul>Nouveau Grade : $new_grade </ul>");
                }
                else{
                    echo("<ul>OUI</ul>"); #l'up est validé
                }

        echo("</li>");



        /* GP valide */
        echo("<li class='note'>
            <ul>GP VALIDE ? :</ul>");
            if (validation_gp($id_gp,$email)==TRUE){
                $note_pour_valider=note_valider_gp($id_gp,$email,$id_up);
                if ($note_pour_valider>20){
                    echo("<ul>Impossible de valider avec cet UP</ul>");
                }
                else{
                    $new_moyenne_up=moyenne_simulation_up($id_up,$email,$note_pour_valider);
                    $new_moyenne_gp=moyenne_simulation_gp($id_gp,$email,$id_up,$note_pour_valider);
                    $new_grade=grade_gp_moyenne($new_moyenne_gp,$id_gp);
    
                    echo("<ul>NON </ul>
                        <ul> Note pour valider : $note_pour_valider </ul>
                        <ul>Nouvelle moyenne : $new_moyenne_up </ul>
                        <ul>Nouveau Grade : $new_grade </ul>");
                }
                }
                else{
                    echo("<ul>OUI</ul>");
                }
        echo("</li>");


        /* Simulation pour avoir le grade demandé */
        echo("<li class='note'>
            <ul> Grade voulu : 
            <form method='post'>
            <input type='text' id='grade' name='grade'>
            <input type='submit' name='grade_send$id_up' id='grade_send$id_up'>
            </form>
            </ul>");

            if(isset($_POST["grade_send$id_up"])){
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
        echo("</li></div>");
        $i++;
    } ?>


    <div class='retour'>
        <?php echo("<a href='./../GP/GP.php?num_gp=$id_gp'> RETOUR</a>"); ?>
    </div>


</body>
</html>