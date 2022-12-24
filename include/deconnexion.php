<head>
    <style>

       body{
            background-color: #ECECEE;
       }

       form{
            text-align: left;
            margin: 20px;
       }
       
       div.cible{
            margin: 0;
            padding: 0;
            border:0;
            background-color: #61259e;
            color: white;
            display : flex;
            align-items: center;
       }
    
       .cible a{
            color: white;
       }

       .cible li{
            list-style: none;
            margin-left: 5px;
            color: #fff;
            font-weight: 545;
            margin-left: 0px;
            padding: 8px 15px;
            border-radius: 40px;
            text-decoration: none;
            display : inline-block;
            font-family: "Klima", "Open Sans", Helvetica, Arial, sans-serif;
       }
    </style>

</head>


<body>
    <div class='cible'>
        <ul>
            <li>  <?php session_start();
            session_destroy();
            echo('Déconnexion réussie ! ')
            ?> </li>
            <li> <a href="./../index.php">RETOUR AU MENU</a> </li>
        </ul>
    </div> 
</body>
