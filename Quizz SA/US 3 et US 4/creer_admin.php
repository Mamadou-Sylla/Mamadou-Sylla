<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style_creer_admin.css">
    </head>
    <body>
        <div class="inscrire">
            <h2>S'INSCRIRE</h2>
            <h6>Pour proposer des quizz</h6>
            <hr>
            <form>
                <label>Prénom</label><br/>
                <input type="text" name="prenom" placeholder="Prénom" id="input"><br/>
                <label>Nom</label><br/>
                <input type="text" name="nom" placeholder="Nom" id="input"><br/>
                <label>Login</label><br/>
                <input type="text" name="login" placeholder="Login" id="input"><br/>
                <label>Password</label><br/>
                <input type="password" name="password" placeholder="Password" id="input"><br/>
                <label>Confimer Password</label><br/>
                <input type="password" name="confirm_pwd" placeholder="Confirmer votre password" id="input"><br/><br/>
                <label style="font-size:15px; color:black">Avatar</label>    
                <input type="file" name="profil" id="profil" value="Choisir un fichier" id="btn_file"><br/><br/>
                <input type="submit" name="creer_compte" value="Créer un compte" placeholder="Prénom" id="btn_creer_compte">
            </form>
        </div>
        <div class="avatar_admin">
        </div>
    </body>
</html>