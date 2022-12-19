<?php 
    
        function nom_gp($id_gp){
            global $db;
            $c = $db->prepare("SELECT nom FROM gp WHERE id= :id");
            $c->execute(['id'=> $id_gp]);
            $nom_gp = $c->fetch();
            echo($nom_gp[0]);
        }
        
        function barre_gp($id_gp){
            global $db;
            $c = $db->prepare("SELECT barre FROM gp WHERE id= :id");
            $c->execute(['id'=> $id_gp]);
            $barre_gp = $c->fetch();
            echo($barre_gp[0]);
        }

        function nom_up($num_up,$id_gp){
            global $db;
            $c = $db->prepare("SELECT nom FROM up WHERE num_UP= :num AND id_gp=:id_gp");
            $c->execute(['num'=> $num_up, 'id_gp'=>$id_gp]);
            $nom_up = $c->fetch();
            echo($nom_up[0]);
        }

        function barre_up($num_up,$id_gp){
            global $db;
            $c = $db->prepare("SELECT barre FROM up WHERE num_UP= :num AND id_gp=:id_gp");
            $c->execute(['num'=> $num_up, 'id_gp'=>$id_gp]);
            $barre_up = $c->fetch();
            echo($barre_up[0]);
        }

        function coef_up($num_up,$id_gp){
            global $db;
            $c = $db->prepare("SELECT coefficient FROM up WHERE num_UP= :num AND id_gp=:id_gp");
            $c->execute(['num'=> $num_up, 'id_gp'=>$id_gp]);
            $coef_up = $c->fetch();
            echo($coef_up[0]);
        }

        function note($email,$id_eval){
            global $db;
            $c = $db->prepare("SELECT note FROM note JOIN user ON note.id_user=user.id WHERE id_eval= :id AND email=:email");
            $c->execute(['id'=> $id_eval, 'email'=>$email]);
            $note = $c->fetch();
            echo($note[0]);
        }

        function moyenne_up($id_up){
            global $db;
            $c = $db->prepare("SELECT AVG(note) FROM note JOIN eval ON note.id_eval=eval.id WHERE eval.id_up= :id");
            $c->execute(['id'=> $id_up]);
            $moyenne_up = $c->fetch();
            echo($moyenne_up[0]);
        }

        function moyenne_eval($id_eval){
            global $db;
            $c = $db->prepare("SELECT AVG(note) from note join eval on note.id_eval=eval.id where id_eval=:id");
            $c->execute(['id'=> $id_eval]);
            $moyenne_eval = $c->fetch();
            echo($moyenne_eval[0]);
            
        }

        function ecart_type_eval($id_eval){
            global $db;
            $c = $db->prepare("SELECT STDDEV(note) from note join eval on note.id_eval=eval.id where id_eval=:id");
            $c->execute(['id'=> $id_eval]);
            $ecart_type_eval = $c->fetch();
            echo($ecart_type_eval[0]);
        }

        function min_note($id_eval){
            global $db;
            $c = $db->prepare("SELECT MIN(note) from note join eval on note.id_eval=eval.id where id_eval=:id");
            $c->execute(['id'=> $id_eval]);
            $min_note = $c->fetch();
            echo($min_note[0]);
        }

        function max_note($id_eval){
            global $db;
            $c = $db->prepare("SELECT MAX(note) from note join eval on note.id_eval=eval.id where id_eval=:id");
            $c->execute(['id'=> $id_eval]);
            $max_note = $c->fetch();
            echo($max_note[0]);
        }

        function classement_eval($email,$id_eval){
            global $db;
            $c = $db->prepare("SELECT COUNT(note)+1 FROM note WHERE note.note>(SELECT note from note join user on note.id_user=user.id where note.id_eval=:id and user.email=:email) AND note.id_eval=:id");
            $c->execute(['id'=> $id_eval, 'email'=>$email]);
            $classement_eval = $c->fetch();
            echo($classement_eval[0]);
        }

        
    ?>