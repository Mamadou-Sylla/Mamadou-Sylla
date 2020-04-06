<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice4</title>
</head>
<style>
    #case{
        width:30%;
        height:100px;
        margin-top:5px;
        border-radius: 5px;
        border:2px solid black;

    }
    #case1{
        width:30%;
        height:100px;
        margin-top:5px;
        border-radius: 5px;
        background-color:grey;
        border:2px solid green;

    }
    #valide{
        width:5%;
        height:35px;
        margin-top:10px;
        background-color:blue;
        color:white;
        border-radius: 5px;
    }
   
        
</style>
<body>
<h1>Exercice4</h1>

    <form action="" method="post">
        <label form="text">Saisir un texte :</label><br> 
        <textarea type="text" name="phrase" placeholder="Entrer un texte" id="case" value="<?= @$_POST['phrase'] ?>" >
        </textarea><br>
        <input type="submit" value="Valider" name="valider" id="valide">

    </form>
</body>
</html>
<?php
include ("exo4_fonction.php"); 
?>
<?php
$erreurs=[];
    if(isset($_POST['valider'])) 
    {
        $texte=$_POST['phrase'];
        if(isset($_POST['phrase']) && empty($_POST['phrase'])){
            $erreurs[]= "Veuillez remplir ce champ!";
            }
            elseif (valider_une_phrase($texte)!=true) {
                # code...
                $erreurs[]= "Incorrect, caractére non alphabétique ou le vous n'avez pas respecter les 200 mots!";
        }
        #fonction pour valider une phrase qui est la F1.
        if (empty($erreurs)) {
            # code...
        if(valider_une_phrase($texte))
        {
            #fonction pour decouper un texte qui est la f2.
            $ligne=tronquer($texte);
            for($i=0; $i<count($ligne); $i++){
                $ligne2[]=supprimer_espaces($ligne[$i]);
            }
            #fonction pour supprimer des espaces qui est la f3. 
            $texte=supprimer_espaces($texte);
            echo "<label>Le texte est corrigé  :</label><br/>";
            echo '<textarea readonly id="case1">'.ucfirst($texte).'</textarea><br/>'; 
        }
    }
        else{
            foreach ($erreurs as $error) {
                # code...
                echo"<h4  style='color:red'>".$error."</h4>";
            exit;
       
         }
         }
    }   
?>
