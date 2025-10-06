<?php
require_once ('../../../app/config.php');

$id_grado = $_POST['id_grado'];

$nivel = $_POST['nivel_id'];
$grado = $_POST['grado'];
$seccion = $_POST['seccion'];


$sentencia = $pdo->prepare ("UPDATE grados 
SET nivel_id=:nivel,grado=:grado,seccion=:seccion,fyh_update=:fyh_update
  WHERE id_grados=:id_grado");

  $sentencia->bindParam(':nivel',$nivel);
  $sentencia->bindParam(':grado',$grado);
  $sentencia->bindParam(':seccion',$seccion);
  $sentencia->bindParam(':fyh_update',$fechaHora);
  $sentencia->bindParam(':id_grado',$id_grado);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha actualizado correctamente el grado";
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