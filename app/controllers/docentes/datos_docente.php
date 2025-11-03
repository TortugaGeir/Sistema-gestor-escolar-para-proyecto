<?php

$query_docentes = $pdo->prepare("SELECT * FROM usuarios INNER JOIN roles 
ON usuarios.rol_id= roles.id_roles
INNER JOIN personas ON personas.usuario_id = usuarios.id_usuarios
INNER JOIN docentes ON docentes.personas_id = personas.id_personas 
WHERE docentes.estado ='1' and docentes.id_docentes = '$id_docentes
'");
$query_docentes->execute();
$docentes = $query_docentes->fetchAll(PDO:: FETCH_ASSOC);

foreach($docentes as $docentes) {
  $id_docentes = $docentes ['id_docentes'];
  $id_personas = $docentes ['id_personas'];
  $id_usuarios = $docentes ['id_usuarios'];
  $nombres = $docentes ['nombres'];
  $apellidos = $docentes ['apellidos'];
  $ci = $docentes ['ci'];
  $fecha_nacimiento = $docentes['fecha_nacimiento'];
  $tlf = $docentes['telefono'];
  $profesion = $docentes ['profesion'];
  $especialidad = $docentes ['especialidad'];
  $antiguedad = $docentes ['antiguedad'];
  $email = $docentes ['email'];
  $direccion = $docentes ['direccion'];
  $estado = $docentes ['estado'];
  $fyh_create = $docentes ['fyh_create'];
  $rol = $docentes ['nombre_rol'];
}

?>