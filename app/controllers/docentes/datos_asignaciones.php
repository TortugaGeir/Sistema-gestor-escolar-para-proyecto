<?php

$query_asignaciones = $pdo->prepare("SELECT * FROM asignaciones INNER JOIN docentes 
ON asignaciones.docentes_id= docentes.id_docentes
INNER JOIN niveles ON asignaciones.nivel_id= niveles.id_nivel
INNER JOIN grados ON asignaciones.grados_id = grados.id_grados
INNER JOIN asignaturas ON asignaciones.asignaturas_id = asignaturas.id_asignaturas
 WHERE asignaciones.estado ='1'");
$query_asignaciones->execute();
$asignaciones_docente = $query_asignaciones->fetchAll(PDO:: FETCH_ASSOC);




?>