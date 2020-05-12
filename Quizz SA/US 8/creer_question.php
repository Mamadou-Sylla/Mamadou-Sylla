<?php 
    if(isset($_POST['save'])){
        var_dump($_POST);
        $Erreur=array();
        if (!empty($_POST['questions']) && !empty($_POST['howmuch']) && !empty($_POST['reponse'])){
            # code...
            if((preg_match('/[a-zA-Z0-9]*$/',$_POST['questions'])) && preg_match('/[a-zA-Z0-9]*$/',$_POST['reponse'])){
                if (preg_match('/[0-9]*$/',$_POST['howmuch']) && $_POST['howmuch']>1) {
                    # code...
               
                if($_POST['reponse']=='Texte'){
                    $donnees=[];
                    $donnees["Questions"]=$_POST['questions'];           
                    $donnees["Nbre_Point"]=$_POST['howmuch'];
                    $donnees["Type_de_reponse"]=$_POST['reponse'];   
                    $donnees["Reponse"]=$_POST['texte'];   
                    $data=file_get_contents('creer_question.json');           
                    $data=json_decode($data,true);	           
                    $data[]=$donnees;           
                    $data=json_encode($data) ;            
                    file_put_contents('creer_question.json',$data);
                }
                elseif(($_POST['reponse']=='Une_reponse') || ($_POST['reponse']=='Multiple')) {
                    # code...
                    $donnees=[];
                    $donnees["Questions"]=$_POST['questions'];           
                    $donnees["Nbre_Point"]=$_POST['howmuch'];
                    $donnees["Type_de_reponse"]=$_POST['reponse'];   
                    $donnees["Reponse"]=$_POST['texte'];   
                    $donnees["Vrai"]=$_POST['vrai'];  
                    $data=file_get_contents('creer_question.json');           
                    $data=json_decode($data,true);	           
                    $data[]=$donnees;           
                    $data=json_encode($data) ;            
                    file_put_contents('creer_question.json',$data);
                }
                
            
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
                                <select name="reponse" id="liste_reponse">
                                    <option value="">Donnez le type de réponse </option>
                                    <option value="Texte">Question avec réponse texte</option>
                                    <option value="Une_reponse">Question avec une réponse</option>
                                    <option value="Multiple">Question à choix multiples</option>
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
               <!-- Code Javascript -->
<script>
    var cpt=0;
    var i=1;
    var j=1;
    function onAddInputTexte(){ 
        
        cpt++;
        var divInputs=document.getElementById('form');
        var newInput=document.createElement('div');
        newInput.setAttribute('class','row');
        newInput.setAttribute('id','row_'+cpt);
        newInput.innerHTML=`
        <label for="answer" id="question">Réponse 1</label>
                        <input type='text' Error="error_2" class="input_2" id="inputs"  name="texte"/>
                        <button type="button" onclick='onRemoveInput(${cpt})' id="RemoveInput"></button><br/>
                        <span id="error_2"></span>
        `;
        divInputs.appendChild(newInput);
    }
        function onAddInputSimple(){
             
        cpt++;
        var divInputs=document.getElementById('form');
        var newInput=document.createElement('div');
        newInput.setAttribute('class','row');
        newInput.setAttribute('id','row_'+cpt);
        newInput.innerHTML=`
        <label for="answer" id="question">Réponse 1</label>
                        <input type='text' Error="error_2" class="input_2" id="inputs" name="texte[${i}]"/>
                        <input type='radio'  id="radio"  value="${i}" name="vrai"/>
                        <button type="button" onclick='onRemoveInput(${cpt})' id="RemoveInput"></button><br/>
                        <span id="error_2"></span>
        `;
        divInputs.appendChild(newInput);
        i++;
        }
        function onAddInputMultiple(){
                 
        cpt++;
        var divInputs=document.getElementById('form');
        var newInput=document.createElement('div');
        newInput.setAttribute('class','row');
        newInput.setAttribute('id','row_'+cpt);
        newInput.innerHTML=`
        <label for="answer" id="question">Réponse 1</label>
                        <input type='text' Error="error_2" class="input_2" id="inputs" name="texte[${j}]"/>
                        <input type='checkbox' id="checkbox" value="${j}" name="vrai[]"/>
                        <button type="button" onclick='onRemoveInput(${cpt})' id="RemoveInput"></button><br/>
                        <span id="error_2"></span>
        `;
        divInputs.appendChild(newInput);
        j++;
        }
        function onAddInput(){
            var type=document.getElementById("liste_reponse");
            if (type.value == 'Texte') {
            return onAddInputTexte();
        } else if (type.value == 'Une_reponse') {
            return onAddInputSimple();
        } else {
            return onAddInputMultiple();
        }  
        }
    function onRemoveInput(nbr){
        var target=document.getElementById('row_'+nbr);
        target.remove();
    }
    

    
</script>
    </body>
</html>

        
