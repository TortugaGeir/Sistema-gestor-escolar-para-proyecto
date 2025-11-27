<?php

$query_calificaciones_estudiante = $pdo->prepare("SELECT * FROM calificaciones
INNER JOIN docentes ON calificaciones.docentes_id = docentes.id_docentes
INNER JOIN asignaturas ON calificaciones.asignaturas_id = asignaturas.id_asignaturas
INNER JOIN estudiante ON calificaciones.estudiante_id = estudiante.id_estudiante
INNER JOIN historial_academico ON historial_academico.estudiante_id = estudiante.id_estudiante
INNER JOIN grados ON historial_academico.grados_id = grados.id_grados
INNER JOIN periodo_educativo ON historial_academico.periodo_id = periodo_educativo.id_periodo
INNER JOIN personas ON personas.id_personas = estudiante.personas_id
INNER JOIN usuarios ON personas.usuario_id = usuarios.id_usuarios
 WHERE calificaciones.estado ='1' ");
$query_calificaciones_estudiante->execute();
$calificaciones_estudiante = $query_calificaciones_estudiante->fetchAll(PDO:: FETCH_ASSOC);