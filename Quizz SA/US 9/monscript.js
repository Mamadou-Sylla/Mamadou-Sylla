
let myform=document.getElementById('creer_question');
myform.addEventListener('submit', function(e){
    let myinput=document.getElementById('answer');
    if(!myinput.value){
        if(myinput.hasAttribute("Error")){
        var idSpanError=myinput.getAttribute("Error");
        //On récupère le span à partir de l'id correspondant au value de l'attribut error dans l'input 
        let idSpan = document.getElementById(idSpanError);
        //On applique les modifications
        idSpan.textContent="Ce champ est obligatoire";
        idSpan.style.color='red';
        e.preventDefault();
    }
}
else if((myinput.value.match('/^[a-zA-Z0-9]*$/'))){
    if(myinput.hasAttribute("Error")){
        var idSpanCar=myinput.getAttribute("Error");
        //On récupère le span à partir de l'id correspondant au value de l'attribut error dans l'input 
        let idSpanC = document.getElementById(idSpanCar);
     idSpanC.textContent="Caractére invalide.";
     idSpanC.style.color='red';
    e.preventDefault();
    }
}
});

 //Validation Nombre de point
 let myScore=document.getElementById('creer_question');
 myScore.addEventListener('submit', function(e){
     let myScoreinf=document.getElementById('howmuch');
     if(!myScoreinf.value){
         if(myScoreinf.hasAttribute("Error")){
         var Error_score=myScoreinf.getAttribute("Error");
         //On récupère le span à partir de l'id correspondant au value de l'attribut error dans l'input 
         let Msg_score = document.getElementById(Error_score);
         //On applique les modifications
         Msg_score.textContent="Ce champ est obligatoire";
         Msg_score.style.color='red';
         e.preventDefault();
     }
 }
 else if(myScoreinf.value<1){
     if(myScoreinf.hasAttribute("Error")){
         var Msg_Nbr=myScoreinf.getAttribute("Error");
         //On récupère le span à partir de l'id correspondant au value de l'attribut error dans l'input 
         let Msg_nbre = document.getElementById(Msg_Nbr);
         Msg_nbre.textContent="Caractére invalide.";
         Msg_nbre.style.color='red';
     e.preventDefault();
     }
 }
 });

 //Validation Nombre de point
 let myReponse=document.getElementById('creer_question');
 myReponse.addEventListener('submit', function(e){
     let myReponseinf=document.getElementById('inputs');
     if(!myReponseinf.value){
         if(myReponseinf.hasAttribute("Error")){
         var Error_Reponse=myReponseinf.getAttribute("Error");
         //On récupère le span à partir de l'id correspondant au value de l'attribut error dans l'input 
         let Msg_rep = document.getElementById(Error_Reponse);
         //On applique les modifications
         Msg_rep.textContent="Ce champ est obligatoire";
         Msg_rep.style.color='red';
         e.preventDefault();
     }
 }
 else if(myReponseinf.value.match('/^[a-zA-Z0-9]*$/')){
     if(myReponseinf.hasAttribute("Error")){
         var Repondse_error=myReponseinf.getAttribute("Error");
         //On récupère le span à partir de l'id correspondant au value de l'attribut error dans l'input 
         let car_invalid = document.getElementById(Repondse_error);
         car_invalid.textContent="Caractére invalide.";
         car_invalid.style.color='red';
     e.preventDefault();
     }
 }
 });


 const radios = document.querySelectorAll('input[type="radio"]:checked');
 if (selectedValue == "Une_reponse" && radios.length == 0) {
     error = true;
     document.getElementById('error_2').innerText = "*Veuillez cocher la bonne réponse";
 }

 const checkbox = document.querySelectorAll('input[type="checkbox"]:checked');
 if (selectedValue == "Multiple" && checkbox.length < 2) {
     error = true;
     document.getElementById('error_2').innerText = "*Veuillez cocher 2 réponses au moins";
 }
 if (error) {
     e.preventDefault();
     return false;
 }