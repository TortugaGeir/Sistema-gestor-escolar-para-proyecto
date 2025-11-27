<?php
$id_docente = $_GET['id_docente'];
$id_asignatura = $_GET['id_asignatura'];

$query_contenidos = $pdo->prepare("SELECT * FROM contenido
INNER JOIN asignaciones ON contenido.asignaciones_id = asignaciones.id_asignaciones
WHERE contenido.estado ='1' and asignaciones.asignaturas_id='$id_asignatura' and asignaciones.docentes_id = '$id_docente'");
$query_contenidos->execute();
$row = $query_contenidos->rowCount();
$contenidos = $query_contenidos->fetchAll(PDO:: FETCH_ASSOC);