<?php session_start();	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style_interfaceJeu.css">
        <title>SA Quizz</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="logo"> 
                </div>
                <div class="title">
                    <h1>Le plaisir de jouer</h1>
                </div>
            </div>
            <div class="section">
                <div class="cadre">
                    <div class="wrapper">
                            <div id="profil" style="background-image: url(<?php echo $_SESSION["joueur"]['avatar']?>)">
                               
                            </div>
                        
                        <div class="item"><h1 id="item">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ<br/>
                        JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h1>
                        <button class="btn-decon" name="btn" ><a href="index.php?id=logout" style="text-decoration:none; color:white">Déconnexion<a></button></div>
                        <h3 style='color:white'>    Mamadou Sylla
                            <?php //echo $_SESSION['joueur']['prenom']." ". $_SESSION['joueur']['nom']?>
                        </h3>
                    </div>
                    <div class="bloc">
                   
                        <div class="bloc-profil">
                            <div class="border">
                                    <div class="question">
                                       
                                        <form method="post">
                                      
                                                <table>
                                                <?php
                                                $json=file_get_contents('creer_question.json');
                                                $data=json_decode($json,true);	
                                                $_SESSION['Donnees']=$data;
                                                if(isset($_SESSION['Donnees'])){                     
                                                   $total=sizeof($_SESSION['Donnees']);
                                                   //Affichage des questions
                                                  
                                                    //Affichages des questions
                   
                                                }
                                                // $tab=[1,4,5];
                                                //Pagination
                                                if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($data)) {
                                                                $debut=$_SESSION['fin'];
                                                                $fin=$_SESSION['fin']+1;
                                                            }elseif(isset($_POST['precedent']) && $_SESSION['fin']>count($data))  {
                                                                $debut=$_SESSION['fin']-1;
                                                                $fin=$_SESSION['fin']-2;
                                                            }else
                                                            {
                                                                $debut=0;
                                                                $fin=1;
                                                               
                                                            }
                                                            $file=file_get_contents('nbre_question.json');
                                                            $files=json_decode($file,true);	
                                                            $_SESSION['Nbre']=$files;

                                                    for ($i=$debut; $i <$fin ; $i++) {
                                                        
                                                        $cpt=$i+1;
                                                       
                                                       
                                                        
                                                        if (isset($_SESSION['Nbre'])) {
                                                            # code...                                                
                                                            echo"<h1 id='question' style='color:black'>Questions ".$cpt."/".$_SESSION['Nbre']."</h1>";
                                                            
                                                            }  
                                                           
                                                        if ($i<count($data)) {
                                                        echo "<h4 style='color:black; margin-top:10px'>".$data[$i]['Questions']."</h4>";
                                                        echo "<br>";
                                                            ?></div><div class="reponse" style="margin-top:50px;">
                                                              <input type="text" name="point" value="<?php echo $data[$i]["Nbre_Point"]." pts" ?>" id="score">
                                                            <?php
                                                        if($data[$i]['Type_de_reponse']=="Texte"){
                                                            echo "<input type='text' id='texte' name='texte' style=' text-align:center;
                                                            width: 50%;
                                                            margin-left:100px;
                                                            margin-top:60px;
                                                            border-radius:5%;
                                                            border:none;
                                                            background-color:rgb(233, 231, 231); 
                                                            height: 30px;'>";
                                                        }
                                                        else if($data[$i]['Type_de_reponse']=="Une_reponse"){
                                                            foreach ($data[$i]['Reponse'] as $key => $value) {
                                                                echo "<input type='radio' name='simple'/>".$value;
                                                                echo"</br>";
                                                                # code...
                                                            }
                                                        }

                                                        else{
                                                            foreach ($data[$i]['Reponse'] as $key => $value) {
                                                                echo "<input type='checkbox' name='multiple'/>".$value;
                                                                # code...
                                                                echo "</br>";
                                                            }
                                                        }
                                                      
                                                    }
                                                }
                                                $_SESSION['fin']=$fin;
                                                        if (isset($_POST['suivant']) OR $_SESSION['fin']>count($data)) {
                                                            echo "<button  name='precedent' id='btn' style='float:left;margin-left:10px;;margin-top:150px; position:left-fixed;'> Precedent</button> ";
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($_SESSION['fin']<$files) {
                                                            echo "<button id='btn' name='suivant' style='float:right;margin-top:150px; position:fixed;'> Suivant</button> ";
                                                        }
                                                        else{
                                                            echo "<button id='btn-terminer' onclick='terminer()' name='terminer' style='margin-top:150px; position:fixed;'> Terminer</button> ";

                                                        }
                                                    
                                                        ?>
                                                </table>
                                                
                                            </form>
                                    </div>
                            </div>
                        </div>
                        <div class="bloc-item">
                                <div class="title_score">
                                    <ul>
                                        <li id="top-score"><a href="interfaceJoueur.php?page=top_score">Top scores</a></li>
                                        <li><a href="#meilleur">Mon meilleur score</a></li>
                                    </ul>
                                </div>
                               
                                <div class="score">
                                 <?php
                        if(isset($_GET['page'])) {
                            $page=$_GET['page'];
                            switch($page) {
                                case'top_score':
                                    include('top_score.php');
                                    break;
                                case'meilleur-score':
                                    include('meilleur-score.php');
                                    break;
                                case'default':
                                        include('interfaceJoueur.php?page=top_score');
                                        break;
                                    }
                                }
                                else {
                                    # code...
                                    $page="interfaceJoueur.php?page=top_score";
                                }
                                        ?> 
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php 
        if (isset($_POST['suivant'])){
            # code...
            if(!empty($_POST['terminer'])){
       
        if($_POST['suivant']=='texte'){
            $reponse=[];          
            $reponse["Nbre_Point"]=$_POST['point'];
            $reponse["Type_de_reponse"]="Texte";   
            $reponse["Reponse"]=$_POST['texte'];   
            $data=file_get_contents('reponse_joueur.json');           
            $data=json_decode($data,true);	           
            $data[]=$reponse;           
            $data=json_encode($data) ;            
            file_put_contents('reponse_joueur.json',$data);
        }
        elseif(($_POST['suivant']=='Une_reponse') || ($_POST['suivant']=='Multiple')) {
            # code...
            $reponse=[];
            $reponse["Questions"]=$_POST['questions'];           
            $reponse["Nbre_Point"]=$_POST['howmuch'];
            $reponse["Type_de_reponse"]=$_POST['reponse'];   
            $reponse["Reponse"]=$_POST['texte'];   
            $reponse["Vrai"]=$_POST['vrai'];  
            $data=file_get_contents('reponse_joueur.json');           
            $data=json_decode($data,true);	           
            $data[]=$reponse;           
            $data=json_encode($data) ;            
            file_put_contents('reponse_joueur.json',$data);
        }
         
        }
    }
?>
<script>
    var btn=document.getElementById('ok');
    var event= addEventListener("click", terminer(e){
        alert("ok");
    });
</script>