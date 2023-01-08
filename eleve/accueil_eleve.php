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
  <h1>ACCUEIL ELEVE</h1>


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
  
  <?php
    $gp_suivis = gp_suivis_1a($email);
    foreach ($gp_suivis as $id_gp) {
      if($id_gp!=NULL) {
      $nom=nom_gp($id_gp);
      $moyenne_gp=moyenne_gp_eleve($id_gp,$email);
      $grade=grade_gp($id_gp,$email)[0];
      $barre=barre_gp($id_gp);

      echo("<ul class='cd-accordion margin-top-lg margin-bottom-lg'>
            <li class='cd-accordion__item cd-accordion__item--has-children'>
            <input class='cd-accordion__input' type='checkbox' name ='group-$id_gp' id='group-$id_gp'>
            <label class='cd-accordion__label cd-accordion__label--icon-folder' for='group-$id_gp'>
            <span class='GP GP$id_gp'>GP $nom </span><span class='barre'>Moyenne : $moyenne_gp Barre :$barre Grade : $grade </span>
            <span><a class='info_GP' href='./GP/GP.php?num_gp=$id_gp'>En savoir plus</a></span> </label>");

      /* COULEUR POUR SAVOIR SI ON VALIDE LE GP */
      if (validation_gp($id_gp,$email)==True){
        echo("<style> .GP$id_gp{background-color : #FF4545;}</style>");
      }
      else{
        echo("<style> .GP$id_gp{background-color : #61CA6F;}</style>") ;
      }


      /* Affichage UP */

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
      
          /* Affichage evaluations */
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
          echo('</ul>
          </li>
          </ul>'); 
    }}
  ?>
  </div>






<!-- CONTENU EN 2A -->
<div id="2A" class="contenuonglet">
  
  <?php
    $gp_suivis = gp_suivis_2a($email);
    foreach ($gp_suivis as $id_gp) {
      if($id_gp!=NULL) {
      $nom=nom_gp($id_gp);
      $moyenne_gp=moyenne_gp_eleve($id_gp,$email);
      $grade=grade_gp($id_gp,$email)[0];
      $barre=barre_gp($id_gp);

      echo("<ul class='cd-accordion margin-top-lg margin-bottom-lg'>
            <li class='cd-accordion__item cd-accordion__item--has-children'>
            <input class='cd-accordion__input' type='checkbox' name ='group-$id_gp' id='group-$id_gp'>
            <label class='cd-accordion__label cd-accordion__label--icon-folder' for='group-$id_gp'>
            <span class='GP GP$id_gp'>GP $nom </span><span class='barre'>Moyenne : $moyenne_gp Barre :$barre Grade : $grade </span>
            <span><a class='info_GP' href='./GP/GP.php?num_gp=$id_gp'>En savoir plus</a></span> </label>");

      /* COULEUR POUR SAVOIR SI ON VALIDE LE GP */
      if (validation_gp($id_gp,$email)==True){
        echo("<style> .GP$id_gp{background-color : #FF4545;}</style>");
      }
      else{
        echo("<style> .GP$id_gp{background-color : #61CA6F;}</style>") ;
      }


      /* Affichage UP */

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
      

          /* Affichage evaluations */
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
          echo('</ul>
          </li>
          </ul>'); 
    }}
  ?>
  </div>













<!-- CONTENU EN 3A -->
<div id="3A" class="contenuonglet">
  
  <?php
    $gp_suivis = gp_suivis_3a($email);
    foreach ($gp_suivis as $id_gp) {
      if($id_gp!=NULL) {
      $nom=nom_gp($id_gp);
      $moyenne_gp=moyenne_gp_eleve($id_gp,$email);
      $grade=grade_gp($id_gp,$email)[0];
      $barre=barre_gp($id_gp);

      echo("<ul class='cd-accordion margin-top-lg margin-bottom-lg'>
            <li class='cd-accordion__item cd-accordion__item--has-children'>
            <input class='cd-accordion__input' type='checkbox' name ='group-$id_gp' id='group-$id_gp'>
            <label class='cd-accordion__label cd-accordion__label--icon-folder' for='group-$id_gp'>
            <span class='GP GP$id_gp'>GP $nom </span><span class='barre'>Moyenne : $moyenne_gp Barre :$barre Grade : $grade </span>
            <span><a class='info_GP' href='./GP/GP.php?num_gp=$id_gp'>En savoir plus</a></span> </label>");

      /* COULEUR POUR SAVOIR SI ON VALIDE LE GP */
      if (validation_gp($id_gp,$email)==True){
        echo("<style> .GP$id_gp{background-color : #FF4545;}</style>");
      }
      else{
        echo("<style> .GP$id_gp{background-color : #61CA6F;}</style>") ;
      }


      /* Affichage UP */

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
      

            /* Affichage evaluations */
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
          echo('</ul>
          </li>
          </ul>'); 
    }}
  ?>
  </div>


</div>

</body>
</html>
