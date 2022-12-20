<!-- Connexion au site --->

<form method="post"> 
    <div>
        <h1 class='connection'>CONNECTEZ-VOUS : </h1>
    </div>
    <div>
        <input type="text" name="email" id="email" placeholder="votre email" required><br/> 
        <input type="password" name="password" id="password" placeholder="votre mot de passe" required><br/>
        <button type="submit" name="formsend_1" id="formsend"> Connexion </button>
    </div>
</form> 

<?php
    if(isset($_POST['formsend_1'])){ #lorsqu'on clique sur CONNEXION

        $email =$_POST['email'];
        $password = $_POST['password'];
        
        if(!empty($email) && !empty($password)){  #si l'email ou mdp est non vide alors
            $c = $db->prepare("SELECT * FROM user WHERE email= :email");
            $c->execute(['email'=> $email]);
            $result = $c->fetch();
            if($result==true){

                //le compte existe bien

                $hashpassword = $result['password'];

                if(password_verify($password,$hashpassword)){ #le mot de passe est bon
                    echo "Le mot de passe est bon, connection en cours";
                    $_SESSION['email']=$result['email'];
                    $_SESSION['date']=$result['date'];
                    $_SESSION['nom']=$result['nom'];
                    $_SESSION['prenom']=$result['prenom'];

                    if($result['TYPE']==1){
                        header('Location: ./eleve/accueil_eleve.php');
                    }
                    else{
                        header('Location: ./prof/accueil_prof.php');
                        echo("connexion prof");
                    }
                    
                }else{
                    echo "Le mot de passe n'est pas correct";
                }

            } else{
                echo ("Le compte" .$email ."n'existe pas");
            }

    
        }else{
            echo "Veuillez compléter l'ensemble des champs";
        }
    }
        
?>
