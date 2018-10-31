<?php

include_once '../include/modele.inc.php';
$pdo = PdoGsb::getPdoGsb();

$idB  = $_REQUEST['idB'];
$ret = $pdo->getIngredientsS2($idB);
echo json_encode($ret);
?>
