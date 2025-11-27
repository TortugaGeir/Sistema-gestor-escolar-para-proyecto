<?php

$query_contenidos_estudiantes = $pdo->prepare("SELECT * FROM contenido
INNER JOIN asignaciones ON contenido.asignaciones_id = asignaciones.id_asignaciones
INNER JOIN asignaturas ON asignaciones.asignaturas_id = asignaturas.id_asignaturas
INNER JOIN grados ON asignaciones.grados_id = grados.id_grados
INNER JOIN historial_academico ON historial_academico.grados_id = grados.id_grados
INNER JOIN estudiante ON historial_academico.estudiante_id = estudiante.id_estudiante
INNER JOIN personas ON estudiante.personas_id = personas.id_personas
INNER JOIN usuarios ON personas.usuario_id = usuarios.id_usuarios
WHERE contenido.estado ='1'");
$query_contenidos_estudiantes->execute();
$row = $query_contenidos_estudiantes->rowCount();
$contenidos_estudiantes = $query_contenidos_estudiantes->fetchAll(PDO:: FETCH_ASSOC);