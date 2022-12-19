<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="barre_tete2.css">
    <style>

        .barre_tete{
            margin: 0;
            padding: 0;
            border:0;
            background-color: #61259e;
            display : flex;
            align-items: center;
        }

        .navigation li{
            list-style: none;
            margin-left: 5px;
            color: #fff;
            font-weight: 545;
            margin-left: 10px;
            padding: 8px 15px;
            border-radius: 40px;
            text-decoration: none;
            display : inline-block;
            font-family: "Klima", "Open Sans", Helvetica, Arial, sans-serif;
            
        }

        .navigation li a{
            text-decoration:none;
            color: white;
            position: relative;
            width: 100%;
            display: flex;
            justify-content: right;
            text-align: right;
            align-items: right;
            flex-wrap: wrap;
            
        }
        .img{
            width: 50px;
            height: 50px;
            margin-left: 10px;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class='barre_tete'>
    <img src="/proTech/image/emse-blanc.png" alt="logo" class="img">
        
        <ul class="navigation"> <!--ici on ajoute des points en dessous du titre logo-->
            <li><a href="/proTech/eleve/accueil_eleve.php" >Mes notes</a></li>
            <li><a href="/proTech/include/information/information.php" class="Active">Informations</a></li> 
            <li><a href="/proTech/include/deconnexion.php">Deconnexion</a></li>
        </ul> 
    </div>
        
</body>
</html>