
<!-- Page Eleve --->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil_eleve.css"> <!--css-->
</head>




<?php session_start();
    include './../barre_tete.php'; #ajout de la barre de tête
    include '../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    include('./../requete.php'); #ajout des fonctions requetes
    $email=$_SESSION['email']; #modification de l'email de l'user connecté
?>



<body>

<!-- TITRE -->
  <h1> PROMETHEE GPA</h1>



  <!-- Données de l'élève -->
    <div class="eleve">
        <p><span class='nom'>Nom</span> : <?php echo($_SESSION['nom']) ?> </p> 
        <p><span class='nom'>Prénom</span> : <?php echo($_SESSION['prenom']); ?> </p>
        <p><span class='nom'>Promo</span> : <?php echo($_SESSION['statut']); ?> </p>
        <p><span class='nom'>GPA  </span> : <?php calcul_GPA($email);?> </p>
    </div>
        
   



<!-- Onglet pour les années-->
  <div class = "ongletannees">
    <ul>
        <!-- Si l'élève a notes dans 1A, 2A... -->
        <li><a href="#1A">1A</a></li>
        <li>|</li>
        <li><a href="#2A">2A</a></li>
        <li>|</li>
        <li><a href="#3A">3A</a></li>
    </ul>
  </div>
 
  <!-- CONTENU EN 1A -->
  <div id="1A" class="contenuonglet">


    <!--   GP1   -->
    <?php $id_gp=1;?>
    <ul class="cd-accordion margin-top-lg margin-bottom-lg">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="group-1" id="group-1">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-1">
           <!-- Info du GP-->
          <span class='GP GP1'>GP 1 : <?php echo(nom_gp($id_gp));?> </span><span class='barre'>Moyenne : <?php $moyenne_gp=moyenne_gp_eleve($id_gp,$email);echo($moyenne_gp); ?> Barre :   <?php echo(barre_gp($id_gp));?> Grade : <?php $grade=grade_gp($id_gp,$email)[0]; echo($grade);?></span>
          <!-- En savoir plus -->
          <span><a class='info_GP' href="./GP/GP1.php">En savoir plus</a></span>
        </label> 
    

        <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
        <?php if (validation_gp($id_gp,$email)==True){
                echo("<style> .GP1{background-color : #FF4545;}</style>");
              }
              else{
                echo("<style> .GP1{background-color : #61CA6F;}</style>") ;
              }
        ?>  

    
        <!--Affichage UP GP1-->
        <?php 
        echo('<ul class="cd-accordion__sub cd-accordion__sub--l1">');
        $id_up_gp = id_up_gp($id_gp);
        foreach ($id_up_gp as $num_up) {
            $nom = nom_up($num_up);
            $moy_eleve = moyenne_up_eleve($num_up,$email);
            $coef = coef_up($num_up,$id_gp);
            $barre = return_barre_up($num_up,$id_gp);
            $num_up_gp = num_up_gp($num_up);
            echo("<li class='cd-accordion__item cd-accordion__item--has-children'>
                  <input class='cd-accordion__input' type='checkbox' name ='sub-group-$num_up' id='sub-group-$num_up'>
                  <label class='cd-accordion__label cd-accordion__label--icon-folder' for='sub-group-$num_up'>
                  <span class='UP UP$num_up'>UP $num_up_gp : $nom </span><span class='moyenne'>Moyenne : $moy_eleve     Coefficient : $coef   Barre : $barre </span></label> ");
       
            echo("<ul class='cd-accordion__sub cd-accordion__sub--l2'>");
                    $id_eval_up = id_eval_up($num_up);
                    foreach ($id_eval_up as $num_eval) {
                      $note=note($email, $num_eval);
                      $nom_eval=nom_eval($num_eval);
                      $moy=moyenne_eval($num_eval);
                      echo("<li class='cd-accordion__item'><span class='note'> $nom_eval : $note Moyenne Promo : $moy </span></a></li>");
                     }

            /* Rattrapages */
            echo('<li class="cd-accordion__item">');
          
            /* CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) */
            if (validation_up($num_up,$email)==FALSE){
                  echo("<style> .UP$num_up{background-color : #61CA6F ;}</style>");
                }
                else{
                  echo("<style> .UP$num_up{background-color : #FF4545 ;}</style>") ;
                }

              /*  AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE  */
              if (rattrapage_non_vide(id_rattrapage_up($num_up),$email)==TRUE){
                $note=return_note($email,id_rattrapage_up($num_up));
                echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
                } 
                 
                echo('</li>
                 </ul>
                 </li>
                 ');
              }
            echo('</ul>')  
        ?>
   </li>
</ul>













<!--GP2-->
<?php $id_gp=2; ?>
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-2" id="group-2">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-2"><span class='GP GP2'>GP 2 : <?php echo(nom_gp($id_gp));?> </span><span class="barre"> Moyenne : <?php $moyenne_gp=moyenne_gp_eleve($id_gp,$email);echo($moyenne_gp); ?> Barre :   <?php echo(barre_gp($id_gp));?> Grade : <?php $grade=grade_gp($id_gp,$email)[0]; echo($grade);?></span>
    <span><a class='info_GP' href="./GP/GP2.php">En savoir plus</a></span></label>
    
    <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
    <?php if (validation_gp($id_gp,$email)==True){
             echo("<style> .GP2{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .GP2{background-color : #61CA6F;}</style>") ;
             }?>  
    
    
            <!--Affichage UP GP2-->
            <?php 
        echo('<ul class="cd-accordion__sub cd-accordion__sub--l1">');
        $id_up_gp = id_up_gp($id_gp);
        foreach ($id_up_gp as $num_up) {
            $nom = nom_up($num_up);
            $moy_eleve = moyenne_up_eleve($num_up,$email);
            $coef = coef_up($num_up,$id_gp);
            $barre = return_barre_up($num_up,$id_gp);
            $num_up_gp = num_up_gp($num_up);
            echo("<li class='cd-accordion__item cd-accordion__item--has-children'>
                  <input class='cd-accordion__input' type='checkbox' name ='sub-group-$num_up' id='sub-group-$num_up'>
                  <label class='cd-accordion__label cd-accordion__label--icon-folder' for='sub-group-$num_up'>
                  <span class='UP UP$num_up'>UP $num_up_gp : $nom </span><span class='moyenne'>Moyenne : $moy_eleve     Coefficient : $coef   Barre : $barre </span></label> ");
       
            echo("<ul class='cd-accordion__sub cd-accordion__sub--l2'>");
                    $id_eval_up = id_eval_up($num_up);
                    foreach ($id_eval_up as $num_eval) {
                      $note=note($email, $num_eval);
                      $nom_eval=nom_eval($num_eval);
                      $moy=moyenne_eval($num_eval);
                      echo("<li class='cd-accordion__item'><span class='note'> $nom_eval : $note Moyenne Promo : $moy </span></a></li>");
                     }

            /* Rattrapages */
            echo('<li class="cd-accordion__item">');
          
            /* CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) */
            if (validation_up($num_up,$email)==FALSE){
                  echo("<style> .UP$num_up{background-color : #61CA6F ;}</style>");
                }
                else{
                  echo("<style> .UP$num_up{background-color : #FF4545 ;}</style>") ;
                }

              /*  AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE  */
              if (rattrapage_non_vide(id_rattrapage_up($num_up),$email)==TRUE){
                $note=return_note($email,id_rattrapage_up($num_up));
                echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
                } 
                 
                echo('</li>
                 </ul>
                 </li>
                 ');
              }
            echo('</ul>')  
        ?>
   </li>
</ul>














<!--    GP3     -->
<?php $id_gp=3; ?>
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-1" id="group-3">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-3"><span class='GP GP3'>GP 3 : <?php echo(nom_gp($id_gp));?> </span><span class='barre'> Moyenne : <?php $moyenne_gp=moyenne_gp_eleve($id_gp,$email);echo($moyenne_gp);?> Barre :   <?php echo(barre_gp($id_gp));?> Grade :<?php $grade=grade_gp($id_gp,$email)[0]; echo($grade);?></span>
    <span><a class='info_GP' href="./GP/GP3.php">En savoir plus</a></span></label>
    
    <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
    <?php if (validation_gp($id_gp,$email)==True){
             echo("<style> .GP3{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .GP3{background-color : #61CA6F;}</style>") ;
             }?>  
    
    

            <!--Affichage UP GP3-->
            <?php 
        echo('<ul class="cd-accordion__sub cd-accordion__sub--l1">');
        $id_up_gp = id_up_gp($id_gp);
        foreach ($id_up_gp as $num_up) {
            $nom = nom_up($num_up);
            $moy_eleve = moyenne_up_eleve($num_up,$email);
            $coef = coef_up($num_up,$id_gp);
            $barre = return_barre_up($num_up,$id_gp);
            $num_up_gp = num_up_gp($num_up);
            echo("<li class='cd-accordion__item cd-accordion__item--has-children'>
                  <input class='cd-accordion__input' type='checkbox' name ='sub-group-$num_up' id='sub-group-$num_up'>
                  <label class='cd-accordion__label cd-accordion__label--icon-folder' for='sub-group-$num_up'>
                  <span class='UP UP$num_up'>UP $num_up_gp : $nom </span><span class='moyenne'>Moyenne : $moy_eleve     Coefficient : $coef   Barre : $barre </span></label> ");
       
            echo("<ul class='cd-accordion__sub cd-accordion__sub--l2'>");
                    $id_eval_up = id_eval_up($num_up);
                    foreach ($id_eval_up as $num_eval) {
                      $note=note($email, $num_eval);
                      $nom_eval=nom_eval($num_eval);
                      $moy=moyenne_eval($num_eval);
                      echo("<li class='cd-accordion__item'><span class='note'> $nom_eval : $note Moyenne Promo : $moy </span></a></li>");
                     }

            /* Rattrapages */
            echo('<li class="cd-accordion__item">');
          
            /* CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) */
            if (validation_up($num_up,$email)==FALSE){
                  echo("<style> .UP$num_up{background-color : #61CA6F ;}</style>");
                }
                else{
                  echo("<style> .UP$num_up{background-color : #FF4545 ;}</style>") ;
                }

              /*  AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE  */
              if (rattrapage_non_vide(id_rattrapage_up($num_up),$email)==TRUE){
                $note=return_note($email,id_rattrapage_up($num_up));
                echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
                } 
                 
                echo('</li>
                 </ul>
                 </li>
                 ');
              }
            echo('</ul>')  
        ?>
   </li>
</ul>








<!--     GP4      -->
<?php $id_gp=4; ?>
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-4" id="group-4">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-4"><span class='GP GP4'>GP 4 : <?php echo(nom_gp($id_gp));?> </span><span class='barre'>Moyenne : <?php $moyenne_gp=moyenne_gp_eleve($id_gp,$email);echo($moyenne_gp); ?> Barre :   <?php echo(barre_gp($id_gp));?> Grade : <?php $grade=grade_gp($id_gp,$email)[0]; echo($grade);?></span>
    <span><a class='info_GP' href="./GP/GP4.php">En savoir plus</a></span></label>
    
    <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
    <?php if (validation_gp($id_gp,$email)==True){
             echo("<style> .GP4{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .GP4{background-color : #61CA6F;}</style>") ;
             }?>  
    
    

            <!--Affichage UP GP4-->
            <?php 
        echo('<ul class="cd-accordion__sub cd-accordion__sub--l1">');
        $id_up_gp = id_up_gp($id_gp);
        foreach ($id_up_gp as $num_up) {
            $nom = nom_up($num_up);
            $moy_eleve = moyenne_up_eleve($num_up,$email);
            $coef = coef_up($num_up,$id_gp);
            $barre = return_barre_up($num_up,$id_gp);
            $num_up_gp = num_up_gp($num_up);
            echo("<li class='cd-accordion__item cd-accordion__item--has-children'>
                  <input class='cd-accordion__input' type='checkbox' name ='sub-group-$num_up' id='sub-group-$num_up'>
                  <label class='cd-accordion__label cd-accordion__label--icon-folder' for='sub-group-$num_up'>
                  <span class='UP UP$num_up'>UP $num_up_gp : $nom </span><span class='moyenne'>Moyenne : $moy_eleve     Coefficient : $coef   Barre : $barre </span></label> ");
       
            echo("<ul class='cd-accordion__sub cd-accordion__sub--l2'>");
                    $id_eval_up = id_eval_up($num_up);
                    foreach ($id_eval_up as $num_eval) {
                      $note=note($email, $num_eval);
                      $nom_eval=nom_eval($num_eval);
                      $moy=moyenne_eval($num_eval);
                      echo("<li class='cd-accordion__item'><span class='note'> $nom_eval : $note Moyenne Promo : $moy </span></a></li>");
                     }

            /* Rattrapages */
            echo('<li class="cd-accordion__item">');
          
            /* CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) */
            if (validation_up($num_up,$email)==FALSE){
                  echo("<style> .UP$num_up{background-color : #61CA6F ;}</style>");
                }
                else{
                  echo("<style> .UP$num_up{background-color : #FF4545 ;}</style>") ;
                }

              /*  AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE  */
              if (rattrapage_non_vide(id_rattrapage_up($num_up),$email)==TRUE){
                $note=return_note($email,id_rattrapage_up($num_up));
                echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
                } 
                 
                echo('</li>
                 </ul>
                 </li>
                 ');
              }
            echo('</ul>')  
        ?>
   </li>
</ul>







<!--    GP5     -->
<?php $id_gp=5; ?>
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-1" id="group-5">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-5"><span class='GP GP5'>GP 5 : <?php echo(nom_gp($id_gp));?> </span><span class='barre'> Moyenne : <?php $moyenne_gp=moyenne_gp_eleve($id_gp,$email);echo($moyenne_gp);?> Barre :   <?php echo(barre_gp($id_gp));?> Grade :<?php $grade=grade_gp($id_gp,$email)[0]; echo($grade);?></span>
    <span><a class='info_GP' href="./GP/GP5.php">En savoir plus</a></span></label>
    
    <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
    <?php if (validation_gp($id_gp,$email)==True){
             echo("<style> .GP5{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .GP5{background-color : #61CA6F;}</style>") ;
             }?>  
    
    

            <!--Affichage UP GP5-->
            <?php 
        echo('<ul class="cd-accordion__sub cd-accordion__sub--l1">');
        $id_up_gp = id_up_gp($id_gp);
        foreach ($id_up_gp as $num_up) {
            $nom = nom_up($num_up);
            $moy_eleve = moyenne_up_eleve($num_up,$email);
            $coef = coef_up($num_up,$id_gp);
            $barre = return_barre_up($num_up,$id_gp);
            $num_up_gp = num_up_gp($num_up);
            echo("<li class='cd-accordion__item cd-accordion__item--has-children'>
                  <input class='cd-accordion__input' type='checkbox' name ='sub-group-$num_up' id='sub-group-$num_up'>
                  <label class='cd-accordion__label cd-accordion__label--icon-folder' for='sub-group-$num_up'>
                  <span class='UP UP$num_up'>UP $num_up_gp : $nom </span><span class='moyenne'>Moyenne : $moy_eleve     Coefficient : $coef   Barre : $barre </span></label> ");
       
            echo("<ul class='cd-accordion__sub cd-accordion__sub--l2'>");
                    $id_eval_up = id_eval_up($num_up);
                    foreach ($id_eval_up as $num_eval) {
                      $note=note($email, $num_eval);
                      $nom_eval=nom_eval($num_eval);
                      $moy=moyenne_eval($num_eval);
                      echo("<li class='cd-accordion__item'><span class='note'> $nom_eval : $note Moyenne Promo : $moy </span></a></li>");
                     }

            /* Rattrapages */
            echo('<li class="cd-accordion__item">');
          
            /* CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) */
            if (validation_up($num_up,$email)==FALSE){
                  echo("<style> .UP$num_up{background-color : #61CA6F ;}</style>");
                }
                else{
                  echo("<style> .UP$num_up{background-color : #FF4545 ;}</style>") ;
                }

              /*  AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE  */
              if (rattrapage_non_vide(id_rattrapage_up($num_up),$email)==TRUE){
                $note=return_note($email,id_rattrapage_up($num_up));
                echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
                } 
                 
                echo('</li>
                 </ul>
                 </li>
                 ');
              }
            echo('</ul>')  
        ?>
   </li>
</ul>







  <div id="2A" class="contenuonglet">2A vide
  <div id="3A" class="contenuonglet">3A vide




</div>

</body>
</html>
