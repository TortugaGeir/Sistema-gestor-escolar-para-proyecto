<?php
include ('../../../app/config.php');

$nombre_rol = $_POST['nombre_rol'];

$id_rol = $_POST['id_rol'];
$nombre_rol = mb_strtoupper ($nombre_rol, encoding: 'UTF-8');

if($nombre_rol == ""){
  $_SESSION['mensaje'] = "Llene el campo";
  $_SESSION['icono'] = "warning";
  header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol);
}else{
  $sentencia = $pdo->prepare ("UPDATE FROM roles 
  SET ':nombre_rol', ':fyh_update' WHERE id_roles = ':id_rol' ");

  $sentencia->bindParam (':nombre_rol',$nombre_rol);
  $sentencia->bindParam (':fyh_update',$fechaHora);
  $sentencia->bindParam (':id_rol',$id_rol);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['mensaje'] = "Se ha actualizado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles");
    }else{
      $_SESSION['mensaje'] = "No se ha podido realizar la actualización";
      $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol);
    
    }


  }catch (Exception $exception) {

    $_SESSION['mensaje'] = "Rol ya existente";
    $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol);
  }
  

}

?>