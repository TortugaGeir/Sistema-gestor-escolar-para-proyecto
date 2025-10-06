<?php

$query_asignaturas = $pdo->prepare("SELECT * FROM asignaturas WHERE id_asignaturas = '$id_asignatura' ");
$query_asignaturas->execute();
$asignaturas = $query_asignaturas->fetchAll(PDO:: FETCH_ASSOC);

foreach($asignaturas as $asignaturas){
$asignatura= $asignaturas ['nombre_asignatura'];
$descripcion = $asignaturas ['descripcion'];
$fyh_create = $asignaturas ['fyh_create'];
$estado = $asignaturas ['estado'];

}

?>