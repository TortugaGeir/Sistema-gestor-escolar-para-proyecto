<?php

require_once ('../../../app/config.php');

$nombres = $_POST ['nombres'];
$apellidos = $_POST ['apellidos'];
$rol_id = $_POST ['rol_id'];
$email = $_POST ['email'];
$password = $_POST ['password'];
$password_repet = $_POST ['password-repet'];

if($password == $password_repet){

 $password = password_hash($password,PASSWORD_DEFAULT);

$sentencia = $pdo->prepare ("INSERT INTO usuarios 
(nombres,apellidos,rol_id,email,password,fyh_create,estado)
VALUES (:nombres,:apellidos,:rol_id,:email,:password,:fyh_create,:estado)");

$sentencia->bindParam (':nombres',$nombres);
$sentencia->bindParam (':apellidos',$apellidos);
$sentencia->bindParam (':rol_id',$rol_id);
$sentencia->bindParam (':email',$email);
$sentencia->bindParam (':password',$password);
$sentencia->bindParam (':fyh_create',$fechaHora);
$sentencia->bindParam (':estado',$estado_de_registro);

try{
  if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se ha registrado el usuario correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/usuarios");
  }
  else{
      session_start();
        $_SESSION['titulo'] = "Opps";
        $_SESSION['mensaje'] = "No se ha podido registrar en la base de datos";
        $_SESSION['icono'] = "error";
 ?>
  <script>

  window.history.back();
  </script>
<?php
  }
} catch(Exception $exception){
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

}else{
        session_start();
        $_SESSION['titulo'] = "Opps";
        $_SESSION['mensaje'] = "Las cotraseñas registradas no coinciden";
        $_SESSION['icono'] = "error";
 ?>
  <script>

  window.history.back();
  </script>
<?php
}




