<?php

$nom_barre="barre_$id_gp";
if(isset($_POST[$nom_barre])){
    $barre = $_POST[$nom_barre];
    $db -> query("UPDATE gp SET barre = $barre WHERE id = $id_gp");
    echo 'Barre modifiée avec succès';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Barres de validation GP</title>
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
        <?php echo("
        form.formbarre_$id_gp{
            font-family: 'Klima', 'Open Sans', Helvetica, Arial, sans-serif;
            padding-top: 0px;
            margin-top: 0px;
            padding-left: 40px;
            padding-bottom: 10px;
            font-size: 0.85rem;
        }"); ?>
    </style>
</head>

<body class="barreUPGP">
    </br>
    <?php echo("<div class='barreGPUP_$id_gp'>");?>
        <?php echo("<form class='formbarre_$id_gp' actions='accueil_prof.php' method='POST' enctype='multipart/form-data'>
            Nouvelle barre : <input type='number' name='barre_$id_gp' />
            <input type='submit' name='bouton_$id_gp' value='Valider pour modifier la barre' />
        </form> "); ?>
    </div>
</body>