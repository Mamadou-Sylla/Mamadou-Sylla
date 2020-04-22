<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style_lister_question.css">
    </head>
    <body>
        <div class="container">
            <form>
                <div class="nbre_question">
                    <label id="label">Nbre de question/Jeu</label>
                    <input type="text" name="nombre" placeholder="N" id="Nbr_question">
                    <input type="submit" name="valider" value="OK" id="valider">
                </div>
                <div class="liste_question">
                        <label id="title">1. Langages web</label><br/>
                            <input id="input" type="checkbox" id="html" name="html">
                            <label for="html">HTML</label><br/>
                            <input id="input" type="checkbox" id="r" name="r">
                            <label for="html">R</label><br/>
                            <input id="input" type="checkbox" id="java" name="java">
                            <label for="html">JAVA</label><br/>
                        <label id="title">2. D'où vient le Corona</label><br/>
                            <input id="checkbox" type="checkbox" id="italie" name="italie">
                            <label for="html">Italie</label><br/>
                            <input id="checkbox" type="checkbox" id="chine" name="chine">
                            <label for="html">Chine</label><br/>
                        <label id="title">3. Quel terme définit langage qui s’adapte sur Androïd et sur Ios</label><br/>
                            <input type="text" name="texte" id="texte"><br/>
                        <label id="title">4. Quelle est la première école de codage gratuite au Sénégal</label><br/>
                            <input id="checkbox" type="checkbox" id="simplon" name="simplon">
                            <label for="simplon">Simplon</label><br/>
                            <input id="checkbox" type="checkbox" id="odc" name="odc">
                            <label for="odc">Orange Digital Center</label><br/>
                        <label id="title">5. Les précurseurs de la révolution digitale</label> <br/>  
                            <input id="checkbox"  type="checkbox" id="gafam" name="gafam">
                            <label for="gafam">GAFAM</label><br/>
                            <input id="checkbox" type="checkbox" id="cia-fbi" name="cia-fbi">
                            <label for="cia-fbi">CIA-FBI</label><br/> 
                </div>
                <div class="btn_suivant">
                     <input type="submit" name="creer_compte" value="Suivant" placeholder="Prénom" id="btn_creer_compte">
                </div>
            </form>
        </div>
        <div class="avatar_admin">
        </div>
    </body>
</html>