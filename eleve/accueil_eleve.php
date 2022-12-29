<!-- Page dieu --->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil_eleve.css"> <!--css-->
</head>

<?php session_start();
    include './../barre_tete.php';
    include '../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    
?>
 <?php include('./../requete.php')?>
<body>
<?php $email=$_SESSION['email'] ?>
<h1> PROMETHEE GPA</h1>
    <div class="eleve">
        <p><span class='nom'>Nom</span> : <?php echo($_SESSION['nom']) ?> </p>
        <p><span class='nom'>Prénom</span> : <?php echo($_SESSION['prenom']); ?> </p>
        <p> <span class='nom'>Promo</span> : <?php echo($_SESSION['statut']); ?> </p>
        <p><span class='nom'>GPA  </span> : <?php calcul_GPA($email);?> </p>
    </div>
        
   

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
 

<div id="1A" class="contenuonglet">
<!-- Menu Accordeon -->

<!--GP1-->
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-1" id="group-1">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-1"><span class='GP GP1'>GP 1 : <?php echo(nom_gp(1));?> </span><span class='barre'>Moyenne : <?php $moyenne_gp=moyenne_gp_eleve(1,$email);echo($moyenne_gp); ?> Barre :   <?php echo(barre_gp(1));?> Grade : <?php $grade=grade_gp(1,$email)[0]; echo($grade);?></span>
    <span><a class='info_GP' href="./GP/GP1.php">En savoir plus</a></span></label>
    
    <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
    <?php if (validation_gp(1,$email)==True){
             echo("<style> .GP1{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .GP1{background-color : #61CA6F;}</style>") ;
             }?>  


    
    <!--UP1 GP1-->
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-1" id="sub-group-1">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-1"><span class='UP UP1'>UP 1 : <?php echo(nom_up(1,1))?> </span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(1,$email))?>     Coefficient : <?php echo(coef_up(1,1))?>   Barre : <?php echo(barre_up(1,1))?> </span></label>

        <!--NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,1)); ?>  Moyenne Promo : <?php echo(moyenne_eval(1))?> </span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : <?php echo(note($email,2))?> Moyenne Promo: <?php echo(moyenne_eval(2))?></span></a></li>
          <!-- RATTRAPAGE-->
          <li class="cd-accordion__item">
            <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
            <?php if (validation_up(1,$email)==FALSE){
             echo("<style> .UP1{background-color : #61CA6F ;}</style>");}
             else{
              echo("<style> .UP1{background-color : #FF4545 ;}</style>") ;
             }?>  
            <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
            <?php if (rattrapage_non_vide(3,$email)==TRUE){
              $note=return_note($email,3);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>

          </li>
        </ul>
      </li>


      <!--UP2 GP1-->
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-2" id="sub-group-2">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-2"><span class='UP UP2'>UP2 : <?php echo(nom_up(2,1))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(2,$email))?>   Coefficient : <?php echo(coef_up(2,1))?>  Barre : <?php echo(barre_up(2,1))?></span></label>
        <!-- NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 :<?php echo(note($email,4))?> Moyenne Promo : <?php echo(moyenne_eval(4))?></span></a></li>
          <li class="cd-accordion__item">
            <!-- COULEUR VALIDATION OU NON -->
            <?php if (validation_up(2,$email)==FALSE){
              echo("<style> .UP2{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP2{background-color : #FF4545 ;}</style>") ;
             }?>  

             <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
            <?php if (rattrapage_non_vide(9,$email)==TRUE){
              $note=return_note($email,9);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>

          </li>
        </ul>
      </li>

    <!--UP3 GP1-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-3" id="sub-group-3">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-3"><span class='UP UP3'>UP3 : <?php echo(nom_up(3,1))?></span><span class='moyenne'>Moyenne :  <?php echo(moyenne_up_eleve(3,$email))?>  Coefficient : <?php echo(coef_up(3,1))?> Barre : <?php echo(barre_up(3,1))?></span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,5))?> Moyenne Promo: <?php echo(moyenne_eval(5))?></span></span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : <?php echo(note($email,6))?> Moyenne Promo: <?php echo(moyenne_eval(6))?></span></span></a></li>
          <li class="cd-accordion__item">
          <?php if (validation_up(3,$email)==FALSE){
              echo("<style> .UP3{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP3{background-color : #FF4545 ;}</style>") ;
             }?>
          </li>
          <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
          <?php if (rattrapage_non_vide(10,$email)==TRUE){
              $note=return_note($email,10);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            
            } ?>

        </ul>
      </li>

    <!--UP4 GP1-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-4" id="sub-group-4">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-4"><span class='UP UP4'>UP4 : <?php echo(nom_up(4,1))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(4,$email))?>   Coefficient : <?php echo(coef_up(4,1))?>  Barre : <?php echo(barre_up(4,1))?></span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 :<?php echo(note($email,7))?> Moyenne Promo: <?php echo(moyenne_eval(7))?></span></span></a></li>
          <?php if (validation_up(4,$email)==FALSE){
              echo("<style> .UP4{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP4{background-color : #FF4545 ;}</style>") ;
             }?>
        </ul>
        <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
        <?php if (rattrapage_non_vide(11,$email)==TRUE){
          $note=return_note($email,11);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>


      </li>

    </ul>
  </li>
</ul>
<!--GP2-->
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-2" id="group-2">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-2"><span class='GP GP2'>GP 2 : <?php echo(nom_gp(2));?> </span><span class="barre"> Moyenne : <?php $moyenne_gp=moyenne_gp_eleve(2,$email);echo($moyenne_gp); ?> Barre :   <?php echo(barre_gp(2));?> Grade : <?php $grade=grade_gp(2,$email)[0]; echo($grade);?></span>
    <span><a class='info_GP' href="./GP/GP2.php">En savoir plus</a></span></label>
    
    <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
    <?php if (validation_gp(2,$email)==True){
             echo("<style> .GP2{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .GP2{background-color : #61CA6F;}</style>") ;
             }?>  
    
    
    <!--UP1 GP2-->
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-5" id="sub-group-5">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-5"><span class='UP UP5'>UP1 : <?php echo(nom_up(1,2))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(5,$email))?>    Coefficient : <?php echo(coef_up(1,2))?>  Barre : <?php echo(barre_up(1,2))?></span></label>

        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(5,$email)==FALSE){
              echo("<style> .UP5{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP5{background-color : #FF4545 ;}</style>") ;
             }?> 


        <!--NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,12))?> Moyenne Promo: <?php echo(moyenne_eval(12))?></span></a></li>
        <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
          <?php if (rattrapage_non_vide(13,$email)==TRUE){
              $note=return_note($email,13);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>
        
        </ul>

        

      </li>
        
      

    <!--UP2 GP2-->
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-6" id="sub-group-6">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-6"><span class='UP UP6'>UP2 : <?php echo(nom_up(2,2))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(6,$email))?>   Coefficient : <?php echo(coef_up(2,2))?>  Barre : <?php echo(barre_up(2,2))?></span></label>
        
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(6,$email)==FALSE){
              echo("<style> .UP6{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP6{background-color : #FF4545 ;}</style>") ;
             }?> 
        
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,14))?> Moyenne Promo: <?php echo(moyenne_eval(14))?></span></a></li>

          <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
          <?php if (rattrapage_non_vide(15,$email)==TRUE){
            $note=return_note($email,15);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>
        </ul>

        

      </li>

    <!--UP3 GP2-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-7" id="sub-group-7">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-7"><span class='UP UP7'>UP3 : <?php echo(nom_up(3,2))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(7,$email))?>   Coefficient : <?php echo(coef_up(3,2))?>  Barre : <?php echo(barre_up(3,2))?></span></label>
        
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(7,$email)==FALSE){
              echo("<style> .UP7{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP7{background-color : #FF4545 ;}</style>") ;
             }?>
        
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,16))?> Moyenne Promo: <?php echo(moyenne_eval(16))?> </span></a></li>
             <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
          <?php if (rattrapage_non_vide(17,$email)==TRUE){
            $note=return_note($email,17);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>
        </ul>

        

      </li>

    <!--UP4 GP2-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-8" id="sub-group-8">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-8"><span class='UP UP8'>UP4 : <?php echo(nom_up(4,2))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(8,$email))?>   Coefficient :<?php echo(coef_up(4,2))?>  Barre : <?php echo(barre_up(4,2))?></span></label>
        
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(8,$email)==FALSE){
              echo("<style> .UP8{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP8{background-color : #FF4545 ;}</style>") ;
             }?> 
        
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,18))?> Moyenne Promo: <?php echo(moyenne_eval(18))?></span></a></li>
             <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
          <?php if (rattrapage_non_vide(19,$email)==TRUE){
              $note=return_note($email,19);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>
        </ul>

        

      </li>

    </ul>
  </li>
  
</ul> <!-- cd-accordion -->


<!--    GP3     -->
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-1" id="group-3">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-3"><span class='GP GP3'>GP 3 : <?php echo(nom_gp(3));?> </span><span class='barre'> Moyenne : <?php $moyenne_gp=moyenne_gp_eleve(3,$email);echo($moyenne_gp);?> Barre :   <?php echo(barre_gp(3));?> Grade :<?php $grade=grade_gp(3,$email)[0]; echo($grade);?></span>
    <span><a class='info_GP' href="./GP/GP3.php">En savoir plus</a></span></label>
    
    <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
    <?php if (validation_gp(3,$email)==True){
             echo("<style> .GP3{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .GP3{background-color : #61CA6F;}</style>") ;
             }?>  
    
    

    <!--UP1 GP3-->
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-9" id="sub-group-9">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-9"><span class='UP UP9'>UP 1 : <?php echo(nom_up(1,3))?> </span><span class='moyenne'>Moyenne :  <?php echo(moyenne_up_eleve(9,$email))?>   Coefficient : <?php echo(coef_up(1,3))?>   Barre : <?php echo(barre_up(1,3))?> </span></label>

        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(9,$email)==FALSE){
              echo("<style> .UP9{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP9{background-color : #FF4545 ;}</style>") ;
             }?>


        <!--NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne Promo: </span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne Promo:</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne Promo:</span></a></li>
        </ul>
      </li>


      <!--UP2 GP3-->
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-10" id="sub-group-10">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-10"><span class='UP UP10'>UP2 : <?php echo(nom_up(2,3))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(10,$email))?>   Coefficient : <?php echo(coef_up(2,3))?>  Barre : <?php echo(barre_up(2,3))?></span></label>
        
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(10,$email)==FALSE){
              echo("<style> .UP10{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP10{background-color : #FF4545 ;}</style>") ;
             }?>
        
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne Promo:</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne Promo:</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne Promo:</span></a></li>
        </ul>
      </li>

    <!--UP3 GP3-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-11" id="sub-group-11">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-11"><span class='UP UP11'>UP3 : <?php echo(nom_up(3,3))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(11,$email))?>   Coefficient : <?php echo(coef_up(3,3))?> Barre : <?php echo(barre_up(3,3))?></span></label>
        
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(11,$email)==FALSE){
              echo("<style> .UP11{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP11{background-color : #FF4545 ;}</style>") ;
             }?> 

        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne Promo:</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne Promo:</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne Promo:</span></a></li>
        </ul>
      </li>

    <!--UP4 GP3-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-12" id="sub-group-12">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-12"><span class='UP UP12'>UP4 : <?php echo(nom_up(4,3))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(12,$email))?>   Coefficient : <?php echo(coef_up(4,3))?>  Barre : <?php echo(barre_up(4,3))?></span></label>
        
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(12,$email)==FALSE){
              echo("<style> .UP12{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP12{background-color : #FF4545 ;}</style>") ;
             }?>

        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne Promo:</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne Promo:</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne Promo:</span></a></li>
        </ul>
      </li>

    </ul>
  </li>
</ul>

<!--     GP4      -->
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-4" id="group-4">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-4"><span class='GP GP4'>GP 4 : <?php echo(nom_gp(4));?> </span><span class='barre'>Moyenne : <?php $moyenne_gp=moyenne_gp_eleve(4,$email);echo($moyenne_gp); ?> Barre :   <?php echo(barre_gp(4));?> Grade : <?php $grade=grade_gp(4,$email)[0]; echo($grade);?></span>
    <span><a class='info_GP' href="./GP/GP4.php">En savoir plus</a></span></label>
    
    <!-- COULEUR POUR SAVOIR SI ON VALIDE LE GP -->
    <?php if (validation_gp(4,$email)==True){
             echo("<style> .GP4{background-color : #FF4545;}</style>");}
             else{
              echo("<style> .GP4{background-color : #61CA6F;}</style>") ;
             }?>  
    
    

    <!--UP1 GP4-->
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-13" id="sub-group-13">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-13"><span class='UP UP13'>UP 1 : <?php echo(nom_up(1,4))?> </span><span class='moyenne'>Moyenne :  <?php echo(moyenne_up_eleve(13,$email))?>   Coefficient : <?php echo(coef_up(1,4))?>  Barre : <?php echo(barre_up(1,4))?> </span></label>
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(13,$email)==FALSE){
              echo("<style> .UP13{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP13{background-color : #FF4545 ;}</style>") ;
             }?> 

        <!--NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,41))?> Moyenne Promo:<?php echo(moyenne_eval(41))?> </span></a></li>
             <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
            <?php if (rattrapage_non_vide(45,$email)==TRUE){
              $note=return_note($email,45);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>
        </ul>
      </li>


      <!--UP2 GP4-->
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-14" id="sub-group-14">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-14"><span class='UP UP14'>UP2 : <?php echo(nom_up(2,4))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(14,$email))?>   Coefficient : <?php echo(coef_up(2,4))?>  Barre : <?php echo(barre_up(2,4))?></span></label>
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(14,$email)==FALSE){
              echo("<style> .UP14{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP14{background-color : #FF4545 ;}</style>") ;
             }?> 
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,40))?> Moyenne Promo: <?php echo(moyenne_eval(40))?></span></a></li>
             <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
            <?php if (rattrapage_non_vide(44,$email)==TRUE){
              $note=return_note($email,44);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>
        </ul>
      </li>

    <!--UP3 GP4-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-15" id="sub-group-15">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-15"><span class='UP UP15'>UP3 : <?php echo(nom_up(3,4))?></span><span class='moyenne'>Moyenne : <?php echo(moyenne_up_eleve(15,$email))?>   Coefficient : <?php echo(coef_up(3,4))?>  Barre : <?php echo(barre_up(3,4))?></span></label>
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(15,$email)==FALSE){
              echo("<style> .UP15{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP15{background-color : #FF4545 ;}</style>") ;
             }?> 
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,42))?> Moyenne Promo: <?php echo(moyenne_eval(42))?></span></a></li>
             <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
            <?php if (rattrapage_non_vide(46,$email)==TRUE){
              $note=return_note($email,46);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>
        </ul>
      </li>

    <!--UP4 GP4-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-16" id="sub-group-16">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-16"><span class='UP UP16'>UP4 : <?php echo(nom_up(4,4))?></span><span class='moyenne'>Moyenne :  <?php echo(moyenne_up_eleve(16,$email))?>  Coefficient : <?php echo(coef_up(4,4))?>  Barre : <?php echo(barre_up(4,4))?></span></label>
        <!-- CHANGE COULEUR SI IL FAUT RATTRAPAGE (NON VALIDATION UP) -->
        <?php if (validation_up(16,$email)==FALSE){
              echo("<style> .UP16{background-color : #61CA6F ;}</style>");}
              else{
              echo("<style> .UP16{background-color : #FF4545 ;}</style>") ;
             }?> 
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,43))?> Moyenne Promo: <?php echo(moyenne_eval(43))?></span></a></li>
             <!-- AFFICHE LE RATTRAPGE SI LE RATTRAPGE N'EST PAS VIDE-->
            <?php if (rattrapage_non_vide(47,$email)==TRUE){
              $note=return_note($email,47);
              echo("<li class='cd-accordion__item'><span class='note'> Note Rattrapage : $note </span></li>");
            } ?>
        </ul>
      </li>

    </ul>
  </li>
</ul>
</div>

<div id="2A" class="contenuonglet">2A vide</div>
<div id="3A" class="contenuonglet">3A vide</div>

</body>
</html>
