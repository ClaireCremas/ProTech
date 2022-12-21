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

        function return_note($email,$id_eval){
            global $db;
            $c = $db->prepare("SELECT note FROM note JOIN user ON note.id_user=user.id WHERE id_eval= :id AND email=:email");
            $c->execute(['id'=> $id_eval, 'email'=>$email]);
            $note = $c->fetch();
            return($note[0]);
        }

        function moyenne_up($id_up){ /*fausse avec le rattrapage*/
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



        function rattrapage_non_vide($id_eval,$email){ /*Note rattrapage est vide ou pas*/
            global $db;
            $c = $db->prepare("SELECT note from note INNER join user on note.id_user=user.id INNER join eval on eval.id=note.id_eval where eval.id=:id and user.email=:email");
            $c->execute(['id'=> $id_eval, 'email'=>$email]);
            $note_rattrapage = $c->fetch();
            if (empty($note_rattrapage[0])==FALSE){
                return TRUE;
            }
        }




        function moyenne_up_eleve($id_up,$email){
            global $db;
            $somme=0;
            $somme_coef=0;
            $moyenne=0;

            $c = $db->prepare("SELECT count(id) from eval where eval.id_up=:id and eval.TYPE=:t");
            $d=$db->prepare("SELECT id from eval where eval.id_up=:id and eval.TYPE=:t");
            $e=$db->prepare("SELECT Coefficient from eval where id=:id_eval");
            $f = $db->prepare("SELECT note FROM note JOIN user ON note.id_user=user.id WHERE id_eval= :id AND email=:email");


            $c->execute(['id'=> $id_up,'t'=>'E']);
            $nbeval = $c->fetch();
            
            
            $d->execute(['id'=>$id_up,'t'=>'E']);
        
            for ($i=1; $i<=$nbeval[0];$i++){
                $id_eval=$d->fetch();
                /*recupère les coefficients des evaluations*/
                
                $e->execute(['id_eval'=>$id_eval[0]]);
                $coef=$e->fetch();
                /*récupère les notes des évaluations*/
                
                $f->execute(['id'=> $id_eval[0], 'email'=>$email]);
                $note = $f->fetch();

                /*somme des coefficients et somme des notes*coef*/
                if (empty($note[0])==false){
                    $somme=$somme+$note[0]*$coef[0];
                    $somme_coef=$somme_coef+$coef[0];
                }
                
            }
            
            /*Calcul de la moyenne*/
            if ($somme_coef!=0){
                $moyenne=$somme/$somme_coef;
            }
            
            /*Prend l'identifiant et la note du rattrapage*/
            $d->execute(['id'=>$id_up,'t'=>'R']);
            $id_rattrapage=$d->fetch();

            $f->execute(['id'=> $id_rattrapage[0], 'email'=>$email]);
            $note=$f->fetch();

            
            if (rattrapage_non_vide($id_rattrapage[0],$email)==true){/*Si il y a une note de rattrapage*/
                $moyenne=($moyenne+$note[0])/2;
            }

            $arrondi=round($moyenne,2);
            return $arrondi;
        }
        
        function rattrapage($id_up,$email,$num_up,$id_gp){ /* dit si l'élève doit faire un rattrapage dans l'up*/
            global $db;

            /*prend la valeur de la moyenne de l'UP de l'éleve*/
            $c = $db->prepare("SELECT avg(note) from note INNER join user on note.id_user=user.id INNER join eval on eval.id=note.id_eval where eval.id_up=:id and user.email=:email");
            $c->execute(['id'=> $id_up, 'email'=>$email]);
            $moyenne_up_eleve = $c->fetch();

            /*prend la barre de l'up*/
            $d = $db->prepare("SELECT barre FROM up WHERE num_UP= :num AND id_gp=:id_gp");
            $d->execute(['num'=> $num_up, 'id_gp'=>$id_gp]);
            $barre_up = $d->fetch();

            /*Test si la moyenne de l'élève est plus petite que la barre*/
            if ($moyenne_up_eleve[0]<$barre_up[0])
                return TRUE;
            else
                return FALSE;
        }
        
        function validation_up($id_up,$email){
            global $db;

            /*prend l'identifiant du rattrapage*/
            $c=$db->prepare("SELECT id from eval where eval.id_up=:id and eval.TYPE=:t");
            $c->execute(['id'=>$id_up,'t'=>'R']);
            $id_rattrapage=$c->fetch();

            /*Si il y a une note de rattrapage */
            if (rattrapage_non_vide($id_rattrapage[0],$email)==true){
                $note_rattrapage=return_note($email,$id_rattrapage[0]);


                $somme=0;
                $somme_coef=0;
                $moyenne_sans=0;
    
                $g = $db->prepare("SELECT count(id) from eval where eval.id_up=:id and eval.TYPE=:t");
                $d=$db->prepare("SELECT id from eval where eval.id_up=:id and eval.TYPE=:t");
                $e=$db->prepare("SELECT Coefficient from eval where id=:id_eval");
                $f = $db->prepare("SELECT note FROM note JOIN user ON note.id_user=user.id WHERE id_eval= :id AND email=:email");
                
    
                $g->execute(['id'=> $id_up,'t'=>'E']);
                $nbeval = $g->fetch();
                
                
                $d->execute(['id'=>$id_up,'t'=>'E']);
            
                for ($i=1; $i<=$nbeval[0];$i++){
                    $id_eval=$d->fetch();
                    /*recupère les coefficients des evaluations*/
                    
                    $e->execute(['id_eval'=>$id_eval[0]]);
                    $coef=$e->fetch();
                    /*récupère les notes des évaluations*/
                    
                    $f->execute(['id'=> $id_eval[0], 'email'=>$email]);
                    $note = $f->fetch();
    
                    /*somme des coefficients et somme des notes*coef*/
                    if (empty($note[0])==false){
                        $somme=$somme+$note[0]*$coef[0];
                        $somme_coef=$somme_coef+$coef[0];
                    }
                    
                }
                
                /*Calcul de la moyenne*/
                if ($somme_coef!=0){
                    $moyenne_sans_rattrapage=$somme/$somme_coef;
                }

                /*recherche de la barre */
                $h=$db->prepare("SELECT barre from up where up.id=:id");
                $h->execute(['id'=>$id_up]);
                $barre_up=$h->fetch();

                if((max($note_rattrapage,$moyenne_sans_rattrapage))<$barre_up[0]){
                    return TRUE;
                }
                else{
                    return FALSE;
                }


            }
            else{
                $moyenne_up_eleve=moyenne_up_eleve($id_up,$email);
                if($moyenne_up_eleve<$barre_up[0]){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }

        }

        function moyenne_gp_eleve($id_gp,$email){ /*moyenne gp avec coef des up et rattrapage ou non */
            global $db;
            $somme=0;
            $coef=0;
            
            for ($i = 1; $i <= 4; $i++) {
                $c = $db->prepare("SELECT coefficient FROM up WHERE num_UP= :num AND id_gp=:id_gp");
                $c->execute(['num'=> $i, 'id_gp'=>$id_gp]);
                $coef_up = $c->fetch();
                
                $moyenne_up_eleve=moyenne_up_eleve(($id_gp-1)*4+$i,$email);
                
                $somme=$somme+$coef_up[0]*$moyenne_up_eleve;
                $coef=$coef+$coef_up[0];
            }
            $moyenne=$somme/$coef;
            $arrondi=round($moyenne,2);
            return ($arrondi);
        }

        function validation_gp($id_gp,$email){ /*dis si le gp est validé on prend le max de la note de rattrapage et normal ici cest faux!!!*/
            $somme=0;
            $coef=0;
            global $db;
            $e = $db->prepare("SELECT barre FROM gp WHERE id= :id");
            $e->execute(['id'=> $id_gp]);
            $barre_gp = $e->fetch();
            
            for ($i = 1; $i <= 4; $i++) {
                $c = $db->prepare("SELECT coefficient FROM up WHERE num_UP= :num AND id_gp=:id_gp");
                $c->execute(['num'=> $i, 'id_gp'=>$id_gp]);
                $coef_up = $c->fetch();
                
                $moyenne_up_eleve=moyenne_up_eleve(($id_gp-1)*4+$i,$email);

                $somme=$somme+$coef_up[0]*$moyenne_up_eleve;
                $coef=$coef+$coef_up[0];
            }
            $moyenne=$somme/$coef;

            if ($moyenne<$barre_gp[0]){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }


    ?>