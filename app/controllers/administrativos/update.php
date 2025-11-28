<?php

require_once ('../../../app/config.php');

$id_administrativo = $_POST['id_administrativo'];
$id_usuario = $_POST['id_usuarios'];
$id_personas = $_POST['id_personas'];

$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$tlf = $_POST['tlf'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion_admin'];


$pdo->beginTransaction();
////////ACTUALIZAR TABLA USUARIOS//////

$password = password_hash($ci,PASSWORD_DEFAULT);

$sentencia = $pdo->prepare ("UPDATE usuarios 
SET nombres=:nombres,apellidos=:apellidos,rol_id=:rol_id,email=:email,password=:password,fyh_update=:fyh_update
WHERE id_usuarios=:id_usuario");

$sentencia->bindParam (':nombres',$nombres);
$sentencia->bindParam (':apellidos',$apellidos);
$sentencia->bindParam (':rol_id',$rol_id);
$sentencia->bindParam (':email',$email);
$sentencia->bindParam (':password',$password);
$sentencia->bindParam (':fyh_update',$fechaHora);
$sentencia->bindParam (':id_usuario',$id_usuario);

$sentencia->execute();



////////////ACTUALIZAR A LA TABLA PERSONAS/////////////////
$sentencia = $pdo->prepare("UPDATE personas
SET nombres=:nombres,apellidos=:apellidos,ci=:ci,fecha_nacimiento=:fecha_nacimiento,profesion=:profesion,direccion=:direccion,telefono=:tlf,fyh_update=:fyh_update
WHERE id_personas=:id_personas");

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':tlf',$tlf);
$sentencia->bindParam(':fyh_update',$fechaHora);
$sentencia->bindParam(':id_personas',$id_personas);

$sentencia->execute();

////////////////ACTUALIZAR A LA TABLA ADMINISTRATIVOS//////////

$sentencia = $pdo->prepare("UPDATE administrativos
SET fyh_update=:fyh_update
WHERE id_administrativos=:id_administrativos");

$sentencia->bindParam(':fyh_update',$fechaHora);
$sentencia->bindParam(':id_administrativos',$id_administrativo);

try{
    if($sentencia->execute()){
      $pdo->commit();
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha actualizar correctamente el administrativo";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/administrativos");
    }else{
      $pdo->rollBack();
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/administrativos/create.php");
    
    }


  }catch (Exception $exception) {
    session_start();
        $_SESSION['titulo'] = "Opps";
        $_SESSION['mensaje'] = "El correo registrado ya existe en la base de datos";
        $_SESSION['icono'] = "error";
 ?>
  <script>

  window.history.back();
  </script>
<?php
  }
