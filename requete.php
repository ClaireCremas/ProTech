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

        function return_barre_up($id_up){
            global $db;
            $c = $db->prepare("SELECT barre FROM up WHERE id=:id");
            $c->execute(['id'=>$id_up]);
            $barre_up = $c->fetch();
            return $barre_up[0];
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
            if (empty($note[0])==false){ /*Affiche si la note existe*/
                echo($note[0]);
            }
            
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
            $arrondi=round($moyenne_up[0],2);
            echo($arrondi);
        }

        function moyenne_eval($id_eval){
            global $db;
            $c = $db->prepare("SELECT AVG(note) from note join eval on note.id_eval=eval.id where id_eval=:id");
            $c->execute(['id'=> $id_eval]);
            $moyenne_eval = $c->fetch();
            $arrondi=round($moyenne_eval[0],2);
            echo($arrondi);
            
        }

        function ecart_type_eval($id_eval){
            global $db;
            $c = $db->prepare("SELECT STDDEV(note) from note join eval on note.id_eval=eval.id where id_eval=:id");
            $c->execute(['id'=> $id_eval]);
            $ecart_type_eval = $c->fetch();
            $arrondi=round($ecart_type_eval[0],2);
            echo($arrondi);
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
        



        function return_max_rattrapage_moyenne($id_up,$email){
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
            
                            
                            return max($note_rattrapage,$moyenne_sans_rattrapage);
                        }else{
                            return ('pas de note de rattrapage');
                        }
            }

        function validation_up($id_up,$email){ /*validation des UP et on choisit le max lorsqu'il y a un rattrapage*/
             global $db;
                /*prend l'identifiant du rattrapage*/
                $c=$db->prepare("SELECT id from eval where eval.id_up=:id and eval.TYPE=:t");
                $c->execute(['id'=>$id_up,'t'=>'R']);
                $id_rattrapage=$c->fetch();

                /*recherche de la barre */
                $h=$db->prepare("SELECT barre from up where up.id=:id");
                $h->execute(['id'=>$id_up]);
                $barre_up=$h->fetch();

            if (rattrapage_non_vide($id_rattrapage[0],$email)==true){
                if((return_max_rattrapage_moyenne($id_up,$email))<$barre_up[0]){
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

                $d=$db->prepare("SELECT id from eval where eval.id_up=:id and eval.TYPE=:t");
                $d->execute(['id'=>($id_gp-1)*4+$i,'t'=>'R']);
                $id_rattrapage=$d->fetch();

                if(rattrapage_non_vide($id_rattrapage[0],$email)==TRUE){
                    $somme=$somme+return_max_rattrapage_moyenne(($id_gp-1)*4+$i,$email)*$coef_up[0];
                    $val=return_max_rattrapage_moyenne(($id_gp-1)*4+$i,$email);
                }
                else{
                    $moyenne_up_eleve=moyenne_up_eleve(($id_gp-1)*4+$i,$email);
                    $somme=$somme+$coef_up[0]*$moyenne_up_eleve;
                }
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

        function grade_gp($id_gp,$email){
            global $db;
            $d=$db->prepare("SELECT 'A+',A,B from gp where id=:id");
            $d->execute(['id'=>$id_gp]);
            $grade=$d->fetch();
            $aplus=$grade['A+'];
            $a=$grade['A'];
            $b=$grade['B'];

            $moyenne_gp=moyenne_gp_eleve($id_gp,$email);
            if (validation_gp($id_gp,$email)==FALSE){
                if ($moyenne_gp>=$aplus){
                    return array('A+',4.33);
                }
                elseif($aplus>$moyenne_gp and $moyenne_gp>=$a){
                    return array('A',4);
                }
                elseif($a>$moyenne_gp and $moyenne_gp>=$b){
                    return array('B',3.33);
                }
                else{
                    return array('C',2.66);
                }
            }
            else{
                return array('Fx',2.66);
            }
        }

        function calcul_GPA($email){
            $somme=0;
            for ($i=1;$i<=4;$i++){
                $somme=grade_gp($i,$email)[1]+$somme;
            }

            $moyenne=$somme/4;
            $arrondi=round($moyenne,2);
            echo($arrondi);
        }

        function role($email){
            global $db;
            $c = $db->prepare("SELECT statut FROM user WHERE id= :id");
            $c->execute(['id'=> $email]);
            $role = $c->fetch();
            echo($role[0]);
        }

        function moyenne_simulation_up($id_up,$email,$note){
            $moyenne_up=moyenne_up_eleve($id_up,$email);
            return ($moyenne_up+$note)/2;
        }

        function moyenne_simulation_gp($id_gp,$email,$id_up_simulation,$note){
            global $db;
            $somme=0;
            $coef=0;
            
            for ($i = 1; $i <= 4; $i++) {
                $c = $db->prepare("SELECT coefficient FROM up WHERE num_UP= :num AND id_gp=:id_gp");
                $c->execute(['num'=> $i, 'id_gp'=>$id_gp]);
                $coef_up = $c->fetch();
                if ((($id_gp-1)*4+$i)==$id_up_simulation){
                    $moyenne_simulation=moyenne_simulation_up($id_up_simulation,$email,$note);
                    $somme=$somme+$moyenne_simulation*$coef_up[0];
                }else{
                    $moyenne_up_eleve=moyenne_up_eleve(($id_gp-1)*4+$i,$email);
                    $somme=$somme+$coef_up[0]*$moyenne_up_eleve;
                }                
                $coef=$coef+$coef_up[0];
            }
            $moyenne=$somme/$coef;
            $arrondi=round($moyenne,2);
            return ($arrondi);
        }


        function grade_gp_moyenne($moyenne,$id_gp){
            global $db;
            $d=$db->prepare("SELECT 'A+',A,B from gp where id=:id");
            $d->execute(['id'=>$id_gp]);
            $grade=$d->fetch();
            $aplus=$grade['A+'];
            $a=$grade['A'];
            $b=$grade['B'];

            if ($moyenne>=$aplus){
                return 'A+';
            }
            elseif($aplus>$moyenne and $moyenne>=$a){
                return 'A';
            }
            elseif($a>$moyenne and $moyenne>=$b){
                return 'B';
            }
            else{
                return 'C';
            }
        }

        function note_valider_gp($id_gp,$email,$id_up_simulation){
            $coef=0;
            $somme=0;
            $coef_simulation=0;
            /*coefficient*/
            global $db;
            $c = $db->prepare("SELECT coefficient FROM up WHERE num_UP= :num AND id_gp=:id_gp");


            /*barre gp*/
            $d=$db->prepare("SELECT barre from gp where id=:id");
            $d->execute(['id'=>$id_gp]);
            $barre_gp=$d->fetch();
           

            for ($i = 1; $i <= 4; $i++) {
                if ($i==$id_up_simulation){ /*cas où c'est l'id du rattrapage*/
                    $c->execute(['num'=> $i, 'id_gp'=>$id_gp]);
                    $coef_up = $c->fetch();
                    $coef_simulation=$coef_up[0];
                }
                else{ /*reste*/
                    $c->execute(['num'=> $i, 'id_gp'=>$id_gp]);
                    $coef_up = $c->fetch();

                    $d=$db->prepare("SELECT id from eval where eval.id_up=:id and eval.TYPE=:t");
                    $d->execute(['id'=>($id_gp-1)*4+$i,'t'=>'R']);
                    $id_rattrapage=$d->fetch();
                    if(rattrapage_non_vide($id_rattrapage[0],$email)==TRUE){
                        $somme=$somme+return_max_rattrapage_moyenne(($id_gp-1)*4+$i,$email)*$coef_up[0];
                        $val=return_max_rattrapage_moyenne(($id_gp-1)*4+$i,$email);
                    }
                    else{
                        $moyenne_up_eleve=moyenne_up_eleve(($id_gp-1)*4+$i,$email);
                        $somme=$somme+$coef_up[0]*$moyenne_up_eleve;
                    }
                }
                $coef=$coef+$coef_up[0];
                
            }
            $note_a_avoir=($coef*$barre_gp[0]-$somme)/$coef_simulation;
            return $note_a_avoir;

        }
        

