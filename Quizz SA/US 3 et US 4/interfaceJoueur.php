
<?php 
session_start();
            echo "Vous êtes connectés en tant que joueur";
?>
<?php echo $_SESSION['user']['prenom']; 
                            echo $_SESSION['user']['nom'];?>