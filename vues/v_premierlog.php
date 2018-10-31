<div id="contenu">
    <h2>Premiere connexion</h2>
    <p>On dirais bien que c'est votre premiere connexion ! Veuillez rentrer un mot de passe :</p>
    <form method="POST" action="index.php?uc=connexion&action=nouveauMdp">  
        <br>
        <label for="nom">Mot de passe*</label>
        <input id="nmdp" type="password" name="nmdp" onkeyup="checkMdp(); return false;" size="30" maxlength="45" required>
        <span id="mess" ></span>
        <br>
        <label for="mdp">Confirmation*</label>
        <input id="cmdp"  type="password"  name="cmdp" onkeyup="checkPass(); return false;" size="30" maxlength="45" required>
        <span id="message" ></span>
        <br>
        <input id="valider" type="submit" value="Valider" name="valider">
    </form>
</div>

<script>
function checkMdp()
{
    var nmdp = document.getElementById('nmdp');
    var message = document.getElementById('mess');
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    var cmdp = document.getElementById('cmdp');
    var val = document.getElementById('valider');
    var gagne = "#66cc66";
    var perdu = "#ff6666";
    if (!re.test(nmdp.value))
    {
        nmdp.style.backgroundColor = perdu;
        message.style.color = perdu;
        message.innerHTML = " ✘ Votre mot de passe doit contenir au moins 1 majuscule, 1 minuscule, 1 chiffre et au moins 6 caractères!";
        cmdp.disabled = true;
        val.disabled = true;
    }else{
        nmdp.style.backgroundColor = gagne;
        message.style.color = gagne;
        message.innerHTML = " ✔";
        cmdp.disabled = false;
        val.disabled = false;        
    }
}

function checkPass()
{
    var nmdp = document.getElementById('nmdp');
    var cmdp = document.getElementById('cmdp');    
    var val = document.getElementById('valider');
    var message = document.getElementById('message');
    var gagne = "#66cc66";
    var perdu = "#ff6666";
    if(nmdp.value == cmdp.value){
        cmdp.style.backgroundColor = gagne;
        message.style.color = gagne;
        message.innerHTML = " ✔";
        val.disabled = false;
    }else{
        cmdp.style.backgroundColor = perdu;
        message.style.color = perdu;
        message.innerHTML = " ✘ Les mot de passes ne correspondent pas!";
        val.disabled = true;
    }
}  
</script>