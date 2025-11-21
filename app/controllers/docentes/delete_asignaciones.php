<?php
require_once ('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];

  $sentencia = $pdo->prepare ("DELETE FROM asignaciones WHERE id_asignaciones=:id_asignaciones");

  $sentencia->bindParam(':id_asignaciones',$id_asignacion);
  
try{
      if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se elimino la asignación correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/docentes/asignacion.php");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido eliminar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/docentes/asignacion.php");
    
    }

} catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }


?>

