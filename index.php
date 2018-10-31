<?php
require_once("include/fct.inc.php");
require_once ("include/modele.inc.php");
include("vues/v_entete.php");

session_start();
$pdo = PdoGsb::getPdoGsb();

if(!isset($_REQUEST['uc']))
{
    $_REQUEST['uc'] = 'acceuil';
}
if ((!isset($_SESSION['login'])))
{
    $_REQUEST['uc'] = 'connexion';
}

$uc = $_REQUEST['uc'];



switch($uc)
{
  case 'connexion':
    include("controleurs/c_Connexion.php");
  break;

  case 'profil':
    include("controleurs/c_Profil.php");
  break;

  case 'invitation':
    include("controleurs/c_Invitation.php");
  break;

  case 'event':
    include("controleurs/c_Evenement.php");
  break;

  case 'acceuil':
    include("vues/v_sommaire.php");
    include("vues/v_accueil.php");
	break;

  default:
    include("vues/v_404.php");
  break;
}

include("vues/v_pied.php");

?>
