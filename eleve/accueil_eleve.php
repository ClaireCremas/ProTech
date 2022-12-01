<!-- Page accueil côté élèves --->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil_eleve.css"> <!--css-->
</head>

<?php session_start();
    include '../barre_tête.php';
    include '../include/database.php'; #connexion à la base de donnée
    global $db; #permet d'avoir la base de donnée sous le nom db
    
?>

<body>
    <div class = "onglets_1">
        <ul>
            <!-- Si l'élève a notes dans 1A, 2A... -->
            <li><a href="#2A">2A</a></li>
            <li><a href="#1A">1A</a></li>
        </ul>
    </div>

    <ul id = "menu_accordeon">
        <!-- Si il existe GPn :... -->
        <li><a href="#">GP 1</a>    Moyenne     Grade
            <ul>
            <!-- Si il existe JPn :... -->
                <li><a href="#">UP 1</a>    Moyenne     Coefficient</li>
                    <ul>
                        <li> NOTE 1     Note    Coef</li>
                        <li> NOTE 2     Note    Coef</li>
                    </ul>
                <li><a href="#">UP 2</a>    Moyenne     Coefficient</li>
                <li><a href="#">UP 3</a>    Moyenne     Coefficient</li>
                <li><a href="#">UP 4</a>    Moyenne     Coefficient</li>
            </ul>
        </li>

        <li><a href="#">GP 2</a>    Moyenne     Grade
            <ul>
                <li><a href="#">UP 1</a>    Moyenne     Coefficient</li>
                <li><a href="#">UP 2</a>    Moyenne     Coefficient</li>
                <li><a href="#">UP 3</a>    Moyenne     Coefficient</li>
                <li><a href="#">UP 4</a>    Moyenne     Coefficient</li>
            </ul>
        </li>

    </ul>




</body>
</html>
