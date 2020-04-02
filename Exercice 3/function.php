
<!-- Exercice 3 -->
<?php
        //Fonction 1 pour determiner si une caractere majuscule 
    function is_upper($upper){
        if(($upper>='A' ) && ($upper <='Z')){
            $upper++;
            $ok=true;
        }
        else{
           $ok=false;
        }
           return $ok;
        }
                //Fonction 2 pour determiner si une caractere miniscule 
     function is_lower($lower){
         if(($lower>='a' ) && ($lower <='z')){
             $lower++;
              $ok=true;
        }
        else{
              $ok=false;
          }
                return $ok;    
         }
  //Fonction 3 pour determiner si un nombre est entier
  function is_number($num){
    if($num >= '0' && $num <= '9'){
        $ok=true;
    }
    else{
        $ok=false;
    }
    return $ok;
}
        //Fonction pour vérifier si un entier est valide c'est-à-dire s'il est positif
        function is_entier($entier){
            for ($i=0; $i <is_numeric($entier) ; $i++) { 
                # code...*
                if (($entier[$i]>=0 && !($entier>='a') && !($entier>='z') && !($entier>='A') && !($entier>='Z'))){
                    $ok=true;
                }
                else{
                    $ok=false;
                }
            }
            return $ok;
        }
                 //Fonction 4 pour determiner la taille d'une tableau ou d'un chaine
    function my_strlen($mot){
        $j=0;
            for($i=0; (isset($mot[$i])); $i++){
                # code...
                $j++;  
        }
        return $j;
    } 
  
             //Fonction 5 pour determiner si la taille d'une tableau ou d'un chaine
     function is_valid($valid){
            $compt=my_strlen($valid);
                for($i=0;$i<$compt;$i++){
                    if (is_upper($valid[$i]) || is_lower($valid[$i])){
                        # code...
                            $ok=true;
                    }
                    else{
                        $ok=false;
                    }
                }
                return $ok;
            } 
              //Fonction 6 pour determiner si un caractére est dans une chaine
     function is_car_in_string($val,$car){
        $k=0;
                    while($k<(my_strlen($val)) && ($car!=$val[$k])){
                            # code...
                            $k++;
                        }
                        if ($k==my_strlen($val)) {
                            # code...
                            $ok=false;
                        }
                        else{
                            
                            $ok=true;
                        }
 
                    return $ok; 
            }            
              //Fonction 7 pour retourner une chaine en supprimant les espaces 
              function my_trim($trim){
                $newtrim="";
                for ($i=0; $i < my_strlen($trim); $i++) { 
                    # code...
                    if ($trim[$i]!=" ") {
                        # code...
                        $newtrim.=$trim[$i];
                    }
                }
                    return $newtrim;
              }
              //Fonction 8 pour determiner si un caractére est dans une chaine
            function Inverse_case($inverse){

            }
?>
