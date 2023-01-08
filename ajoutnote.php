<?php
$telechargement=False;

    if(!empty($_FILES)){
        $file_name = $_FILES['fichier']['name'];
        $file_extension = strrchr($file_name, ".");

        $file_tmp_name = $_FILES['fichier']['tmp_name'];
        $file_dest = "../notesatraiter";

        $extensions_autorisees = array(".xlsx", ".XLSX");

        if(in_array($file_extension, $extensions_autorisees) and $_FILES['fichier']['error']==0){
            if(move_uploaded_file($file_tmp_name, "$file_dest/$file_name")){
                echo 'Notes téléchargées avec succès';
                $telechargement = True;
            } else {
                echo "Une erreur est survenue lors du téléchargement.";
            }
        } else {
            echo "Seuls les fichiers au format .xlsx sont autorisés.";
        }
    }


include('../vendor/autoload.php'); #appel à phpSpreadsheet

# Appel de la bibliothèque phpSpreadSheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


# Pointeur sur le dossier des notes à rentrer
$rep = @opendir('../notesatraiter');
if(!$rep){
    echo 'Erreur dossier notesatraiter';
}

if ($telechargement){    # Création d'une évaluation
    $nom_eval = $_POST['eval'];
    $coef = $_POST['coef'];
    $db -> query("INSERT INTO eval (nom, id_up, Coefficient, TYPE) VALUES ('$nom_eval', $num_up, $coef, 'E')");
    $numero_eval = ideval($nom_eval);
}


while(false !== ($file = readdir($rep))){  
    if($file!="." && $file!=".."){ # On ne considère pas les pointeurs vers le dossier et son dossier parent
        
        $reader = new Xlsx();
        $fichier_note = $reader->load("../notesatraiter/$file");
        
        if(!$fichier_note){
            echo "Ouverture notesatraiter impossible" ;
        }
        
        $sheet = $fichier_note->getActiveSheet();
        $nb_eleves = $sheet->getCellByColumnAndRow(4,1)->getCalculatedValue();
        
        $compteur = 0;

        for($i = 2; $i <= ($nb_eleves+1); $i++){            
            
            $nom = $sheet->getCellByColumnAndRow(1,$i) ;
            $prenom = $sheet->getCellByColumnAndRow(2,$i) ;
            $note = $sheet->getCellByColumnAndRow(3,$i) ;
            $id_eleve = trouveideleve($nom, $prenom);
            $db -> query("INSERT INTO note (id_eval, id_user, note) VALUES ($numero_eval, $id_eleve, $note)");
            # On rentre les notes dans la bdd

            $compteur++;
            
        }
        
        # Déplacer fichier dans notestraitees
        if($compteur==$nb_eleves){
            
            $currentLocation = '../notesatraiter/'. $file;
            $newLocation = '../notestraitees/'. $file;
            $moved = rename($currentLocation, $newLocation);
            
            if($moved){
                echo ' et notes rentrées dans la base de données avec succès';
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
            background: #BABABB;
            border:1px;
            margin-top:5px;
            font-family: "Klima", "Open Sans", Helvetica, Arial, sans-serif;
        }
        input[type=submit]:hover{
            background: #3CB371;
            box-shadow: #3CB371;
        }
        div.ajoutnote{
            font-family: "Klima", "Open Sans", Helvetica, Arial, sans-serif;
            margin: 0px 10px 30px 10px;
        }
        h2.titreh2{
            border-bottom: 1px dashed green;
            font-size: 1.1rem;
            margin: 0px;
            padding:0px 5px 5px 5px;
        }
        form.form{
            padding: 5px;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>
    </br>
    <div class="ajoutnote">
        <h2 class="titreh2">Ajouter une note :</h2>
        <form class="form" actions="accueil_prof.php" method="POST" enctype="multipart/form-data">
            Nom de l'évaluation : <input type="text" name="eval" /></br>
            Coefficient : <input type="number" name="coef" /></br>
            <input type="file" name="fichier" /> </br>
            <input type="submit" value="Valider pour ajouter une note" />
        </form>
    </div>
</body>