<?php session_start();

include('../vendor/autoload.php'); #appel à phpSpreadsheet
include('../include/database.php'); #connexion à la base de donnée
include('./../requete.php');
global $db; #permet d'avoir la base de donnée sous le nom db

use PhpOfficePhpSpreadsheetSpreadsheet;
use PhpOfficePhpSpreadsheetReaderXlsx;


function rentrernote($notesatraiter, $notestraitees, $id_up){

    # pointeur sur le dossier des notes à rentrer
    $rep = @opendir($notesatraiter);
    if(!$rep){
        echo 'Erreur fichier notesatraiter';
    }


    #nom eval, id_up, coef
    #INSERT INTO eval(nom, id_up, Coefficient, TYPE) VALUES ("$nom_eval", $id_up, $coef, "E")




    while(!empty("../" . $notesatraiter . "/")){
        $file = readdir($rep); # on prend le nom d'un fichier dans le dossier
        if(!$file){
            echo "Pas de fichier dans notesatraiter" ;
        }

        $reader = new PhpOfficePhpSpreadsheetReaderXlsx;
        $fichier_note = $reader->load($file);

        #$fichier_note = \PhpOfficePhpSpreadsheetIOFactory::load($file);
        if(!$fichier_note){
            echo "Ouverture notesatraiter impossible" ;
        }

        $sheet = $fichier_note->getActiveSheet() ;
        $nb_eleves = $sheet->getCell('D1')->getCalculatedValue();


        for($i = 2; $i <= $nb_eleves; $i++){

            $compteur = 0;

            $nom = $sheet->getCellByColumnAndRow(1,$i) ;
            $prenom = $sheet->getCellByColumnAndRow(2,$i) ;
            $note = $sheet->getCellByColumnAndRow(3,$i) ;
            $eleve -> echo(trouveideleve($nom, $prenom));
            $db -> query("INSERT INTO note (id_user, note) VALUES ('$eleve', '$note')");

            $compteur++;

        }

        #déplacer fichier dans notestraitees
        if($compteur==$nb_eleves){

            $currentLocation = "../" . $notesatraiter . "/" . $file;
            $newLocation = "../" . $notestraitees . "." . $file;
            $moved = rename($currentLocation, $newLocation);
            
            if($moved){
                echo 'Notes rentrées';
            }

        }
        
    }

    closedir($rep);
}

?>