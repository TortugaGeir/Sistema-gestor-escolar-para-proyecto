<?php
include ('../../../app/config.php');

$id_rol = $_POST['id_rol'];


  $sentencia = $pdo->prepare ("DELETE FROM roles WHERE id_roles = $id_rol");
  

    if($sentencia->execute()){
      session_start();
        $_SESSION['mensaje'] = "Se elimino el rol correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles");
    }else{
      $_SESSION['mensaje'] = "No se ha podido eliminar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/roles");
    
    }


?>