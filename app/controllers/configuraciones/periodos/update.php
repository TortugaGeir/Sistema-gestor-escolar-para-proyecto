<?php
require_once ('../../../../app/config.php');

$id_periodo = $_POST['id_periodo'];

$periodo = $_POST['periodo'];
$momento = $_POST['momento'];
$estado = $_POST['estado'];

if($estado == "ACTIVO"){
  $estado = 1;
}else{
  $estado = 0;
}


$sentencia = $pdo->prepare ("UPDATE periodo_educativo 
SET periodo=:periodo ,momento=:momento,fyh_update=:fyh_update,estado=:estado 
WHERE id_periodo=:id_periodo");

  
  $sentencia->bindParam(':periodo',$periodo);
  $sentencia->bindParam(':momento',$momento);
  $sentencia->bindParam(':fyh_update',$fechaHora);
  $sentencia->bindParam(':estado',$estado);
  $sentencia->bindParam(':id_periodo',$id_periodo);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha actualizado correctamente el periodo";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/periodos");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/configuraciones/periodos/edit.php");
    
    }


  }catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }
  

  ?>