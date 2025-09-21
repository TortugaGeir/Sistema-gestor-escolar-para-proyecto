<?php

$query_periodos = $pdo->prepare("SELECT * FROM periodo_educativo ");
$query_periodos->execute();
$periodos = $query_periodos->fetchAll(PDO:: FETCH_ASSOC);

?>