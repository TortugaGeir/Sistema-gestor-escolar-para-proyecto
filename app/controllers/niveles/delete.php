<?php
require_once ('../../app/config.php');

$id_niveles = $_POST['id_nivel'];


  $sentencia = $pdo->prepare ("DELETE FROM niveles WHERE id_nivel=:id_nivel");

  $sentencia->bindParam(':id_nivel',$id_niveles);
  
try{
      if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se elimino el nivel correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/instituciones");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido eliminar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/configuraciones/instituciones");
    
    }

} catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }


?>