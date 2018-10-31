<!-- Division pour le sommaire -->
<div id="menuGauche">
    <div id="infosUtil">

        <h2>
        </h2>
    </div>
    <ul id="menuList">
        <li>
            Bienvenue :<br>
            <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'];
            ?>
        </li>

        </br>
        <li class="smenu">
            <b><a href="index.php?uc=profil&action=afficher" title="Profil">Profil</b></a></b>
        </li>

        </br>
        <li class="smenu">
            <b><a href="index.php?uc=event&action=afficher" title="Évenements">Évenements</b></a></b>
        </li>

        </br>
        <li class="smenu">
            <b><a href="index.php?uc=invitation" title="Invitations">Invitations</b></a></b>
        </li>

        <br/>
        <li class="smenu">
          <?php echo'<h1><a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a></h1>'; ?>
        </li>
    </ul>

</div>
