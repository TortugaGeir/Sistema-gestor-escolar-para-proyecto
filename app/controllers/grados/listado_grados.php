<?php

$query_grados = $pdo->prepare("SELECT * FROM grados INNER JOIN niveles 
ON grados.nivel_id= niveles.id_nivel WHERE grados.estado ='1'");
$query_grados->execute();
$grados = $query_grados->fetchAll(PDO:: FETCH_ASSOC);

?>