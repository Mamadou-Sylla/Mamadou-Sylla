<?php 
    if(isset($_POST['save'])){
        $Erreur=array();
        if (!empty($_POST['questions']) && !empty($_POST['howmuch']) && !empty($_POST['reponse'])){
            # code...
            if((preg_match('/[a-zA-Z0-9]*$/',$_POST['questions'])) && preg_match('/[a-zA-Z0-9]*$/',$_POST['reponse'])){
                if (preg_match('/[0-9]*$/',$_POST['howmuch']) && $_POST['howmuch']>1) {
                    # code...
                $donnees=[];

                $donnees["Questions"]=$_POST['questions'];
        
                $donnees["Nbre_Point"]=$_POST['howmuch'];
        
                $donnees["Type_de_reponse"]=array($_POST['reponse']);

                $donnees["Reponse"]=array($_POST['texte']);
        
                $data=file_get_contents('creer_question.json');
        
                $data=json_decode($data,true);	
        
                $data[]=$donnees;
        
                $data=json_encode($data) ;
        
                file_put_contents('creer_question.json',$data);

                }

                
                else{
                    $Erreur[]="Nombre de points invalide";
                }

            }

                else{
                    $Erreur[]="Caractére invalide";
                }

        }


        else{
            # code...
            $Erreur[]="Tout les champs sont obligatoire";    
    
        }
        
           
            foreach($Erreur as $Error){
                echo "<h4>".$Error."</h4>";
            }      
          
        
}
?>
<!-- Code html -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style_creer_question.css">
        <title>SA Quizz</title>
        </head>
    <body> 
        <h2>PARAMÉTRER VOTRE QUESTION</h2>
        <div class="container">
                <div class="formulaire">
                    <form enctype="multipart/form-data" action="" method="post" id="creer_question" class="form"> 
                        <div id="form">
                            <div id="row_0">
                                <label for="answer" id="question">Question</label>
                                <input type="text"  class="input" id="answer"  name="questions" Error="error"/><br/><span id="error"></span><br/>
                                <label> Nbre de Points</label>
                                <input type="number" name="howmuch" id="howmuch" Error="error_1"/><span id="error_1"></span><br/><br/>
                                <label>Type de réponse</label>
                                <select name="reponse" id="liste_reponse" onchange="VerifListe();">
                                    <option name="choix" id="choice" selected="selected" disabled="disabled" onsubmit="return verifie(this)">Donnez le type de réponse </option>
                                    <option value="Texte" name="QRT" <?php if(@$_POST['QRT']=='Question avec réponse texte'){echo "selected";}?>>Question avec réponse texte</option>
                                    <option value="Une_reponse" name="QR">Question avec une réponse</option>
                                    <option value="Multiple" name="QCM">Question à choix multiples</option>
                                </select>
                                <button type="button" id="AddInput" onclick='onAddInput()'></button>
                            </div>   
                                    <div>

                                    </div>
                        </div>
                        <input type='submit'  id="enregistrer" name="save" value="Enrégistrer"/>
                    </form>
                </div>
                <script type="text/javascript" src="monscript.js"></script>
        </div>
    </body>
<html>

               <!-- Code Javascript -->
<script>
    var cpt=0;
    function onAddInput(){ 
        
        cpt++;
        var divInputs=document.getElementById('form');
        var newInput=document.createElement('div');
        newInput.setAttribute('class','row');
        newInput.setAttribute('id','row_'+cpt);
        newInput.innerHTML=`
        <label for="answer" id="question">Réponse 1</label>
                        <input type='text' Error="error_2" class="input_2" id="inputs" name="texte"/>
                        <input type='checkbox' id="checkbox" name="checkbox"/>
                        <input type='radio'  id="radio" name="radio"/>
                        <button type="button" onclick='onRemoveInput(${cpt})' id="RemoveInput"></button><br/>
                        <span id="error_2"></span>
        `;
        divInputs.appendChild(newInput);
    }
    function onRemoveInput(nbr){
        var target=document.getElementById('row_'+nbr);
        target.remove();
    }
</script>
