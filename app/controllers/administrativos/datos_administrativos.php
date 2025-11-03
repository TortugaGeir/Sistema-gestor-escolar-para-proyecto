<?php

$query_administrativos = $pdo->prepare("SELECT * FROM usuarios INNER JOIN roles 
ON usuarios.rol_id= roles.id_roles
INNER JOIN personas ON personas.usuario_id = usuarios.id_usuarios
INNER JOIN administrativos ON administrativos.personas_id = personas.id_personas 
WHERE administrativos.estado ='1' and administrativos.id_administrativos = '$id_administrativo'");
$query_administrativos->execute();
$administrativos = $query_administrativos->fetchAll(PDO:: FETCH_ASSOC);

foreach($administrativos as $administrativos) {
  $id_administrativos = $administrativos ['id_administrativos'];
  $id_personas = $administrativos ['id_personas'];
  $id_usuarios = $administrativos ['id_usuarios'];
  $nombres = $administrativos ['nombres'];
  $apellidos = $administrativos ['apellidos'];
  $ci = $administrativos ['ci'];
  $fecha_nacimiento = $administrativos ['fecha_nacimiento'];
  $tlf = $administrativos ['telefono'];
  $profesion = $administrativos ['profesion'];
  $email = $administrativos ['email'];
  $direccion = $administrativos ['direccion'];
  $estado = $administrativos ['estado'];
  $fyh_create = $administrativos ['fyh_create'];
  $rol = $administrativos ['nombre_rol'];
}

?>