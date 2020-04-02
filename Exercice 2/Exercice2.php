<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD 2 PHP</title>
    <style>
        table{
            width:60%;
            height:150px;
            margin-top:20px;
            margin-left:50px;
            color: black;
            border-collapse:collapse;
        }
        tr:nth-child(2n+1){
            background-color:grey;
        }
        tr:nth-child(2n){
        background-color:rgb(221, 216, 216);
        }
        td{
            padding:10px;
            padding-left:30px;
        }
    </style>
</head>
<body>
  <h1>Exercice 2 </h1>
  <h3>Calendrier </h3>
<form action="" method="post">
            <select name="traduction">
                <option name="tranlate">Sélectionnez</option>
                <option name="fr">Francais</option>
                <option name="an">Anglais</option>
                <input type="submit" value="Traduire"/>
            </select>
 </form>
</body>
</html>
<?php
set_time_limit(600);
$calendrier=array(
    'Francais' => array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet',
    'Aout','Septembre','Octobre','Novembre','Decembre'),
    'Anglais'=>array('January','February','March','April','May','June','July',
    'August','September','October','November','December')
);
 
    if(isset($_POST['traduction'])){
     $traduire=$_POST['traduction'];
     if($traduire=='Francais'){
                    $j=1;
    ?>
                <table border="1">
                    <?php
        for($i=0;$i<count($calendrier['Francais']);$i++){
                    ?>
                  <tr>
                  <td><?php echo $j; ?> </td>
                  <td><?php echo $calendrier['Francais'][$i]; ?> </td
                  <?php
                  if($j%3==0){
                  echo"</tr>";
                  
                  }
                  ?>
                    <?php
                    
                                    $j++;
                  
        }
                    ?>
                    
                    </table>

        <?php
        
         }     if($traduire=='Anglais'){
            $j=1;
?>
            <table border="1">
            <?php
for($i=0;$i<count($calendrier['Anglais']);$i++){
            ?>
            <tr>
            <td><?php echo $j; ?> </td>
            <td><?php echo $calendrier['Anglais'][$i]; ?> </td
            <?php
      
            if ($j%3==0) {
                echo "</tr>";
               
            }
            ?>
            <?php

$j++;
}

            ?>
            </table>

<?php

 }

     }
     else{
        echo 'choix Invalide';
    }
    
?>
