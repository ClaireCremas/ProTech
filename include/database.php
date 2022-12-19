<?php   
$source = "mysql:host=localhost;dbname=proTech";
$login="user";
$mdp="user";
try{
    $db=new PDO($source,$login,$mdp);
    echo(""); #marque si on est bien connecté à la base de donnée
}
catch(PDOException $e){
    $error_message= $e->getMessage();
    echo $error_message;
    exit();
}
?>