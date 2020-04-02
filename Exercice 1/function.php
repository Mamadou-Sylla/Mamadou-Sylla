<<<<<<< HEAD
<!-- Exercice 1 -->
<?php
     $som=0;
     $i;
function Nbrepremiers($Val){
           $tmp=true;
                 for($i=2; $i<=($Val/2); $i++){
                    if($Val%$i==0){
                         $tmp=false;
                         }
                 }
       
                 return $tmp;
    } 
?>
<!-- Exercice 3 -->
<?php
    function ChercheM($mot){
        $ok=true;
        for($i=0;$i=$mot;$i++){
            if (condition) {
                # code...
            }
        }
    }
?>
<!-- Exercice 5 -->
<?php
            function testOrange($numero){

               $reg ='#^77[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#';
                $reg1 = '#^78[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#';
                    if (preg_match($reg,$numero)|| preg_match($reg1,$numero)) {
                        $ok = "vrai";
                    }else{
                        $ok = "faux";
                    }
                    return  $ok;
            }

            function testFree($numero){

                $reg ='#^76[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#';
                     if (preg_match($reg,$numero)) {
                         $ok = "vrai";
                     }else{
                         $ok = "faux";
                     }
                     return  $ok;
             }

             function testExpresso($numero){

                $reg ='#^70[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#';
                     if (preg_match($reg,$numero)) {
                         $ok = "vrai";
                     }else{
                         $ok = "faux";
                     }
                     return  $ok;
             }

?>
<!-- Application 1 -->
<?php
    function matrice($n){
        $c1=$_POST['select'];
        $c2=$_POST['select1'];

        echo"<table border='1' width='500px'; height='500px';>";
            for($i=0; $i<$n; $i++){
                echo"<tr>";
                for ($j=0; $j <$n ; $j++) { 
                    # code...
                        
                        if($j>$i && $j<($n-$i-1)){
                            echo"<td bgcolor='$c1'></td>";
                        }
                        elseif ($j==$i) {
                            # code...
                            echo"<td bgcolor='$c1'></td>";
                        }
                        elseif ($j==($n-$i-1)) {
                            # code...
                            echo"<td bgcolor='$c1'></td>";
                        }
                        elseif ($j>$i || $j<($n-$i-1)) {
                            # code...
                            echo"<td bgcolor='$c2'></td>";
                        }
                       else {
                           # code...
                           echo"<td></td>";
                       } 
                    }
                    echo"</tr>";
                 }
                 echo"</table>";
    }

=======
<!-- Exercice 1 -->
<?php
     $som=0;
     $i;
function Nbrepremiers($Val){
           $tmp=true;
                 for($i=2; $i<=($Val/2); $i++){
                    if($Val%$i==0){
                         $tmp=false;
                         }
                 }
       
                 return $tmp;
    } 
?>
<!-- Exercice 3 -->
<?php
    function ChercheM($mot){
        $ok=true;
        for($i=0;$i=$mot;$i++){
            if (condition) {
                # code...
            }
        }
    }
?>
<!-- Exercice 5 -->
<?php
            function testOrange($numero){

               $reg ='#^77[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#';
                $reg1 = '#^78[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#';
                    if (preg_match($reg,$numero)|| preg_match($reg1,$numero)) {
                        $ok = "vrai";
                    }else{
                        $ok = "faux";
                    }
                    return  $ok;
            }

            function testFree($numero){

                $reg ='#^76[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#';
                     if (preg_match($reg,$numero)) {
                         $ok = "vrai";
                     }else{
                         $ok = "faux";
                     }
                     return  $ok;
             }

             function testExpresso($numero){

                $reg ='#^70[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#';
                     if (preg_match($reg,$numero)) {
                         $ok = "vrai";
                     }else{
                         $ok = "faux";
                     }
                     return  $ok;
             }

?>
<!-- Application 1 -->
<?php
    function matrice($n){
        $c1=$_POST['select'];
        $c2=$_POST['select1'];

        echo"<table border='1' width='500px'; height='500px';>";
            for($i=0; $i<$n; $i++){
                echo"<tr>";
                for ($j=0; $j <$n ; $j++) { 
                    # code...
                        
                        if($j>$i && $j<($n-$i-1)){
                            echo"<td bgcolor='$c1'></td>";
                        }
                        elseif ($j==$i) {
                            # code...
                            echo"<td bgcolor='$c1'></td>";
                        }
                        elseif ($j==($n-$i-1)) {
                            # code...
                            echo"<td bgcolor='$c1'></td>";
                        }
                        elseif ($j>$i || $j<($n-$i-1)) {
                            # code...
                            echo"<td bgcolor='$c2'></td>";
                        }
                       else {
                           # code...
                           echo"<td></td>";
                       } 
                    }
                    echo"</tr>";
                 }
                 echo"</table>";
    }

>>>>>>> 197f4e04877e3d192eac2da96f702553d15c9976
?>