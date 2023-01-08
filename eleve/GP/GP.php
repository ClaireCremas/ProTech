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
    include('./../../requete.php');
    $email=$_SESSION['email'];
    $id_gp=$_GET['num_gp'];
?>


<body>
    <h1> <?php echo(nom_gp($id_gp)) ?> </h1>
    <!-- Bouton simulation et Statistiques -->
    <div class='option'>
        <?php echo("<li><a href='./../Simulation/simulation_GP.php?num_gp=$id_gp' class='simulation'> Simulation </a></li>"); ?>

    </div>

    <!-- Partie UP1 -->

    <?php 
    $id_up_gp = id_up_gp($id_gp);
    $k=1;
    foreach ($id_up_gp as $id_up) {
        $nom=nom_up($id_up);
        $moyenne=moyenne_up_eleve($id_up,$email);
        $coef=coef_up($id_up);
        
        echo("<div class='UP UP$id_up'>");


            /* Couleur UP */

        if (validation_up($id_up,$email)==True){
            echo("<style> .UP$id_up{background-color : #FF4545;}</style>");}
            else{
            echo("<style> .UP$id_up{background-color : #61CA6F;}</style>") ;
            }

        echo("<p>UP$k : $nom </p>
            <li> 
            <ul>Moyenne : $moyenne </ul>
            <ul>Classement : </ul>
            <ul>Coefficient : $coef </ul>
            <ul>Moyenne groupe : </ul>
            </li>"); 
            

            $id_eval_up = id_eval_up($id_up);
            $i=1;
            foreach ($id_eval_up as $num_eval) {
            $note=note($email, $num_eval);
            $class=classement_eval($email,$num_eval);
            $coef=coef_eval($num_eval);
            $moy=moyenne_eval($num_eval);
            $ecart_type=ecart_type_eval($num_eval);
            $min=min_note($num_eval);
            $max=max_note($num_eval);
            echo("<li class='note'> 
                <ul>Note $i</ul> <ul>Note : $note </ul> <ul>Classement : $class </ul> <ul>Coefficient : $coef </ul>
                <ul>Moyenne Groupe : $moy </ul> <ul>Ecart-Type : $ecart_type </ul> <ul>Note min / Note max : $min / $max </ul>
                </li>");
                $i++;
            }

            echo('<li class="note">');
            $id_rat=id_rattrapage_up($id_up);
            if (rattrapage_non_vide($id_rat,$email)==TRUE){
                $nombre=return_note($email,$id_rat);
                $j=0;
                $note_bulletin=NULL;
                foreach ($id_eval_up as $num_eval) {
                    $note_bulletin+=return_note($email,$num_eval);
                    $j++;
                $note_bulletin+=$nombre;
                $arrondi=round($note_bulletin/($i+1),2);
                echo("<ul> Rattrapage </ul> <ul> Note : $nombre  </ul> <ul> Note affichée sur le bulletin : $arrondi </ul>");
                } 
            }
            $k++;
            echo('</li></div>');
        }       
    ?>
</div>




    <!-- BOUTON RETOUR-->
    <div>
        <li ><a href="./../accueil_eleve.php" class='retour'>RETOUR</a></li>
    </div>
</body>
</html>