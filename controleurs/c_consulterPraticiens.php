<?php
/*
 * Auteur : Tom
 * Date de cr?ation : 02/03/2017
 */

include("vues/v_sommaire.php");

if(isset($_POST['pra_num']))
{
    $pra_num = htmlspecialchars($_POST['pra_num']);
    $pra_max = $pdo->getPraticiensMaxNum();
    $praticien = $pdo->getLePraticien($pra_num);
    $type = $pdo->getLeTypeDuPraticien($praticien['TYP_CODE']);
    $pra_not = $pdo->getNotorietePraticien($pra_num, $praticien['PRA_COEFNOTORIETE']);

    include_once('vues/v_consulterPraticiens.php');
}
else
{
    $praticiens = $pdo->getLesPraticiens();
    include_once('vues/v_selectionnerPraticien.php');
}

?>
