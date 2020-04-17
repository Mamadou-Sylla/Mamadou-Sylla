<?php session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="admin.css">
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
                        <h1 id="item">CRÉEZ ET PARAMÉTREZ VOS QUIZZ</h1>
                        <button class="btn-decon" name="btn" ><a href="index.php?id=logout" style="text-decoration:none; color:white">Déconnexion<a></button>
                    </div>
                    <div class="bloc">
                 
                        <div class="bloc-profil">
                            <div class="avatar">
                                <div class="profil"></div>
                                <div class="user"><h1 id="user">User_Admin<h1></div>  
                            </div>
                            <ul>
                                        <li><a href="administrateur.php?page=liste_question">Liste Questions</a><img id="lien" src="Images/Icônes/ic-liste.png"/></li>
                                        <li><a href="administrateur.php?page=creer_admin">Créer Admin</a><img id="link" src="Images/Icônes/ic-ajout.png"/></li>
                                        <li><a href="administrateur.php?page=liste_joueur">Liste joueurs</a><img id="lien" src="Images/Icônes/ic-liste.png"/></li>
                                        <li class="link"><a href="administrateur.php?page=creer_question">Créer Questions</a><img id="link" src="Images/Icônes/ic-ajout.png"/></li>
                                    </ul>  
                        </div>
                        <div class="bloc-item">
                            <?php
                        if(!isset($_GET['page'])) {
                            $page='administrateur.php';
                        } else {
                            $page=$_GET['page'];
                            switch($page) {
                                case'liste_question':
                                    include('liste_question.php');
                                    break;
                                case'creer_admin':
                                    include('creer_admin.php');
                                    break;
                                case'liste_joueur':
                                    include('liste_joueur.php');
                                    break;
                                case'creer_question':
                                        include('creer_question.php');
                                        break;
                                case'default':
                                        include('liste_question.php');
                                        break;
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 
    if(isset($_GET['btn'])){
        is_connect();
    }
    ?>
<?php
    function is_connect(){
        if (!isset($_SESSION['id'])) {
            # code...
            header("location:index.php");
        }
    }
?>