<?php

$query_calificaciones = $pdo->prepare("SELECT * FROM calificaciones
WHERE estado ='1' ");
$query_calificaciones->execute();
$calificaciones = $query_calificaciones->fetchAll(PDO:: FETCH_ASSOC);