<!-- Code html -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style_creer_admin.css">
        </head>
    <body>
        <div class="inscrire">
            <h2>S'INSCRIRE</h2>
            <h6>Pour proposer des quizz</h6>
            <hr>
            <form enctype="multipart/form-data" action="" method="post" id="connexion_admin">
                <label>Prénom</label><span id="error_1"><?php if(isset($_GET['Erreur_invalide'])){echo $_GET($Erreur);}?></span><br/>
                <input type="text" name="prenom" error="error_1" placeholder="Prénom" id="input"><br/>
                <label>Nom</label><span id="error_2"><?php if(isset($_GET['Erreur_invalide'])){echo $_GET['Erreur_invalide'];}?></span><br/>
                <input type="text" name="nom" error="error_2" placeholder="Nom" id="input"><br/>
                <label>Login</label><span id="error_3"><?php if(isset($_GET['Erreur_invalide'])){echo $_GET['Erreur_invalide'];}?></span><br/>
                <input type="text" name="login" error="error_3" placeholder="Login" id="input"/><br/>
                <label>Password</label><span id="error_4"><?php if(isset($_GET['Erreur_invalide'])){echo $_GET['Erreur_invalide'];}?></span><br/>
                <input type="password" name="password" error="error_4" placeholder="Password" id="input"><br/>
                <label>Confimer Password</label><span id="error_5"><?php if(isset($_GET['Error'])){echo $_GET['Error'];}?></span><br/>
                <input type="password" name="confirm_pwd" error="error_5" placeholder="Confirmer votre password" id="input"><br/><br/>
                <label style="font-size:15px; color:black">Avatar</label>    
                <input style="width:8.5vw;" type="file" name="profil" id="profil" value="Choisir un fichier" id="btn_file "
                 onchange="document.getElementById('user_image').src=
                window.URL.createObjectURL(this.files[0])"/> <br/>
                <span id="error_5"><?php if(isset($_GET['Erreur_image'])){echo $_GET['Erreur_image'];}?></span>
                <br/>
                <!-- Les deux erreur seront gerer ici: le cas ou image est vide et si le format est incorrect -->
               <span><?php if(isset($_GET['Erreur_vide'])){echo "<p>".$_GET['Erreur_vide']."</p>";}?></span>
                <input type="submit" onclick="setTimeout(myFunction,2000);" name="creer_compte" value="Créer un compte" id="btn_creer_compte"/>
            </form>
        </div>
        <div class="avatar_admin">
            <img  id="user_image"/>
        </div>
    </body>
</html>
<!-- Code Javascript -->
<script>
     const inputs=document.getElementsByTagName("input");
            for(input of inputs){
                input.addEventListener("keyup", function(e){
                    if(e.target.hasAttribute("error")){
                        var idSpanError=e.target.getAttribute("error");
                        document.getElementById(idSpanError).innerText="";
                    }
                });
            }
     document.getElementById("connexion_admin").addEventListener('submit',function(e){   
    const inputs=document.getElementsByTagName("input");
    var erreur=false;
    for(input of inputs){
            if(input.hasAttribute("error")){
                var idSpanError=input.getAttribute("error"); 
           if(!input.value){
               document.getElementById(idSpanError).innerText="Ce champ est obligatoire."
               erreur=true;
           e.preventDefault();
           }   
      }
    }
    });
</script>
<!-- Code php -->
<?php
    if (isset($_POST["creer_compte"])) {
        # code...
      
        if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm_pwd'])) {
            # code...
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom'];
            $login=$_POST['login'];
            $password=$_POST['password'];
            $confirm_pwd=$_POST['confirm_pwd'];
            $profil=$_POST['profil'];
            if(preg_match('#[a-zA-Z]#',$prenom) && preg_match('#[a-zA-Z]#',$nom) && preg_match('#[a-zA-Z]#',$login) && preg_match('#[a-zA-Z0-9]#',$password)){
                                          // traitement json 
                                          $Donnees=array();
                                          $Donnees['prenom']=$prenom;
                                          $Donnees['nom']=$nom;
                                          $Donnees['login']=$login;
                                          $Donnees['password']=$confirm_pwd;
                                          $Donnees['avatar']=$profil;
                                          $json=file_get_contents('traitement.json');
                                          $json=json_decode($json,true);
                                            
                                          $Erreur=[];


                                          if(!($password==$confirm_pwd)){
                                            $Erreur="Erreur de confirmation";
                                            header("location: administrateur.php?page=creer_admin");
                                        }
                                       elseif(!empty($_POST['profil'])){
                                            $allowed_image_extension = array("png", "jpg", "jpeg");
                                            $file_extension = pathinfo($_FILES["profil"]["name"], PATHINFO_EXTENSION);
                                            if (! in_array($file_extension, $allowed_image_extension)) {
                                                $Erreur[]="Choisir une image de format png ou jpeg";
                                                header("location: administrateur.php?page=creer_admin?");
                                        }
                                    }
                                    else{

                                         if($login==$json['admin']['login']){
                                             header('location:administrateur.php?page=creer_admin msg=Erreur! Login existe dèjà');
                                         }
                                         else{
                                              $json['admin'][]=$Donnees;
                                          $json=json_encode($json);
                                          file_put_contents('traitement.json', $json);
                                         }
                                        }
                                        foreach($Erreur as $value){
                                            if(empty($Erreur)){
                                                ?>
                                                <script> alert("Succes"); </script>
                                                <?php
                                                header("location: index.php");

                                            }else{
                                                
                                                header("location:administrateur.php?page=creer_admin");
                                                ?>
                                                <script> alert("Echec"); </script>
                                                    <?php

                                            }
                                        }
            }

            else{
                header("location:administrateur.php?page=creer_admin Erreur_invalide=Caractére invalide");
            }      
    }
    else{
        header("location:administrateur.php?page=creer_admin Erreur_vide=Veuillez remplir tous les champs");
    }
}
?>
