<!-- Page accueil côté élèves --->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil_eleve4.css"> <!--css-->
</head>

<?php session_start();
    include './../barre_tete.php';
    include '../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    
?>

<body>
<?php $email=$_SESSION['email'] ?>
<h1> PROMETHEE GPA</h1>
    <div class="eleve">
        <p>Nom : <?php echo($_SESSION['nom']) ?> </p>
        <p>Prénom : <?php echo($_SESSION['prenom']) ?> </p>
    </div>
        
    <?php include('./../requete.php')?>

    <div class = "class">
        <ul>
            <!-- Si l'élève a notes dans 1A, 2A... -->
            <li><a href="#1A">1A</a></li>
            <li><a href="#2A">2A</a></li>
        </ul>
    </div>
  
<!-- Menu Accordeon -->

<!--GP1-->
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-1" id="group-1">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-1"><span class='GP'>GP 1 : <?php echo(nom_gp(1));?> </span><span class='barre'>Barre :   <?php echo(barre_gp(1));?> Grade :</span></label>
    <a class='info_GP'>En savoir plus</a>
    <!--UP1 GP1-->
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-1" id="sub-group-1">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-1"><span class='UP'>UP 1 : <?php echo(nom_up(1,1))?> </span><span class='moyenne'>Moyenne : <?php echo(moyenne_up(1))?>     Coefficient : <?php echo(coef_up(1,1))?>   Barre : <?php echo(barre_up(1,1))?> </span></label>

        <!--NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : <?php echo(note($email,1))?>  Moyenne : </span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>


      <!--UP2 GP1-->
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-2" id="sub-group-2">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-2"><span class='UP'>UP2 : <?php echo(nom_up(2,1))?></span><span class='moyenne'>Moyenne :    Coefficient : <?php echo(coef_up(2,1))?>  Barre : <?php echo(barre_up(2,1))?></span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    <!--UP3 GP1-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-3" id="sub-group-3">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-3"><span class='UP'>UP3 : <?php echo(nom_up(3,1))?></span><span class='moyenne'>Moyenne :    Coefficient : <?php echo(coef_up(3,1))?> Barre : <?php echo(barre_up(3,1))?></span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    <!--UP4 GP1-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-4" id="sub-group-4">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-4"><span class='UP'>UP4 : <?php echo(nom_up(4,1))?></span><span class='moyenne'>Moyenne :    Coefficient : <?php echo(coef_up(4,1))?>  Barre : <?php echo(barre_up(4,1))?></span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    </ul>
  </li>
</ul>
<!--GP2-->
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-2" id="group-2">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-2"><span class='GP'>GP 2 : <?php echo(nom_gp(2));?> </span><span class="barre">Barre :   <?php echo(barre_gp(2));?> Grade :</span></label>
    <a class='info_GP'>En savoir plus</a>
    <!--UP1 GP2-->
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-5" id="sub-group-5">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-5"><span class='UP'>UP1</span><span class='moyenne'>Moyenne :    Coefficient :  Barre :</span></label>

        <!--NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>


    <!--UP2 GP2-->
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-6" id="sub-group-6">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-6"><span class='UP'>UP2</span><span class='moyenne'>Moyenne :    Coefficient :  Barre :</span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne : </span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne : </span></a></li>
        </ul>
      </li>

    <!--UP3 GP2-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-7" id="sub-group-7">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-7"><span class='UP'>UP3</span><span class='moyenne'>Moyenne :    Coefficient :  Barre :</span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne : </span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne : </span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    <!--UP4 GP2-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-8" id="sub-group-8">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-8"><span class='UP'>UP4</span><span class='moyenne'>Moyenne :    Coefficient : Barre :</span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne : </span></a></li>
        </ul>
      </li>

    </ul>
  </li>
  
</ul> <!-- cd-accordion -->


<!--     GP3      -->
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-1" id="group-3">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-3"><span class='GP'>GP 3 : <?php echo(nom_gp(3));?> </span><span class='barre'>Barre :   <?php echo(barre_gp(3));?> Grade :</span></label>
    <a class='info_GP'>En savoir plus</a>

    <!--UP1 GP3-->
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-9" id="sub-group-9">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-9"><span class='UP'>UP 1 : <?php echo(nom_up(1,1))?> </span><span class='moyenne'>Moyenne :     Coefficient :  Barre : </span></label>

        <!--NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne : </span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>


      <!--UP2 GP3-->
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-10" id="sub-group-10">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-10"><span class='UP'>UP2</span><span class='moyenne'>Moyenne :    Coefficient : Barre : </span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    <!--UP3 GP3-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-11" id="sub-group-11">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-11"><span class='UP'>UP3</span><span class='moyenne'>Moyenne :    Coefficient : Barre :</span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    <!--UP4 GP3-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-12" id="sub-group-12">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-12"><span class='UP'>UP4</span><span class='moyenne'>Moyenne :    Coefficient : Barre :</span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    </ul>
  </li>
</ul>

<!--     GP4      -->
<ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-4" id="group-4">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-4"><span class='GP'>GP 4 : <?php echo(nom_gp(4));?> </span><span class='barre'>Barre :   <?php echo(barre_gp(4));?> Grade :</span></label>
    <a class='info_GP'>En savoir plus</a>

    <!--UP1 GP4-->
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-13" id="sub-group-13">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-13"><span class='UP'>UP 1 : <?php echo(nom_up(1,1))?> </span><span class='moyenne'>Moyenne :     Coefficient :  Barre : </span></label>

        <!--NOTES-->
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne : </span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>


      <!--UP2 GP4-->
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-14" id="sub-group-14">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-14"><span class='UP'>UP2</span><span class='moyenne'>Moyenne :    Coefficient : Barre : </span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    <!--UP3 GP4-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-15" id="sub-group-15">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-15"><span class='UP'>UP3</span><span class='moyenne'>Moyenne :    Coefficient : Barre :</span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    <!--UP4 GP4-->
    <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-16" id="sub-group-16">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-16"><span class='UP'>UP4</span><span class='moyenne'>Moyenne :    Coefficient : Barre :</span></label>
        <ul class="cd-accordion__sub cd-accordion__sub--l2">
          <li class="cd-accordion__item"><span class='note'>NOTE 1 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 2 : Moyenne :</span></a></li>
          <li class="cd-accordion__item"><span class='note'>NOTE 3 : Moyenne :</span></a></li>
        </ul>
      </li>

    </ul>
  </li>
</ul>
</body>
</html>




</body>
</html>
