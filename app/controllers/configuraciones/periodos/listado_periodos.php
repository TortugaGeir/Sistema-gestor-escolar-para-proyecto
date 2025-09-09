<?php

$query_periodos = $pdo->prepare("SELECT * FROM periodo_educativo  WHERE estado = '1'");
$query_periodos->execute();
$periodos = $query_periodos->fetchAll(PDO:: FETCH_ASSOC);

?>