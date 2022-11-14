<!-- Connexion au site --->

<form method="post"> 
    <div>
        <h1 class='connection'>CONNECTEZ-VOUS : </h1>
    </div>
    <div>
        <input type="text" name="email" id="email" placeholder="votre email" required><br/> 
        <input type="password" name="password" id="password" placeholder="votre mot de passe" required><br/>
        <input type="submit" name="formsend_1" id="formsend" value="Connexion">
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
<<<<<<< HEAD
                if(password_verify($password,$hashpassword)){
                    echo "Le mot de passe est bon, connection en cours";
                    ?> <a href="./compte/page_garde.php">Vas sur ta page</a><?php
                    $_SESSION['email']=$result['email'];
                    $_SESSION['date']=$result['date'];
=======
                if(password_verify($password,$hashpassword)){ #le mot de passe est bon
                    echo "Le mot de passe est bon, connection en cours";
                    ?> <a href="./compte/page_garde.php">Vas sur ta page</a><?php 
                    $_SESSION['email']=$result['email'];
                    $_SESSION['date']=$result['date'];
                    $_SESSION['nom']=$result['nom'];
                    $_SESSION['prenom']=$result['prenom'];

>>>>>>> 56f57cfd22d5895a01083294c09386acb3214f23
                    
                }else{
                    echo "Le mot de passe n'est pas correct";
                }

<<<<<<< HEAD
            } else{echo "Le compte" .$email ."n'eiste pas";}
=======
            } else{echo "Le compte" .$email ."n'existe pas";}
>>>>>>> 56f57cfd22d5895a01083294c09386acb3214f23
    
        }else{
            echo "Veuillez compléter l'ensemble des champs";
        }
    }
?>
