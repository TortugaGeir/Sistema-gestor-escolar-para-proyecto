<?php

$query_asignaturas = $pdo->prepare("SELECT * FROM asignaturas");
$query_asignaturas->execute();
$asignaturas = $query_asignaturas->fetchAll(PDO:: FETCH_ASSOC);

?>