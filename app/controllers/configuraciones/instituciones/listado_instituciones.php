<?php

$query_instituciones = $pdo->prepare("SELECT * FROM configuracion_instituciones");
$query_instituciones->execute();
$instituciones = $query_instituciones->fetchAll(PDO:: FETCH_ASSOC);

?>