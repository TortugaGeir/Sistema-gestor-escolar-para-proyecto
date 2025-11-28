<?php

require_once ('../../../app/config.php');

$rol_id = $_POST['rol_id'];
$periodo_id = $_POST['periodo_id'];
$grado_id = $_POST['grados_id'];
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


if ($_FILES['foto_estudiante']['name'] !=null){
//echo "existe una imagen";

$nombre_del_archivo = date('Y-m-d-H-i-s') . '-' . $_FILES['foto_estudiante']['name'];
$location = "../../../public/images/estudiantes/".$nombre_del_archivo;
move_uploaded_file($_FILES['foto_estudiante']['tmp_name'],$location);
$foto = $nombre_del_archivo;

}else{
//echo "no existe una imagen";
$foto = "";
}

$pdo->beginTransaction();
////////INSERTAR TABLA USUARIOS//////

$password = password_hash($ci_estudiantil,PASSWORD_DEFAULT);

$sentencia = $pdo->prepare ("INSERT INTO usuarios 
(nombres,apellidos,rol_id,email,password,fyh_create,estado)
VALUES (:nombres,:apellidos,:rol_id,:email,:password,:fyh_create,:estado)");

$sentencia->bindParam (':nombres',$nombres_est);
$sentencia->bindParam (':apellidos',$apellidos_est);
$sentencia->bindParam (':rol_id',$rol_id);
$sentencia->bindParam (':email',$email_est);
$sentencia->bindParam (':password',$password);
$sentencia->bindParam (':fyh_create',$fechaHora);
$sentencia->bindParam (':estado',$estado_de_registro);

$sentencia->execute();

$id_usuario = $pdo->lastInsertId();



////////////INSERTAR A LA TABLA PERSONAS/////////////////
$sentencia = $pdo->prepare("INSERT INTO personas
(usuario_id,nombres,apellidos,ci,fecha_nacimiento,profesion,direccion,telefono,fyh_create,estado)
VALUES (:id_usuario,:nombres_est,:apellidos_est,:ci,:fecha_nacimiento_est,:profesion_est,:direccion_est,:tlf_est,:fyh_create,:estado)");

$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->bindParam(':nombres_est',$nombres_est);
$sentencia->bindParam(':apellidos_est',$apellidos_est);
$sentencia->bindParam(':ci',$ci_est);
$sentencia->bindParam(':fecha_nacimiento_est',$fecha_nacimiento_est);
$sentencia->bindParam(':profesion_est',$profesion_est);
$sentencia->bindParam(':direccion_est',$direccion_est);
$sentencia->bindParam(':tlf_est',$tlf_est);
$sentencia->bindParam(':fyh_create',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);

$sentencia->execute();
$id_personas = $pdo->lastInsertId();

////////////////INSERTAR A LA TABLA ESTUDIANTES//////////

$sentencia = $pdo->prepare("INSERT INTO estudiante
(personas_id,ci_escolar,foto,fyh_create,estado)
VALUES (:id_personas,:ci_escolar,:foto,:fyh_create,:estado)");

$sentencia->bindParam(':id_personas',$id_personas);
$sentencia->bindParam(':foto',$foto);
$sentencia->bindParam(':ci_escolar',$ci_estudiantil);
$sentencia->bindParam(':fyh_create',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);
$sentencia->execute();

$id_estudiante = $pdo->lastInsertId();

$sentencia = $pdo->prepare("INSERT INTO representantes
(nombres_repe,apellidos_repre,ci_repre,fecha_nacimiento_repre,profesion_repre,direccion_repre,telefono_repre,fyh_create,estado)
VALUES (:nombres,:apellidos,:ci,:fecha_nacimiento,:profesion,:direccion,:tlf,:fyh_create,:estado)");

$sentencia->bindParam(':nombres',$nombres_repre);
$sentencia->bindParam(':apellidos',$apellidos_repre);
$sentencia->bindParam(':ci',$ci_repre);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento_repre);
$sentencia->bindParam(':profesion',$profesion_repre);
$sentencia->bindParam(':direccion',$direccion_repre);
$sentencia->bindParam(':tlf',$tlf_repre);
$sentencia->bindParam(':fyh_create',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);

$sentencia->execute();

$id_representante = $pdo->lastInsertId();

$sentencia = $pdo->prepare("INSERT INTO estudiante_representante
(estudiante_id,representante_id,parentesco)
VALUES (:estudiante_id,:representante_id,:parentesco)");

$sentencia->bindParam(':estudiante_id',$id_estudiante);
$sentencia->bindParam(':parentesco',$parentesco);
$sentencia->bindParam(':representante_id',$id_representante);
$sentencia->execute();

$sentencia = $pdo->prepare("INSERT INTO historial_academico
(estudiante_id,grados_id,periodo_id,fyh_create)
VALUES (:id_estudiante,:grados_id,:periodo_id,:fyh_create)");

$sentencia->bindParam(':id_estudiante',$id_estudiante);
$sentencia->bindParam(':grados_id',$grado_id);
$sentencia->bindParam(':periodo_id',$periodo_id);
$sentencia->bindParam(':fyh_create',$fechaHora);

try{
    if($sentencia->execute()){
      $pdo->commit();
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente el estudiante";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/inscripciones");
    }else{
      $pdo->rollBack();
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/incripciones/create.php");
    
    }


  }catch (Exception $exception) {
    session_start();
    $pdo->rollBack();
        $_SESSION['titulo'] = "Opps";
        $_SESSION['mensaje'] = "El correo registrado ya existe en la base de datos";
        $_SESSION['icono'] = "error";
 ?>
  <script>

  window.history.back();
  </script>
<?php
  }
