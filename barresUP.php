<?php

$nom_barreUP="barreUP_$num_up";
if(isset($_POST[$nom_barreUP])){
    $barreUP = $_POST[$nom_barreUP];
    $db -> query("UPDATE up SET barre = $barreUP WHERE id = $num_up");
    echo 'Barre modifiée avec succès';
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
        <?php echo("
        form.formbarreUP_$num_up{
            font-family: 'Klima', 'Open Sans', Helvetica, Arial, sans-serif;
            margin-top: 0px;
            margin-left: 0px;
            margin-bottom: 30px;
            padding-left: 0px;
            font-size: 0.85rem;
        }"); ?>
    </style>
</head>

<body class="barreUPGP">
    </br>
    <?php echo("<div class='barreUP_$num_up'>");?>
        <?php echo("<form class='formbarreUP_$num_up' actions='accueil_prof.php' method='POST' enctype='multipart/form-data'>
            Nouvelle barre : <input type='number' name='barreUP_$num_up' />
            <input type='submit' name='boutonUP_$num_up' value='Valider pour modifier la barre' />
        </form> "); ?>
    </div>
</body>