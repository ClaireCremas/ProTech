<?php

if(isset(($_POST['barre'])) and $antibouclebarreUP == 0){
    $barre = $_POST['barre'];
    $db -> query("UPDATE 'up' SET barre = $barre WHERE id = $num_up");
    echo 'Barre modifiée avec succès';
    $antibouclebarreUP = 1;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Barres de validation UP</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        input[type=submit]{
            color: black;
            background: #BABABB;
            border:1px;
            font-family: "Klima", "Open Sans", Helvetica, Arial, sans-serif;
        }
        input[type=submit]:hover{
            background: #3CB371;
            box-shadow: #3CB371;
        }
        div.barreGPUP{
            font-family: "Klima", "Open Sans", Helvetica, Arial, sans-serif;
            margin-top: 0px;
            margin-left: 0px;
            margin-bottom: 30px;
        }
        form.formbarre{
            padding-left: 0px;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>
    </br>
    <div class="barreGPUP">
        <form class="formbarre" actions="accueil_prof.php" method="POST" enctype="multipart/form-data">
            Nouvelle barre : <input type="number" name="barre" />
            <input type="submit" name="bouton" value="Valider pour modifier la barre" />
        </form>
    </div>
</body>