<?php
             if(isset(($_POST['valide']))){
                if(!empty($_POST['nbre']) && !is_numeric($_POST['nbre']) && ($_POST['nbre'])<5){
                    $Erreur="Champ obligatoire ou nombre invalide";
                    header("location:administrateur.php?page=liste_question");
                    echo $Erreur;
                 }
                    else{   
                        $json=file_get_contents('nbre_question.json');           
                        $data=json_decode($json,true);	           
                        $data=$_POST['nbre'];           
                        $data=json_encode($data) ;            
                        file_put_contents('nbre_question.json',$data); 
                                            
                    }
                
             }
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style_lister_question.css">

    </head>
    <body>
        <div class="container">
            <form action="" method="post">
                <div class="nbre_question">
                <span id="error_0" style="color:red"></span><label id="label">Nbre de question/Jeu</label>
 <input  Error="error_0" id="Nbr_question" name="nbre" value="<?php echo $data;?>">
                    <input type="submit" name="valide" value="OK" id="valider"/>
                </div> 
                <div class="liste_question">
                     <form enctype="multipart/form-data" action="" method="post" id="liste_question">
                     <?php
                     $Erreur="";
                     $json=file_get_contents('creer_question.json');
                     $data=json_decode($json,true);	
                     $donnees=count($data);
                     $_SESSION['Donnees']=$data;
                     if(isset($_SESSION['Donnees'])){                     
                        $total=sizeof($_SESSION['Donnees']);
                        // $tab=[1,2,3,4,5,8,6,8,5,8,9,6,78,55,2,22,5,22,20,10,45];
                        $nombrevaleurparpage=5;
                            $totalvaleur=$total;
                            $nbredepage=ceil($totalvaleur/$nombrevaleurparpage);
                            if(isset($_GET['lien'])){
                                        $pageActuel=$_GET['lien'];
                                        if($pageActuel>$nbredepage){
                                            $pageActuel=$nbredepage;
                                        }
                                    else{
                                        $pageActuel=1;
                                    }
                                    $IndiceDepart=($pageActuel-1)*$nombrevaleurparpage;
                                    $IndiceDeFin=$IndiceDepart+$nombrevaleurparpage-1;
                                }
                     }
                            //Affichage question
                            
                                    
                            //Affichage question
                            //Pagination
                               echo" <table><tr>";
                            if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($data)) {
                                $debut=$_SESSION['fin'];
                                $fin=$_SESSION['fin']+5;
                            }elseif(isset($_POST['precedent']) && $_SESSION['fin']>count($data))  {
                                $debut=$_SESSION['fin']-10;
                                $fin=$_SESSION['fin']-15;
                            }else
                            {
                                $debut=0;
                                $fin=1;
                            }
                    for ($i=$debut; $i <$fin ; $i++) {


                        if ($i<count($data)) {
                            foreach ($data as $key => $value) {
                                        # code...
                                        echo "<label id='label'>".($key+1). '.  ' . $value['Questions']."</label>";
                                        echo '</br>';
                                        if ($value['Type_de_reponse']== 'Une_reponse') { 
                                                        foreach($value['Reponse'] as   $cle=>$valeur) {
                                                           
                                                           if ($value['Vrai']==$cle) {
                                                               echo "<input class='tsq' type='radio' name='simple_$key' checked disabled>";
                                                           echo "<label class='checkbox-radio'>$valeur</label>";
                                                           echo '</br>';
                                                           }else{
                                                               echo "<input class='tsq' type='radio' name='simple_$key' disabled>";
                                                                   echo "<label class='checkbox-radio'>$valeur</label>";
                                                                   echo '</br>';
                                                           }
                                                        }
                                       
                                                       
                                                    }
                                                    elseif ($value['Type_de_reponse']== 'Multiple') { 
                                                                    foreach($value['Reponse'] as $cle => $valeur) {
                                                                        
                                                                        if (in_array($cle,$value['Vrai'])) {
                                                                            echo "<input class='tsq' type='checkbox' name='multiple' checked disabled>";
                                                                            echo"<label class='checkbox-radio'>$valeur</label>";
                                                                            echo '</br>';
                                                                            } else {
                                                                                echo "<input class='tsq' type='checkbox' name='multiple' disabled>";
                                                                                echo"<label class='checkbox-radio'>$valeur</label>";
                                                                                echo '</br>';
                                                                            }
                                                    
                                                                        
                                                                     }
                                                                } else {
                                                                    $ok=$value['Reponse'];
                                                                    echo "<input class='tsq'id='texte'value='$ok' type='text'>";
                                                                    echo "<br/>";
                                                                }
                                                            }
                                                               
                                            
                            

                            }
                            

                        
                }
            
                $_SESSION['fin']=$fin;
                        if (isset($_POST['suivant']) OR $_SESSION['fin']>count($data)) {
                            echo "<button  name='precedent' id='btn' style='float:left;margin-left:10px;;margin-top:150px'> Precedent</button> ";
                        }
                        ?>
                        <?php
                        if ($_SESSION['fin']< count($data)) {
                            echo "<button class='bttn'id='btn' name='suivant' style='float:right;margin-top:150px'> Suivant</button> ";
                        }
                        echo "</table></tr>"
                
                                    ?>
                            <!-- Pagination -->
                        

                    </form>
                    
                </div>
                <?php
                     for ($page=1; $page<=$nbredepage ; $page++){ 
                        # code...
                    echo "<a href=administrateur.php?page=liste_question?lien=".$page.">[".$page."]</a>";
                    }
                    ?>
                <div class="btn_suivant">
                     <input type="submit" name="suivant" value="Suivant" id="btn_creer_compte">
                   
                    </div>
               
            </form>
        </div>
    </body>
</html>

<script>

var OK=document.getElementById("valider");
OK.addEventListener('click',function(e){   
    const input=document.getElementById("Nbr_question");
    var erreur=false;
            if(input.hasAttribute("error")){
                var idSpanError=input.getAttribute("error"); 
           if(!input.value){
               document.getElementById(idSpanError).textContent="Ce champ est obligatoire. "
               erreur=true;
           e.preventDefault();
           } 
          else if(input.value<5){
               document.getElementById(idSpanError).textContent="Choisir un nombre superieur ou égale à 5. "
               erreur=true;
           e.preventDefault();
           } 
    }
    });

</script>
