<?php
session_start();
    if(isset($_POST['connect'])){
    if(!empty($_POST['login']) && !empty($_POST['password'])){
       
        if(preg_match('#[a-zA-Z0-9]#', $_POST['login']) && preg_match('#[a-zA-Z0-9]#', $_POST['password'])) {
            # code...
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $data = file_get_contents('traitement.json');
            $json = json_decode($data, true);
            $lengthAdmin=count($json['admin']);
            $lengthJoueur=count($json['joueur']);
            $login =$_POST['login'];
            $password =$_POST['password'];
            for ($i=0; $i <$lengthAdmin ; $i++) { 
                    if (($login==$json['admin'][$i]['login']) && ($password==$json['admin'][$i]['password'])) {
                        header('location: administrateur.php?page=liste_question');
                        foreach ($json['admin'] as $key => $user) {
                            # code...
                            $_SESSION['user']=$user;
                            $_SESSION['id']='login';
                        }
                    }
                    elseif(!($login==$json['admin'][$i]['login']) && ($password==$json['admin'][$i]['password']) || ($login==$json['admin'][$i]['login']) && !($password==$json['admin'][$i]['password'])){
                        header("Location: index.php? msg=Login ou Mot de passe est incorrect!");
                    }
                   
                }
                for ($i=0; $i <$lengthJoueur; $i++) { 
                    if (($login==$json['joueur'][$i]['login']) && ($password==$json['joueur'][$i]['password'])) {
                        header('location: interfaceJoueur.php?id='.$i);  
                        foreach ($json['joueur'] as $key => $user) {
                            # code...
                            $_SESSION['user']=$user;
                            $_SESSION['id']='login';
                        }
                    }
                    elseif (!($login==$json['joueur'][$i]['login']) && ($password==$json['joueur'][$i]['password']) ||  (($login==$json['joueur'][$i]['login']) && !($password==$json['joueur'][$i]['password']))){
                        header("Location: index.php? msg=Login ou Mot de passe est incorrect!");
                    }
                   
                }
        
            }  
                else{
                    header("Location: index.php? msg=Login ou Mot de passe incorrect!");
                }
               
            }    
         else{           
                header("Location: index.php? msg=Veuillez remplir tous les champs");
                        
           }       
     }
    ?>

<?php   if (isset($_GET['id']) && $_GET['id']==='logout') {
    # code...
    deconnexion();
}
?>







    <?php
        function deconnexion(){
            unset($_SESSION['user']);
            unset($_SESSION['statut']);
            session_destroy();
        }
?>




    