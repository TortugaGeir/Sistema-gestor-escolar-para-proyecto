<?php

$id_periodo = $_GET['id'];

$query_periodo = $pdo->prepare("SELECT * FROM periodo_educativo WHERE id_periodo = '$id_periodo' ");
$query_periodo->execute();
$periodos = $query_periodo->fetchAll(PDO:: FETCH_ASSOC);

foreach($periodos as $periodos){

$periodo = $periodos['periodo'];
$estado = $periodos['estado'];


$fyh_create = $periodos['fyh_create'];
}

?>