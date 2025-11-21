<?php
require_once ('../../../../app/config.php');

$id_instituciones = $_POST['id_instituciones'];


  $sentencia = $pdo->prepare ("DELETE FROM configuracion_instituciones WHERE id_config_institucion=:id_instituciones");

  $sentencia->bindParam(':id_instituciones',$id_instituciones);
  

    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se elimino la institución correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/instituciones");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido eliminar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/configuraciones/instituciones");
    
    }


?>