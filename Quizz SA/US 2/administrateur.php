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
                    <div claas="bloc">
                            <?php echo $_SESSION['user']['prenom']; 
                            echo $_SESSION['user']['nom'];?>
                    <div claas="bloc-profil"></div>
                     <div claas="bloc-item"></div>
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