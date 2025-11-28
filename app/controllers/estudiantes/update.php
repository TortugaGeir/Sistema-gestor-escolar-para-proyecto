<?php

require_once ('../../../app/config.php');

$id_estudiantes= $_POST['id_estudiantes'];
$id_representante= $_POST['id_representante'];
$id_usuario = $_POST['id_usuarios'];
$id_personas = $_POST['id_personas'];
$id_historial = $_POST['id_historial'];
$id_est_repre = $_POST['id_est_repre'];

$rol_id = $_POST['rol_id'];
$periodo_id = $_POST['periodo_id'];
$nombres_est = $_POST['nombres_estudiante'];
$nombres_repre = $_POST['nombres_repre'];
$apellidos_est = $_POST['apellidos_estudiante'];
$apellidos_repre = $_POST['apellidos_repre'];
$ci_est = $_POST['ci'];
$ci_repre = $_POST['ci_repre'];
$ci_estudiantil = $_POST['ci_estudiantil'];
$email_est = $_POST['email_estudiante'];
$fecha_nacimiento_est = $_POST['fecha_nacimiento_estudiante'];
$fecha_nacimiento_repre = $_POST['fecha_nacimiento_repre'];
$tlf_est = $_POST['telefono_estudiante'];
$tlf_repre = $_POST['tlf_repre'];
$profesion_est = $_POST['profesion_estudiante'];
$profesion_repre = $_POST['profesion_repre'];
$direccion_est = $_POST['direccion_estudiante'];
$direccion_repre = $_POST['direccion_repre'];
$parentesco = $_POST['parentesco'];



if ($_FILES['foto_estudiante']['name'] ?? null){
//echo "existe una imagen";

$nombre_del_archivo = date('Y-m-d-H-i-s') . '-' . $_FILES['foto_estudiante']['name'];
$location = "../../../public/images/estudiantes/".$nombre_del_archivo;
move_uploaded_file($_FILES['foto_estudiante']['tmp_name'],$location);
$foto = $nombre_del_archivo;

}else{
if($foto == ""){
  $foto = "";
}else{
  $foto = $_POST['foto_estudiante'] ?? null;
}

}

$pdo->beginTransaction();
////////INSERTAR TABLA USUARIOS//////

$password = password_hash($ci_estudiantil,PASSWORD_DEFAULT);

$sentencia = $pdo->prepare ("UPDATE usuarios 
SET nombres=:nombres,apellidos=:apellidos,rol_id=:rol_id,email=:email,password=:password,fyh_update=:fyh_update
WHERE id_usuarios=:id_usuario");

$sentencia->bindParam (':nombres',$nombres_est);
$sentencia->bindParam (':apellidos',$apellidos_est);
$sentencia->bindParam (':rol_id',$rol_id);
$sentencia->bindParam (':id_usuario',$id_usuario);
$sentencia->bindParam (':email',$email_est);
$sentencia->bindParam (':password',$password);
$sentencia->bindParam (':fyh_update',$fechaHora);

$sentencia->execute();





////////////INSERTAR A LA TABLA PERSONAS/////////////////
$sentencia = $pdo->prepare("UPDATE personas
SET nombres=:nombres_est,apellidos=:apellidos_est,ci=:ci_est,fecha_nacimiento=:fecha_nacimiento_est,profesion=:profesion_est,direccion=:direccion_est,telefono=:tlf_est,fyh_update=:fyh_update
WHERE id_personas=:id_personas");

$sentencia->bindParam(':id_personas',$id_personas);
$sentencia->bindParam(':nombres_est',$nombres_est);
$sentencia->bindParam(':apellidos_est',$apellidos_est);
$sentencia->bindParam(':ci_est',$ci_est);
$sentencia->bindParam(':fecha_nacimiento_est',$fecha_nacimiento_est);
$sentencia->bindParam(':profesion_est',$profesion_est);
$sentencia->bindParam(':direccion_est',$direccion_est);
$sentencia->bindParam(':tlf_est',$tlf_est);
$sentencia->bindParam(':fyh_update',$fechaHora);

$sentencia->execute();


////////////////INSERTAR A LA TABLA ESTUDIANTES//////////

$sentencia = $pdo->prepare("UPDATE estudiante
SET ci_escolar=:ci_escolar,foto=:foto,fyh_update=:fyh_update
WHERE id_estudiante=:id_estudiante");

$sentencia->bindParam(':id_estudiante',$id_estudiantes);
$sentencia->bindParam(':foto',$foto);
$sentencia->bindParam(':ci_escolar',$ci_estudiantil);
$sentencia->bindParam(':fyh_update',$fechaHora);
$sentencia->execute();



$sentencia = $pdo->prepare("UPDATE representantes
SET nombres_repe=:nombres,apellidos_repre=:apellidos,ci_repre=:ci,fecha_nacimiento_repre=:fecha_nacimiento,profesion_repre=:profesion,direccion_repre=:direccion,telefono_repre=:tlf,fyh_update=:fyh_update
WHERE id_representante=:id_representante");

$sentencia->bindParam(':id_representante',$id_representante);
$sentencia->bindParam(':nombres',$nombres_repre);
$sentencia->bindParam(':apellidos',$apellidos_repre);
$sentencia->bindParam(':ci',$ci_repre);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento_repre);
$sentencia->bindParam(':profesion',$profesion_repre);
$sentencia->bindParam(':direccion',$direccion_repre);
$sentencia->bindParam(':tlf',$tlf_repre);
$sentencia->bindParam(':fyh_update',$fechaHora);


$sentencia->execute();



$sentencia = $pdo->prepare("UPDATE estudiante_representante
SET parentesco=:parentesco
WHERE id_est_repre=:id_est_repre");

$sentencia->bindParam(':id_est_repre',$id_est_repre);
$sentencia->bindParam(':parentesco',$parentesco);

$sentencia->execute();

$sentencia = $pdo->prepare("UPDATE historial_academico
SET periodo_id=:periodo_id,fyh_update=:fyh_update
WHERE id_historial=:id_historial");

$sentencia->bindParam(':id_historial',$id_historial);
$sentencia->bindParam(':periodo_id',$periodo_id);
$sentencia->bindParam(':fyh_update',$fechaHora);

try{
    if($sentencia->execute()){
      $pdo->commit();
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha actualizado correctamente el estudiante";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/estudiantes");
    }else{
      $pdo->rollBack();
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/incripciones/create.php");
    
    }


  }catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }
