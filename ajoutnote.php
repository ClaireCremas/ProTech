<?php
$telechargement=False;

$nom_de_l_eval = "eval_$num_up";
$coef_de_l_eval = "coef_$num_up";
$nom_du_fichier = "fichier_$num_up";

if(isset($_POST[$nom_de_l_eval]) and isset($_POST[$coef_de_l_eval]) and !empty($_FILES)){
    $file_name = $_FILES[$nom_du_fichier]['name'];
    $file_extension = strrchr($file_name, ".");

    $file_tmp_name = $_FILES[$nom_du_fichier]['tmp_name'];
    $file_dest = "../notesatraiter";

    $extensions_autorisees = array(".xlsx", ".XLSX");

    if(in_array($file_extension, $extensions_autorisees) and $_FILES[$nom_du_fichier]['error']==0){
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
    $nom_eval = $_POST[$nom_de_l_eval];
    $coef = $_POST[$coef_de_l_eval];
    $db -> query("INSERT INTO eval (nom, id_up, Coefficient, TYPE) VALUES ('$nom_eval', $num_up, $coef, 'E')");
    $numero_eval = ideval($nom_eval);
    $telechargement = False;
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
        <?php echo("
        div.ajoutnote_$num_up{
            font-family: 'Klima', 'Open Sans', Helvetica, Arial, sans-serif;
            margin: 0px 10px 30px 0px;
        }"); ?>
        h2.titreh2{
            border-bottom: 1px dashed green;
            font-size: 1.1rem;
            margin: 0px;
            padding:0px 5px 5px 5px;
        }
        <?php echo("
        form.form_$num_up{
            padding: 5px;
            font-size: 0.85rem;
        }"); ?>
    </style>
</head>

<body>
    </br>
    <?php echo("<div class='ajoutnote_$num_up'>");?>
        <h2 class="titreh2">Ajouter une note :</h2>
        <?php echo("<form class='form_$num_up' actions='accueil_prof.php' method='POST' enctype='multipart/form-data'>
            Nom de l'évaluation : <input type='text' name='eval_$num_up' /></br>
            Coefficient : <input type='number' name='coef_$num_up' /></br>
            <input type='file' name='fichier_$num_up' /> </br>
            <input type='submit' name='button_$num_up' value='Valider pour ajouter une note' />
        </form> "); ?>
    </div>
</body>