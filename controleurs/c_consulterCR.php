<?php

include("vues/v_sommaire.php");

//$vis_num = htmlspecialchars($_POST['VIS_MATRICULE']);
$raps = $pdo->getLesComptesRendus();
$rap = $pdo->getLeCompteRenduMin();
$pra_num = $rap['PRA_NUM'];
$pra_max = $pdo->getPraticiensMaxNum();
$praticien = $pdo->getLePraticien($rap['PRA_NUM']);
$type = $pdo->getLeTypeDuPraticien($praticien['TYP_CODE']);
$pra_not = $pdo->getNotorietePraticien($pra_num, $praticien['PRA_COEFNOTORIETE']);
$visiteur = $pdo->getLeVisiteur($rap['VIS_MATRICULE']);
$secteur = $pdo->getLeSecteurDuVisiteur($visiteur['SEC_CODE']);
$labo = $pdo->getLeLaboDuVisiteur($visiteur['LAB_CODE']);

include_once('vues/v_consulterCR.php');


?>
