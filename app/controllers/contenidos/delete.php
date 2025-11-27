<?php
require_once ('../../../app/config.php');

$id_contenido = $_POST['id_contenido'];


  $sentencia = $pdo->prepare ("DELETE FROM contenido WHERE id_contenido=:id_contenido");

  $sentencia->bindParam(':id_contenido',$id_contenido);
  
try{
      if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se elimino el contenido correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/contenidos/create.php");
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