<?php
require_once ('../../app/config.php');

$id_asignatura = $_POST['id_asignatura'];


  $sentencia = $pdo->prepare ("DELETE FROM asignaturas WHERE id_asignaturas=:id_asignatura");

  $sentencia->bindParam(':id_asignatura',$id_asignatura);
  
try{
      if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se elimino la asignatura correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/asignaturas");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido eliminar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/asignaturas");
    
    }

} catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }


?>