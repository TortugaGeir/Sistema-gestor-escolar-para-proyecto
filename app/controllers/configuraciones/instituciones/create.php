<?php

require_once ('../../../../app/config.php');

$nombre_institucion = $_POST['nombre_institucion'];
$email_institucion = $_POST['email_institucion'];
$tipo_institucion = $_POST['tipo_institucion'];
$telefono_institucion = $_POST['telefono_institucion'];
$rif_institucion = $_POST['rif_institucion'];
$codigo_dea = $_POST['codigo_dea'];
$direccion_institucion = $_POST['direccion_institucion'];
$estado = $_POST['estado'];

if($estado == "ACTIVO"){
  $estado = 1;
}else{
  $estado = 0;
}


if ($_FILES['logo']['name'] !=null){
//echo "existe una imagen";

$nombre_del_archivo = date('Y-m-d-H-i-s') . '-' . $_FILES['logo']['name'];
$location = "../../../../public/images/configuraciones/".$nombre_del_archivo;
move_uploaded_file($_FILES['logo']['tmp_name'],$location);
$logo = $nombre_del_archivo;

}else{
//echo "no existe una imagen";
$logo = "";
}

$sentencia = $pdo->prepare("INSERT INTO configuracion_instituciones 
(nombre_institucion,logo,direccion,tipo_institucion,email,telefono,rif,cog_dea,fyh_create, estado)
VALUES (:nombre_institucion,:logo,:direccion,:tipo_institucion,:email,:telefono,:rif,:cog_dea, :fyh_create,:estado)");

$sentencia->bindParam(':nombre_institucion',$nombre_institucion);
$sentencia->bindParam(':logo',$logo);
$sentencia->bindParam(':direccion',$direccion_institucion);
$sentencia->bindParam(':tipo_institucion',$tipo_institucion);
$sentencia->bindParam(':email',$email_institucion );
$sentencia->bindParam(':telefono',$telefono_institucion);
$sentencia->bindParam(':rif',$rif_institucion);
$sentencia->bindParam(':cog_dea',$codigo_dea);
$sentencia->bindParam(':fyh_create',$fechaHora);
$sentencia->bindParam(':estado',$estado);

try{
if($sentencia->execute()){
session_start();
        $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se ha registrado la institución correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/instituciones");
}else{
        $_SESSION['titulo'] = "Oops!";
        $_SESSION['mensaje'] = "No se pudo registrar a la base de datos";
        $_SESSION['icono'] = "error";

        header('Location:'.APP_URL. $_SERVER['HTTP_REFERER']);
}
}
catch(Exception $exception){

        $_SESSION['titulo'] = "Oops!";
        $_SESSION['mensaje'] = "No se pudo registrar a la base de datos". $exception->getMessage();
        $_SESSION['icono'] = "error";
        
        header('Location:'.APP_URL. $_SERVER['HTTP_REFERER']);
}
