<?php
require_once ('../../../app/config.php');

$periodo = $_POST['periodo_id'];
$niveles = $_POST['niveles'];
$turno = $_POST['turno'];


$sentencia = $pdo->prepare ("INSERT INTO niveles (periodo_id,nivel,turno,fyh_create,estado)
  VALUES (:periodo,:nivel,:turno,:fyh_create,:estado)");

  $sentencia->bindParam(':periodo',$periodo);
  $sentencia->bindParam(':nivel',$niveles);
  $sentencia->bindParam(':turno',$turno);
  $sentencia->bindParam(':fyh_create',$fechaHora);
  $sentencia->bindParam(':estado',$estado_de_registro);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente el nivel";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/niveles");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/niveles/create.php");
    
    }


  }catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }
  

  ?>