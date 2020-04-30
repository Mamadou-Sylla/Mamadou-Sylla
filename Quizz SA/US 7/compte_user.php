<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style_compte_user.css">
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
                        <div class="bloc">
                                    <div class="bloc_form">
                                            <h2>S'INSCRIRE</h2>
                                            <h4>Pour tester votre niveau de culture générale</h4>
                                            <hr>
                                            <form enctype="multipart/form-data" action=" " method="post" id="connexion_admin">
                                                <label>Prénom</label><span id="error_1"></span><br/>
                                                <input type="text" name="prenom" error="error_1" placeholder="Prénom" id="input_prenom"><br/>
                                                <label>Nom</label><span id="error_2"></span><br/>
                                                <input type="text" name="nom" error="error_2" placeholder="Nom" id="input_nom"><br/>
                                                <label>Login</label><span id="error_3"></span><br/>
                                                <input type="text" name="login" error="error_3" placeholder="Login" id="input_login"><br/>
                                                <label>Password</label><span id="error_4"></span><br/>
                                                <input type="password" name="password" error="error_4" placeholder="Password" id="input_pwd"><br/>
                                                <label>Confimer Password</label><span id="error_5"></span><br/>
                                                <input type="password" name="confirm_pwd" error="error_5" placeholder="Confirmer votre password" id="input_cfr_pwd"><br/><br/>
                                                <label style="font-size:15px; color:black">Avatar</label>    
                                                <input style="width:8.5vw;" type="file" name="profil" id="profil" value="Choisir un fichier" id="btn_file "
                                                onchange="document.getElementById('user_image').src=
                                                window.URL.createObjectURL(this.files[0])"/> <br/>
                                                <br/>
                                                <input type="submit" onclick="setTimeout(myFunction,2000);" name="creer_compte" value="Créer un compte" id="btn_creer_compte"/>
                                            </form>
                                    </div>
                                    <div class="bloc_profil">
                                            <div class="item_profil">
                                             <img id="user_image"/>
                                            </div>
                                            <div class="item_message">
                                            <h3>Avatar du joueur </h3>
                                                <h1>Ici c'est reservé pour la gestion des erreurs</h1>
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
    </body>
</html>


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
   var password=document.getElementById(input_pwd).value;
    var confirm_pwd=document.getElementById(input_cfr_pwd);
    var error=false;
    for(input of inputs){
        if(input.hasAttribute("error_5")){
               var idSpanError_5=input.getAttribute("error_5"); 
               
               if(password!=confirm_pwd){
        document.getElementById(idSpanError_5).innerText="Erreur de confirmation."
        erreur=true;
          e.preventDefault();
    }
        }
    }
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
            if(preg_match('#[a-zA-Z]#',$prenom) && preg_match('#[a-zA-Z]#',$nom) && preg_match('#[a-zA-Z]#',$login) && preg_match('#[a-zA-Z0-9]#',$password)){
                                          // traitement json 
                                          $Donnees=array();
                                          $Donnees['prenom']=$prenom;
                                          $Donnees['nom']=$nom;
                                          $Donnees['login']=$login;
                                          $Donnees['password']=$confirm_pwd;
                                          $Donnees['avatar']=$_POST['profil'];
                                          $json=file_get_contents('traitement.json');
                                          $json=json_decode($json,true);
                                            
                                          $Erreur=[];


                                          if(!($password==$confirm_pwd)){
                                            $Erreur="Erreur de confirmation";
                                            header("location: compte_user.php?");
                                        }
                                       elseif(!empty($_POST['profil'])){
                                            $allowed_image_extension = array("png", "jpg", "jpeg");
                                            $file_extension = pathinfo($_FILES["profil"]["name"], PATHINFO_EXTENSION);
                                            if (! in_array($file_extension, $allowed_image_extension)) {
                                                $Erreur[]="Choisir une image de format png ou jpeg";
                                                header("location: compte_user.php?");
                                        }
                                    }
                                    else{

                                         if($login==$json['admin']['login']){
                                            $Erreur="Erreur! Login existe dèjà";
                                             header('location:compte_user.php?');
                                         }
                                         else{
                                              $json['joueur'][]=$Donnees;
                                          $json=json_encode($json);
                                          file_put_contents('traitement.json', $json);
                                         }
                                        }
            }

            else{
                header("location:compte_user.php?");
                $Erreur="Caractére invalide";
            }      
    }
    else{
        header("location:compte_user.php?");
        $Erreur="Veuillez remplir tous les champs";
    }
    foreach ($Erreur as $Error) {
        # code...
        if (empty($Error)) {
            # code...
            header("location:index.php?");
        }
        else{
            header("location:compte_user.php?");
        echo"<p>".$Error."</p>";

        }
    }
}
?>


