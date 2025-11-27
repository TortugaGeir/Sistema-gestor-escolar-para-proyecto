<?php

$query_permisos = $pdo->prepare("SELECT * FROM permisos ");
$query_permisos->execute();
$permisos = $query_permisos->fetchAll(PDO:: FETCH_ASSOC);

?>