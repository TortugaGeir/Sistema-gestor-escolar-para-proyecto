<?php
$id_grado = $_GET['id_grados'];

$query_estudiantes = $pdo->prepare("SELECT * FROM usuarios INNER JOIN roles 
ON usuarios.rol_id= roles.id_roles
INNER JOIN personas ON personas.usuario_id = usuarios.id_usuarios
INNER JOIN estudiante ON estudiante.personas_id = personas.id_personas
INNER JOIN historial_academico ON historial_academico.estudiante_id = estudiante.id_estudiante
INNER JOIN grados ON historial_academico.grados_id = grados.id_grados
INNER JOIN niveles ON grados.nivel_id = niveles.id_nivel
WHERE estudiante.estado ='1' and id_grados = '$id_grado'");
$query_estudiantes->execute();
$estudiantes_calificar = $query_estudiantes->fetchAll(PDO:: FETCH_ASSOC);

?>