<!-- INSCRIPTION AU SITE --->

<form method="post"> 
    <h2 class='connection'>INSCRIPTION :</h2>
    <input type="text" name="newnom" id="newnom" placeholder="Nom" required><br/>
    <input type="text" name="newprenom" id="newprenom" placeholder="Prénom" required><br/>
    <input type="text" name="newemail" id="newemail" placeholder="Email" required><br/> 
    <input type="password" name="newpassword" id="newpassword" placeholder="Mot de passe" required><br/>
    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez Mot de passe" required><br/>
    <input type="submit" name="formsend_2" id="formsend_2" value="Inscription">
</form>

<?php

    if(isset($_POST['formsend_2'])){ #SI ON CLIQUE SUR INSCRIPTION

        $newnom=$_POST['newnom'];
        $newprenom=$_POST['newprenom'];
        $newemail =$_POST['newemail'];
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];

        if(!empty($newemail) && !empty($newpassword) && !empty($cpassword)){ #si l'email ou mdp est non vide alors
            if($newpassword==$cpassword){ #si le mot de passe est le meme que le mot de passe confimé
                $options = [
                    'cost'=>12,
                ];
                $hashpass = password_hash($newpassword, PASSWORD_BCRYPT,$options);#permet de crypter le mot de passe
                $c = $db->prepare("SELECT email FROM user WHERE email= :email");
                $c->execute(['email' => $newemail]);

                $result=$c->rowCount(); #vérifie que l'email n'existe pas
                if($result==0){
                    $q = $db->prepare("INSERT INTO user(email,password,nom,prenom) VALUES(:newemail,:newpassword,:newnom,:newprenom)"); #permet d'ajouter un utilisateur à la bdd
                    $q->execute([
                        'newemail' => $newemail,
                        'newpassword' => $hashpass,
                        'newnom'=>$newnom,
                        'newprenom'=>$newprenom
                    ]);
                    echo "le compte a été créé";
                }else{
                    echo "cet email est déjà utilisé";
                }

            }else{
                echo "les 2 mots de passe ne sont pas les mêmes";
            }
        }else{
            echo "les champs ne sont pas tous remplis";
        }
    }
?>