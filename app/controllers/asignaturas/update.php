<?php
require_once ('../../../app/config.php');

$id_asignatura = $_POST['id_asignatura'];
$asignatura= $_POST['asignatura'];
$asignatura = mb_strtoupper ($asignatura, encoding: 'UTF-8');
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

if($estado == "ACTIVO"){
  $estado = 1;
}else{
  $estado = 0;
}


$sentencia = $pdo->prepare ("UPDATE asignaturas 
 SET nombre_asignatura=:asignatura,descripcion=:descripcion,fyh_update=:fyh_update,estado=:estado
  WHERE id_asignaturas=:id_asignatura");

  $sentencia->bindParam(':asignatura',$asignatura);
  $sentencia->bindParam(':descripcion',$descripcion);
  $sentencia->bindParam(':fyh_update',$fechaHora);
  $sentencia->bindParam(':id_asignatura',$id_asignatura);
  $sentencia->bindParam(':estado',$estado);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha actualizado correctamente la asignatura";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/asignaturas");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/configuraciones/asignaturas/create.php");
    
    }


  }catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }
  

  ?>