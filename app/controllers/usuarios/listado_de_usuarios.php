<?php

$query_usuarios = $pdo->prepare("SELECT * FROM usuarios INNER JOIN roles 
ON usuarios.rol_id= roles.id_roles");
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO:: FETCH_ASSOC);

?>