<?php

include("vues/v_sommaire.php");

$action = $_REQUEST['action'];

switch ($action) {
    case 'afficher':
      $evenements = $pdo->getEvents();
      include_once("vues/v_consulterEvents.php");
    break;

    case 'afficherSolo':
      $id = $_REQUEST['id'];
      $evenement = $pdo->getEvent($id);
      include_once("vues/v_consulterEvent.php");
    break;

    case 'creer':
      include_once("vues/v_creerEvent.php");
    break;

    default :
      include("vues/v_erreurs.php");
    break;
}
?>
