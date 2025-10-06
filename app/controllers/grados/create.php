<?php
require_once ('../../../app/config.php');

$nivel = $_POST['nivel_id'];
$grado = $_POST['grado'];
$seccion = $_POST['seccion'];


$sentencia = $pdo->prepare ("INSERT INTO grados (nivel_id,grado,seccion,fyh_create,estado)
  VALUES (:nivel,:grado,:seccion,:fyh_create,:estado)");

  $sentencia->bindParam(':nivel',$nivel);
  $sentencia->bindParam(':grado',$grado);
  $sentencia->bindParam(':seccion',$seccion);
  $sentencia->bindParam(':fyh_create',$fechaHora);
  $sentencia->bindParam(':estado',$estado_de_registro);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente el grado";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/grados");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/grados/create.php");
    
    }


  }catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }
  

  ?>