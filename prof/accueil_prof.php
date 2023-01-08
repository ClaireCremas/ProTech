<!-- Page accueil côté élèves --->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prof.css"> <!--css-->
</head>

<?php session_start();
    include './../barre_tete_prof.php';
    include '../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    global $gp_note;
    global $up_note;
?>

<?php include('./../requete.php')?>

<body>
<?php $email=$_SESSION['email'] ?>

<h1>LISTE DES MATIERES</h1>
    <div class="professeur">
        <p><span class='nom'>Nom</span> : <?php echo($_SESSION['nom']) ?> </p>
        <p><span class='nom'>Prénom</span> : <?php echo($_SESSION['prenom']) ?> </p>
        <p><span class='nom'>Rôle</span> : <?php  ?> </p>
    </div>
        
   


<!--Onglets-->
<div class = "cours">
    <ul>
        <!--Affichage des différents type de cours par onglets-->
        <li><a href="#TC1A">Tronc commun 1A</a></li>
        <li>|</li>
        <li><a href="#TC2A">Tronc commun 2A</a></li>
        <li>|</li>
        <li><a href="#majeure">Majeures</a></li>
        <li>|</li>
        <li><a href="#TB1">Toolbox 1</a></li>
        <li>|</li>
        <li><a href="#TB2">Toolbox 2</a></li>
        <li>|</li>
        <li><a href="#TB3">Toolbox 3</a></li>
        <li>|</li>
        <li><a href="#defi">Défis sociétaux</a></li>
    </ul>
</div>


<?php 
$liste_types_gp = ['TC1A', 'TC2A', 'majeure', 'TB1', 'TB2', 'TB3', 'defi'];
foreach($liste_types_gp as $nom_type_gp) {

  echo("<div id='$nom_type_gp' class='contenucours'>");
  
  /* Affichage des GP*/
  $id_type_gp = id_type_gp($nom_type_gp);
  foreach ($id_type_gp as $id_gp) {
    $nom=nom_gp($id_gp);
    $barre=barre_gp($id_gp);
    echo("<ul class='cd-accordion margin-top-lg margin-bottom-lg'>
      <li class='cd-accordion__item cd-accordion__item--has-children'>
      <input class='cd-accordion__input' type='checkbox' name ='group-$id_gp' id='group-$id_gp'>
      <label class='cd-accordion__label cd-accordion__label--icon-folder' for='group-$id_gp'>  <span class='GP GP$id_gp'> $nom </span><span class='barre'> Barre : $barre </span></label>");
      include('./../barresGP.php');
    /* LISTES ELEVES GP */ 
    echo('<ul>');
    $req = $db->query('SELECT nom, url_fichier FROM listes WHERE nom="X_ICM2021.xlsx"');
    while($data = $req->fetch()){
        echo ('<a href="'.$data['url_fichier'].'">Télécharger la liste des élèves du GP'.'</a>');
    }
    echo('</ul>'); 
      
    /*Affichage des UP*/
    echo('<ul class="cd-accordion__sub cd-accordion__sub--l1">'); 
      $id_up_gp = id_up_gp($id_gp);
      foreach ($id_up_gp as $num_up) {
            $nom = nom_up($num_up);
            $moy_eleve = moyenne_up_eleve($num_up,$email);
            $coef = coef_up($num_up,$id_gp);
            $barre = return_barre_up($num_up,$id_gp);
            $num_up_gp = num_up_gp($num_up);
            

            /*Affichage des Eval*/
            echo("<li class='cd-accordion__item cd-accordion__item--has-children'>
                    <input class='cd-accordion__input' type='checkbox' name ='sub-group-$num_up' id='sub-group-$num_up'>
                    <label class='cd-accordion__label cd-accordion__label--icon-folder' for='sub-group-$num_up'><span class='UP UP$num_up'>UP$num_up_gp : $nom </span><span class='moyenne'>Moyenne : $moy_eleve   Coefficient : $coef  Barre : $barre</span></label> 
                    <ul class='cd-accordion__sub cd-accordion__sub--l2'>");
                    include('./../barresUP.php');
                    $id_eval_up = id_eval_up($num_up);
                    foreach ($id_eval_up as $num_eval) {
                      $moy=moyenne_eval($num_eval);
                      $nom=nom_eval($num_eval);
                      echo("<li class='cd-accordion__item'><span class='note'> $nom  Moyenne Promo : $moy </span></li>"); }

                    $num_rat=id_rattrapage_up($num_up);
                    $moy=moyenne_eval($num_rat);
                    $nom=nom_eval($num_rat);
                    echo("<li class='cd-accordion__item'><span class='note'> $nom  Moyenne Promo : $moy </span></li>");
                    include('./../ajoutnote.php');

                    echo("</ul>
                    </li>");
                    

                    
            }
            
            echo('</ul>
            </li>
            </ul>');
          } 
          echo('</div>');
      }
  
?>  


</body>
</html>