<?php
require_once ('../../../app/config.php');

$id_docente = $_GET['id_docente'];
$id_estudiante = $_GET['id_estudiante'];
$id_asignatura = $_GET['id_asignatura'];
echo $nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$nota3 = $_GET['nota3'];


/////nota 1//////

$sql = "SELECT * FROM calificaciones WHERE docentes_id = '$id_docente' and estudiante_id = '$id_estudiante' and asignaturas_id = '$id_asignatura' ";

$query = $pdo->prepare($sql);
$query->execute();
$notas = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($notas as $nota){
  $id_calificacion = $nota['id_calificacion'];
}
if($notas){
echo "si existe registro";


  $sentencia = $pdo->prepare("UPDATE calificaciones 
  SET nota_1°=:nota1,nota_2°=:nota2,nota_3°=:nota3,fyh_update=:fyh_update,estado=:estado
  WHERE id_calificacion =:id_calificacion ");

  $sentencia->bindParam(':id_calificacion',$id_calificacion);
  $sentencia->bindParam(':nota1',$nota1);
  $sentencia->bindParam(':nota2',$nota2);
  $sentencia->bindParam(':nota3',$nota3); 
  $sentencia->bindParam(':fyh_update',$fechaHora);
  $sentencia->bindParam(':estado',$estado_de_registro );
  $sentencia->execute();
}else{
  //echo "no existe registro";

  $sentencia = $pdo->prepare("INSERT INTO calificaciones 
  (docentes_id,estudiante_id,asignaturas_id,nota_1°,nota_2°,nota_3°,fyh_create,estado)
  VALUES (:docentes_id,:estudiante_id,:asignaturas_id,:nota1,:nota2,:nota3,:fyh_create,:estado)");

  $sentencia->bindParam(':docentes_id',$id_docente);
  $sentencia->bindParam(':estudiante_id',$id_estudiante);
  $sentencia->bindParam(':asignaturas_id',$id_asignatura);
  $sentencia->bindParam(':nota1',$nota1);
  $sentencia->bindParam(':nota2',$nota2);
  $sentencia->bindParam(':nota3',$nota3); 

  $sentencia->bindParam(':fyh_create',$fechaHora);
  $sentencia->bindParam(':estado',$estado_de_registro );
  $sentencia->execute();
}

  //$sentencia->bindParam(':nota2',$nota2);
  //$sentencia->bindParam(':nota3',$nota3); 

