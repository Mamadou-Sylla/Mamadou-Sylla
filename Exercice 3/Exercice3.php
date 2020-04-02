<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TD 2 PHP</title>
        <style>
        form{
            text-align:center;
            margin-top:15px;
        }
        label{
            margin-top:10px;
        }
        .taille{
            margin-left:-150px;
            margin-bottom:10px;
        }
        .mot{
            margin-left:-200px;àà
        }
        input{
            width:20%;
            height:30px;
            border-radius:10px
        }
        #valide, #annule, #envoie{
            width:10%;
            margin-top:18px;
            color:white;
            font-size:20px;
        }
        #valide{
            background-color:blue;
        }
        #annule{
            background-color:red;
        }
        #envoie{
            background-color:green;
        }
        </style>
    </head>
    <body>
        <h1> Exercice 3</h1>
        <h3>Recherche de lettre M/m </h3>
        <form action="" method="post">
         <label class="taille"> Combien de mots </label><br/>
            <input type="text" name="N" placeholder="Entrer N" value="<?= @$_POST['N'] ?>" required="required"><br/>
            <input type="submit" id='valide' value="Valider" name="valide">
            <input type="submit" id='annule' value="Annuler" name="annuler">
        </form>

    </body>
</html>
<?php 
require("function.php");
?>
<?php 
    if(isset($_POST['N'])){
        $_SESSION['N']=$_POST['N'];
        $cpt=0;
            if(!empty($_POST['N'])){
                if (is_entier($_POST['N'])) {
                    # code...
                    $N=$_SESSION['N'];
                for ($i=1; $i<=$N ; $i++) { 
                    # code...
                    $cpt++;
                    ?>
                        <form method="post">
                    <?php
                            echo "<label class='mot'> Mot N°".$cpt."</label><br/>";
                    ?>
                           <input type="text" id='mot' name="mot[]" placeholder="Entrer un mot" value="<?= @$_POST['mot'] ?>" required="required">
                            <br/>
                            <?php
                }
                ?>
                         
                            <br/>
                            <input type="submit" id='envoie' value="Envoyer" name="envoyer">
                        </form>
                    <?php
    }
    else{
        echo"Entrer un nombre entier positif";
    }
        }else{
        echo"Veuillez remplir ce champ";
    }
    }
?>
<?php
$error=[];
if (isset($_POST['envoyer'])) {
          # code...
          $t=0;
            $word=$_POST['mot'];
                if (empty($_POST['mot'])) {
                    # code...
                    echo"Ce champ ne peut être vide";
                }
                else{   
                    foreach ($word as $key => $mot) {
                        # code...
                       $mot=my_trim($mot);
                       if (my_strlen($mot)>20) {
                           # code...
                           $error[]="Mot ".($key+1)." a dépassé 20 caractére";
                       } 
                       elseif (!is_valid($mot)) {
                           # code...
                           $error[]="Mot ".($key+1)." Incorrect, espace ou caractére non alphabétique";
                       }
                       elseif ($mot="") {
                           # code...
                           $error[]="Mot ".($key+1)." Champ vide";
                       }
                    }
                    if(empty($error)){
                        foreach ($word as $value) {
                            # code...
                            if ((is_car_in_string($value, 'M')) || (is_car_in_string($value, 'm'))){
                                # code...
                                $t++;
                                      
                        }
                        }
                        echo"<h4><center> Le nombre de mot contenant la lettre 'M' est ".$t."</center></h4>";
                    }
                    else{
                        foreach ($error as $erreur) {
                            # code...
                            echo"<h4><center>".$erreur." <center/></h4>";
                        }
                    }
        }
    } 
?> 
