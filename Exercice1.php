<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TD 2 PHP</title>
        <style>
        h4{color:red;text-align:center; margin-top:1cm;}
        table{
            width:100%;
            border-collapse:collapse;
        }
       
        </style>
    </head>
    <body>
        <h1> Exercice 1</h1>
        <h3>Les tableaux </h3>
        <form action="" method="post">
            Entrer un nombre positif :<input type="text" name="val" placeholder="Entrer un nombre" required="required"/></br>
            <input type="submit" value="Envoyer">
        </form>

    </body>
</html>
<?php
session_start();
    $T=array();
    $tmp=0;
    require_once('function.php');
    // set_time_limit(600);
    if(isset($_POST['val'])){
        if(preg_match('/^[0-9]*$/', $_POST['val'])){
            if(!empty($_POST['val'])){
            $Val=$_POST['val'];                     
            
            if($Val>=1000){
                    for ($i=1; $i<$Val ; $i++) { 
                        if (Nbrepremiers($i)==true) {
                            array_push($T,$i);                
                        }
                    } 
                    for ($i=0; $i <count($T) ; $i++) { 
        
                        $tmp=$tmp+$T[$i];
                    }
                    $moyen=$tmp/count($T);
                    echo "<br>";
                    echo " ";
                    echo "La moyenne des nombre prémiére est de : ";
                    echo $moyen;
                    $Tab=array("inferieur"=>array(), "superieur"=>array());
                        for ($i=0; $i < count($T); $i++) { 
                            if($T[$i]>$moyen){
                                $Tab["superieur"][]=$T[$i];
                            
                            }
                            else{
                                $Tab["inferieur"][]=$T[$i];
                            }
                        }
                

                        $_SESSION['TabSup']=$Tab['superieur'];
                        $_SESSION['TabInf']=$Tab['inferieur'];
             }
             else{
                echo"<h4>Entrer un nombre supérieur à 10 000</h4>";
            }
        
            
            }
            else{
                echo"Veuillez remplir le champ";
            }
        }
    }
    echo"</br>'Les nombres prémiers supérieur à la moyenne sont:</br> ";
    $page=1;
    if(isset($_SESSION['TabSup'])){
        $taille_tableau=count($_SESSION['TabSup']);
        $nombre_max_page=100;
        $page_left_right=5;
        $nombre_page= $taille_tableau/$nombre_max_page;
        $dernier_page=ceil($taille_tableau/$nombre_max_page);

        if (isset($_GET['page'])) {
            # code...
            $_GET['page']=$page;
        }
        else{
            $page=1;
        }
        if($page<1){
            $page=1;
        }
        elseif($page>$dernier_page){
            $page=$dernier_page;
        }
        echo"<table border=1 id='left'><tr>";
        for ($i=($page-1)*$nombre_max_page; $i<($page*$nombre_max_page) ; $i++){ 
            # code...
            if($i>$taille_tableau){
            break;
            }
            else{
                if (($i!=(($page-1)*$nombre_max_page)) && ($i%10==0)) {
                    # code...
                    echo"</tr> <br/> <tr>";
                }
                echo"<td>".$_SESSION['TabSup'][$i]."</td>";
            }
        }
        echo"</tr> </table> <div class=pagination>";
        $pagination="";
        if($dernier_page>1){
           if ($page>1) {
               # code...
               $precedent=$page-1;          
               $pagination.="<a href='Exercice1.php?page=exo1&page=".$precedent." id=pg'>Precedent</a>";
                for($i=$page-$page_left_right; $i<$page;$i++){
                    if($i>0){
                        $pagination.="<a href='Exercice1.php?page=exo1&page=".$i."'>".$i."</a>";
                    }
                }
           }
           $pagination.="<span>".$page."</span>";
           for($i=$page+1; $i<$dernier_page; $i++){
            $pagination.="<a href='Exercice1.php?page=exo1&page=".$i."'>".$i."</a>";
            if($i>=$page+$page_left_right){
            break;
            }
           }
           if($page!=$dernier_page){
               $suivant=$page+1;
               $pagination.="<a href='Exercice1.php?page=exo1&page=".$suivant." id=pg'>Suivant</a>";
           }
        }
        echo $pagination;
        echo "</div>";

    }
    echo"</br>Les nombres prémiers inférieur à la moyenne sont:</br>";
    if(isset($_SESSION['TabInf'])){
        $taille_tableau=count($_SESSION['TabInf']);
        $nombre_max_page=100;
        $page_left_right=5;
        $nombre_page= $taille_tableau/$nombre_max_page;
        $dernier_page=ceil($taille_tableau/$nombre_max_page);

        if (isset($_GET['page'])) {
            # code...
            $_GET['page']=$page;
        }
        else{
            $page=1;
        }
        if($page<1){
            $page=1;
        }
        elseif($page>$dernier_page){
            $page=$dernier_page;
        }
        echo"<table border=1 id='left'><tr>";
        for ($i=($page-1)*$nombre_max_page; $i<($page*$nombre_max_page) ; $i++){ 
            # code...
            if($i>$taille_tableau){
            break;
            }
            else{
                if (($i!=(($page-1)*$nombre_max_page)) && ($i%10==0)) {
                    # code...
                    echo"</tr> <br/> <tr>";
                }
                echo"<td>".$_SESSION['TabInf'][$i]."</td>";
            }
        }
        echo"</tr> </table> <div class=pagination>";
        $pagination="";
        if($dernier_page>1){
           if ($page>1) {
               # code...
               $precedent=$page-1;          
               $pagination.="<a href='Exercice1.php?page=exo1&page=".$precedent."'>Precedent</a>";
                for($i=$page-$page_left_right; $i<$page;$i++){
                    if($i>0){
                        $pagination.="<a href='Exercice1.php?page=exo1&page=".$i."'>".$i."</a>";
                    }
                }
           }
           $pagination.="<span>".$page."</span>";
           for($i=$page+1; $i<$dernier_page; $i++){
            $pagination.="<a Exercice1.php?page=exo1&page=".$i."'>".$i."</a>";
            if($i>=$page+$page_left_right){
            break;
            }
           }
           if($page!=$dernier_page){
               $suivant=$page+1;
               $pagination.="<a href='Exercice1.php?page=exo1&page=".$suivant."'>Suivant</a>";
           }
        }
        echo $pagination;
        echo "</div>";

    }
 
?> 
