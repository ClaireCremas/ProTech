<?php
    if(!empty($_FILES)){
        $file_name = $_FILES['fichier']['name'];
        $file_extension = strrchr($file_name, ".");

        $file_tmp_name = $_FILES['fichier']['tmp_name'];
        $file_dest = "../notesatraiter";

        $extensions_autorisees = array(".xlsx", ".XLSX");

        if(in_array($file_extension, $extensions_autorisees) and $_FILES['fichier']['error']==0){
            if(move_uploaded_file($file_tmp_name, "$file_dest/$file_name")){
                echo 'Notes téléchargées avec succès';
            } else {
                echo "Une erreur est survenue lors du téléchargement.";
            }
        } else {
            echo "Seuls les fichiers au format .xlsx sont autorisés." ;
        }
    }


include('../vendor/autoload.php'); #appel à phpSpreadsheet
#include('./../requete.php');
#include('../include/database.php'); #connexion à la base de donnée
#global $db; #permet d'avoir la base de donnée sous le nom db

use PhpOffice\PhpSpreadsheet\Spreadsheet;
#use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


# pointeur sur le dossier des notes à rentrer
$rep = @opendir('../notesatraiter');
if(!$rep){
    echo 'Erreur fichier notesatraiter';
}

$numero_eval = 50;

if (isset($_POST['submit'])){
    $nom_eval = $_POST['eval'];
    $coef = $_POST['coef'];
    $db -> query("INSERT INTO eval (nom, id_up, Coefficient, TYPE) VALUES ('$nom_eval', $num_up, $coef, 'E')");
    $numero_eval = ideval($nom_eval, $num_up, $coef);
}


while(false !== ($file = readdir($rep))){  
    if($file!="." && $file!=".."){
        
        $reader = new Xlsx();
        $fichier_note = $reader->load("../notesatraiter/$file");
        
        #$fichier_note = PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        if(!$fichier_note){
            echo "Ouverture notesatraiter impossible" ;
        }
        
        $sheet = $fichier_note->getActiveSheet();
        $nb_eleves = $sheet->getCell('D1')->getCalculatedValue();
        
        
        for($i = 2; $i <= $nb_eleves; $i++){
            
            $compteur = 0;
            
            $nom = $sheet->getCellByColumnAndRow(1,$i) ;
            $prenom = $sheet->getCellByColumnAndRow(2,$i) ;
            $note = $sheet->getCellByColumnAndRow(3,$i) ;
            $id_eleve = trouveideleve($nom, $prenom);
            $db -> query("INSERT INTO note (id_eval, id_user, note) VALUES ('$numero_eval', '$id_eleve', '$note')");
            
            $compteur++;
            
        }
        
        #déplacer fichier dans notestraitees
        if($compteur==$nb_eleves){
            
            $currentLocation = '../notesatraiter/'. $file;
            $newLocation = '../notestraitees/'. $file;
            $moved = rename($currentLocation, $newLocation);
            
            if($moved){
                echo 'Notes rentrées';
            }
            
        }
        
    }
}
closedir($rep);
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Dépôt notes</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        input[type=submit]{
            color: black;
            background: #3CB371;
            border:1px;
            font-family: "Klima", "Open Sans", Helvetica, Arial, sans-serif;
        }
        input[type=submit]:hover{
            background: #BABABB;
            box-shadow: #BABABB;
        }
        body{
            font-family: "Klima", "Open Sans", Helvetica, Arial, sans-serif;
        }
    </style>
</head>

<body>
    </br>
    Ajouter une note :
    <form actions="accueil_prof.php" method="POST" enctype="multipart/form-data">
        Nom de l évaluation : <input type="text" name="eval" /></br>
        Coefficient : <input type="number" name="coef" /></br>
        <input type="file" name="fichier" /> </br>
        <input type="submit" value="Valider pour ajouter une note" />
    </form>
</body>