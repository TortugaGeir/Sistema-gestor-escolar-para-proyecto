<?php

$id_grados = $_GET['id'];

$query_grados = $pdo->prepare("SELECT * FROM grados INNER JOIN niveles 
ON grados.nivel_id= niveles.id_nivel WHERE grados.estado ='1' 
AND grados.id_grados = '$id_grados'");
$query_grados->execute();
$grados = $query_grados->fetchAll(PDO:: FETCH_ASSOC);

foreach ($grados as $grados) {
$nivel_id = $grados['nivel_id']; 
$nivel = $grados['nivel'];
$grado = $grados['grado'];
$seccion = $grados['seccion'];
$fyh_create = $grados['fyh_create'];
$estado = $grados['estado'];
}

?>