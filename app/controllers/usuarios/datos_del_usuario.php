<?php

$query_usuarios = $pdo->prepare("SELECT * FROM usuarios INNER JOIN roles 
ON usuarios.rol_id= roles.id_roles WHERE usuarios.estado = '1' and usuarios.id_usuarios = '$id_usuario' ");
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO:: FETCH_ASSOC);

foreach($usuarios as $usuarios){

$nombres = $usuarios ['nombres'];
$apellidos = $usuarios['apellidos'];
$nombre_rol = $usuarios ['nombre_rol'];
$email = $usuarios ['email'];
$fyh_create = $usuarios ['fyh_create'];
$estado = $usuarios ['estado'];
}

?>