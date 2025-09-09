<?php

require_once ('../../../../app/config.php');

$id_config_institucion = $_POST['id_config_institucion'];

$logo = $_POST['logo'];
$nombre_institucion = $_POST['nombre_institucion'];
$email_institucion = $_POST['email_institucion'];
$tipo_institucion = $_POST['tipo_institucion'];
$telefono_institucion = $_POST['telefono_institucion'];
$rif_institucion = $_POST['rif_institucion'];
$codigo_dea = $_POST['codigo_dea'];
$direccion_institucion = $_POST['direccion_institucion'];



if ($_FILES['logo']['name'] !=null){
//echo "existe una imagen";

$nombre_del_archivo = date('Y-m-d-H-i-s') . '-' . $_FILES['logo']['name'];
$location = "../../../../public/images/configuraciones/".$nombre_del_archivo;
move_uploaded_file($_FILES['logo']['tmp_name'],$location);
$logo = $nombre_del_archivo;

}else{
if($logo == ""){
  $logo = "";
}else{
  $logo = $_POST['logo'];
}

}

$sentencia = $pdo->prepare("UPDATE configuracion_instituciones 
SET nombre_institucion=:nombre_institucion,logo=:logo,direccion=:direccion,tipo_institucion=:tipo_institucion,email=:email,telefono=:telefono,rif=:rif,cog_dea=:cog_dea,fyh_update=:fyh_update
WHERE id_config_institucion=:id_instituciones");

$sentencia->bindParam(':nombre_institucion',$nombre_institucion);
$sentencia->bindParam(':logo',$logo);
$sentencia->bindParam(':direccion',$direccion_institucion);
$sentencia->bindParam(':tipo_institucion',$tipo_institucion);
$sentencia->bindParam(':email',$email_institucion );
$sentencia->bindParam(':telefono',$telefono_institucion);
$sentencia->bindParam(':rif',$rif_institucion);
$sentencia->bindParam(':cog_dea',$codigo_dea);
$sentencia->bindParam(':fyh_update',$fechaHora);
$sentencia->bindParam(':id_instituciones',$id_config_institucion);


try{
if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se ha actualizado la institución correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/instituciones");
}else{
        session_start();
        $_SESSION['titulo'] = "Oops!";
        $_SESSION['mensaje'] = "No se pudo registrar a la base de datos";
        $_SESSION['icono'] = "error";

        header('Location:'.APP_URL. $_SERVER['HTTP_REFERER']);
}
}
catch(Exception $exception){
        session_start();
        $_SESSION['titulo'] = "Oops!";
        $_SESSION['mensaje'] = "No se pudo registrar a la base de datos". $exception->getMessage();
        $_SESSION['icono'] = "error";
        
        header('Location:'.APP_URL. $_SERVER['HTTP_REFERER']);
}
