<?php

$query_estudiantes = $pdo->prepare("SELECT * FROM usuarios INNER JOIN roles 
ON usuarios.rol_id= roles.id_roles
INNER JOIN personas ON personas.usuario_id = usuarios.id_usuarios
INNER JOIN estudiante ON estudiante.personas_id = personas.id_personas
INNER JOIN historial_academico ON historial_academico.estudiante_id = estudiante.id_estudiante
INNER JOIN grados ON historial_academico.grados_id = grados.id_grados
INNER JOIN periodo_educativo ON historial_academico.periodo_id = periodo_educativo.id_periodo
INNER JOIN estudiante_representante ON estudiante_representante.estudiante_id = estudiante.id_estudiante
INNER JOIN representantes ON estudiante_representante.representante_id = representantes.id_representante
WHERE estudiante.estado ='1'");
$query_estudiantes->execute();
$estudiantes = $query_estudiantes->fetchAll(PDO:: FETCH_ASSOC);

foreach($estudiantes as $estudiantes) {
  $id_estudiantes = $estudiantes ['id_estudiante'];
  $id_representante = $estudiantes ['id_representante'];
  $id_personas = $estudiantes ['id_personas'];
  $id_usuarios = $estudiantes ['id_usuarios'];
  $id_historial = $estudiantes ['id_historial'];
  $id_grados = $estudiantes ['id_grados'];
  $id_periodo = $estudiantes ['id_periodo'];
  $id_est_repre = $estudiantes ['id_est_repre'];
  $nombres_estudiantes = $estudiantes ['nombres'];
  $apellidos_estudiantes = $estudiantes ['apellidos'];
  $ci = $estudiantes ['ci'];
  $foto = $estudiantes['foto'];
  $ci_escolar = $estudiantes ['ci_escolar'];
  $fecha_nacimiento_estudiantes = $estudiantes['fecha_nacimiento'];
  $tlf_estudiantes = $estudiantes['telefono'];
  $deber_estudiantes = $estudiantes ['profesion'];
  $grados = $estudiantes ['grado'];
  $seccion = $estudiantes ['seccion'];
  $periodo = $estudiantes ['periodo'];
  $email_estudiantes = $estudiantes ['email'];
  $direccion_estudiantes = $estudiantes ['direccion'];
  $nombres_representante = $estudiantes ['nombres_repe'];
  $apellidos_representante = $estudiantes ['apellidos_repre'];
  $ci_representante = $estudiantes ['ci_repre'];
  $fecha_nacimiento_representante = $estudiantes['fecha_nacimiento_repre'];
  $tlf_representante = $estudiantes['telefono_repre'];
  $profesion = $estudiantes ['profesion_repre'];
  $parentesco = $estudiantes ['parentesco'];
  $direccion_representante = $estudiantes ['direccion_repre'];
  $estado = $estudiantes ['estado'];
  $estatus = $estudiantes ['estatus'];
  $fyh_create = $estudiantes ['fyh_create'];
  $rol = $estudiantes ['nombre_rol'];
}