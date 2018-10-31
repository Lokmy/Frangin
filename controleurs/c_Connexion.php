<?php
if(!isset($_REQUEST['action'])){
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];

switch($action){
    case 'demandeConnexion':{
        include("vues/v_connexion.php");
        break;
    }
    case 'valideConnexion':{
        $login = $_REQUEST['login'];
        $mdp = $_REQUEST['mdp'];
        $user = $pdo->getInfosUser($login,$mdp);
        if(empty($user["id"])){
            ajouterErreur("Login ou mot de passe incorrect");
            include("vues/v_erreurs.php");
            include("vues/v_connexion.php");
        }
        else
        {
            $id = $user['id'];
            $nom =  $user['nom'];
            $prenom = $user['prenom'];
            $_SESSION['login']= $login; // memorise les variables de session
            $_SESSION['id']= $id;
            $_SESSION['nom']= $nom;
            $_SESSION['prenom']= $prenom;

            include("vues/v_sommaire.php");
            include("vues/v_accueil.php");
        }
        break;
    }

    case 'connecte':
    {
        include("vues/v_sommaire.php");
        include("vues/v_accueil.php");
        break;
    }

    case 'nouveauMdp':
    {
        if(isset($_REQUEST['nmdp'])){
            $mdp = $_REQUEST['nmdp'];
            $pdo->setNewMdpVisiteur($mdp,$_SESSION['login']);
            include("vues/v_sommaire.php");
            include("vues/v_accueil.php");
        }
        break;
    }
    case 'deconnexion':
    {
        session_destroy();
        include("vues/v_connexion.php");
        break;
    }
}
?>
