<?php

include ('../../../app/config.php');

$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper ($nombre_rol, encoding: 'UTF-8');

if($nombre_rol == ""){
  $_SESSION['mensaje'] = "Llene el campo";
  $_SESSION['icono'] = "warning";
  header('Location:'.APP_URL."/admin/roles/create.php");
}else{
  $sentencia = $pdo->prepare ("INSERT INTO roles (nombre_rol, fyh_create,estado)
  VALUES ('$nombre_rol','$fechaHora','$estado_de_registro')");
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['mensaje'] = "Se ha registrado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles");
    }else{
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/roles/create.php");
    
    }


  }catch (Exception $exception) {

    $_SESSION['mensaje'] = "Rol ya existente";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles/create.php");
  }
  

}

?>