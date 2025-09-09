<?php
require_once ('../../../app/config.php');

$id_usuarios = $_POST['id_usuarios'];


  $sentencia = $pdo->prepare ("DELETE FROM usuarios WHERE id_usuarios = :id_usuarios");

  $sentencia->bindParam(':id_usuarios',$id_usuarios);
  

    if($sentencia->execute()){
      session_start();
        $_SESSION['mensaje'] = "Se elimino el usuario correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/usuarios");
    }else{
      $_SESSION['mensaje'] = "No se ha podido eliminar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/usuarios");
    
    }


?>