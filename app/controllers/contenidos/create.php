<?php
require_once ('../../../app/config.php');

$id_asignacion= $_POST['id_asignacion'];
$titulo= $_POST['titulo_contenido'];
$titulo = mb_strtoupper ($titulo, encoding: 'UTF-8');
$descripcion = $_POST['descripcion_contenido'];

if ($_FILES['material_contenido']['name'] !=null){
//echo "existe una imagen";

$nombre_del_archivo = date('Y-m-d-H-i-s') . '-' . $_FILES['material_contenido']['name'];
$location = "../../../public/pdf/material/".$nombre_del_archivo;
move_uploaded_file($_FILES['material_contenido']['tmp_name'],$location);
$material = $nombre_del_archivo;

}else{
//echo "no existe una imagen";
$material = "";
}


$sentencia = $pdo->prepare ("INSERT INTO contenido (asignaciones_id,titulo,descripcion,material,fyh_create,estado)
  VALUES (:id_asignaciones,:titulo,:descripcion,:material,:fyh_create,:estado)");

  $sentencia->bindParam(':id_asignaciones',$id_asignacion);
  $sentencia->bindParam(':titulo',$titulo);
  $sentencia->bindParam(':descripcion',$descripcion);
  $sentencia->bindParam(':material',$material);
  $sentencia->bindParam(':fyh_create',$fechaHora);
  $sentencia->bindParam(':estado',$estado_de_registro);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente el contenido";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/contenidos/create.php?id_asignacion=$id_asignacion&id_docente=$id_docente&id_asignatura=$id_asignatura");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/contenidos/create.php");
    
    }


  }catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }
  

  ?>