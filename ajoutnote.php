<?php
    if(!empty($_FILES)){
        $file_name = $_FILES['fichier']['name'];
        $file_extension = strrchr($file_name, ".");

        $file_tmp_name = $_FILES['fichier']['tmp_name'];
        $file_dest = "./../fichiers";

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
    </style>
</head>

<body>
    <form actions="accueil_prof.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="fichier" /> </br>
            <input type="submit" value="Valider pour ajouter une note" />
    </form>
</body>