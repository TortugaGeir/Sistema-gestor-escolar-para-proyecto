<?php

$query_instituciones = $pdo->prepare("SELECT * FROM configuracion_instituciones  WHERE estado = '1'");
$query_instituciones->execute();
$instituciones = $query_instituciones->fetchAll(PDO:: FETCH_ASSOC);

?>