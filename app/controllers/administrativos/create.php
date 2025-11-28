<?php

require_once ('../../../app/config.php');

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
////////INSERTAR TABLA USUARIOS//////

$password = password_hash($ci,PASSWORD_DEFAULT);

$sentencia = $pdo->prepare ("INSERT INTO usuarios 
(nombres,apellidos,rol_id,email,password,fyh_create,estado)
VALUES (:nombres,:apellidos,:rol_id,:email,:password,:fyh_create,:estado)");

$sentencia->bindParam (':nombres',$nombres);
$sentencia->bindParam (':apellidos',$apellidos);
$sentencia->bindParam (':rol_id',$rol_id);
$sentencia->bindParam (':email',$email);
$sentencia->bindParam (':password',$password);
$sentencia->bindParam (':fyh_create',$fechaHora);
$sentencia->bindParam (':estado',$estado);

$sentencia->execute();

$id_usuario = $pdo->lastInsertId();



////////////INSERTAR A LA TABLA PERSONAS/////////////////
$sentencia = $pdo->prepare("INSERT INTO personas
(usuario_id,nombres,apellidos,ci,fecha_nacimiento,profesion,direccion,telefono,fyh_create,estado)
VALUES (:id_usuario,:nombres,:apellidos,:ci,:fecha_nacimiento,:profesion,:direccion,:tlf,:fyh_create,:estado)");

$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':tlf',$tlf);
$sentencia->bindParam(':fyh_create',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);

$sentencia->execute();
$id_personas = $pdo->lastInsertId();

////////////////INSERTAR A LA TABLA ADMINISTRATIVOS//////////

$sentencia = $pdo->prepare("INSERT INTO administrativos
(personas_id,fyh_create,estado)
VALUES (:id_personas,:fyh_create,:estado)");

$sentencia->bindParam(':id_personas',$id_personas);
$sentencia->bindParam(':fyh_create',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);

try{
    if($sentencia->execute()){
      $pdo->commit();
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente el administrativo";
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

  
 
  