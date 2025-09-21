<?php
require_once ('../../../../app/config.php');

$periodo = $_POST['periodo'];
$momento = $_POST['momento'];
$estado = $_POST['estado'];

if($estado == "ACTIVO"){
  $estado = 1;
}else{
  $estado = 0;
}


$sentencia = $pdo->prepare ("INSERT INTO periodo_educativo (periodo,momento,fyh_create,estado)
  VALUES (:periodo,:momento,:fyh_create,:estado)");

  $sentencia->bindParam(':periodo',$periodo);
  $sentencia->bindParam(':momento',$momento);
  $sentencia->bindParam(':fyh_create',$fechaHora);
  $sentencia->bindParam(':estado',$estado);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente el periodo";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/periodos");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/configuraciones/periodos/create.php");
    
    }


  }catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }
  

  ?>