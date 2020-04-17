<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
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
                <div class="formulaire">
                    <div class="wrapper"><br/>
                        <label><span  id="item">Login Form</span></label>
                    </div>
                    <form action="traitement.php" method="POST">
                        <input type="text" name="login" placeholder="   Login" id="login"/><br/>
                        <input type="password" name="password" placeholder="   Password" id="password"/><br/>
                        <input type="submit" name="connect" value="Connecter" class="connect"/>
                        <a href="#">S'inscrire pour Jouer?</a>
                        <?php    
                        if(isset($_GET['msg'])){
                            $msg=$_GET["msg"];
                            echo ("<h4 style='color:red; text-align:center; font-size:20px; margin-top:10px;'>" .$_GET['msg']."</h4>");
                            
                            } 
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
                   
               