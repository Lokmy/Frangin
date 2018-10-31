<?php

include("vues/v_sommaire.php");

$action = $_REQUEST['action'];
$id = $_SESSION['id'];
$event = '00000';

switch ($action) {
    case 'afficher':
      $infos = $pdo->getInfosUserId($id);
      $fav = $pdo->getCommande($id,$event);
      include_once("vues/v_consulterProfil.php");
    break;

    case 'changeFav':
      $sandwichs = $pdo->getSandwichs();
      $sauces = $pdo->getSauces();
      $ingredients = $pdo->getIngredients();
      include_once("vues/v_choixCommande.php");
    break;

    case 'setFav':
      $pdo->delComm($id, $event);
      $pdo->delSupp($id, $event);
      $idB = $_REQUEST['sandwich'];
      if(isset($_REQUEST['salade'])){$s = 1;}else{$s = 0;}
      if(isset($_REQUEST['tomate'])){$t = 1;}else{$t = 0;}
      if(isset($_REQUEST['oignon'])){$o = 1;}else{$o = 0;}
      $s1 = $_REQUEST['sauce1'];
      $s2 = $_REQUEST['sauce2'];
      if($s1 == null && $s2 != null){$s1 = $s2;$s2 = null;}
      $sans = $_REQUEST['sans'];
      if(isset($_REQUEST['supplement'])) {
        $supplements = $_REQUEST['supplement'];
        foreach ($supplements as $supplement) {
          $pdo->setSupp($id, $event,$supplement);
        }
      }
      $pdo->setCommande($id, $event,$idB, $s, $t, $o, $s1, $s2, $sans);
      $infos = $pdo->getInfosUserId($id);
      $fav = $pdo->getCommande($id,$event);
      include_once("vues/v_consulterProfil.php");
    break;

    default :
      include("vues/v_erreurs.php");
    break;
}
?>
