<?php

require_once ('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$nombres = $_POST ['nombres'];
$apellidos = $_POST ['apellidos'];
$rol_id = $_POST ['rol_id'];
$email = $_POST ['email'];
$password = $_POST ['password'];
$password_repet = $_POST ['password-repet'];

if($password == ""){

    $sentencia = $pdo->prepare ("UPDATE usuarios
    SET nombres=:nombres, apellidos=:apellidos, rol_id=:rol_id, email=:email, fyh_update=:fyh_update 
    WHERE id_usuarios=:id_usuario");

    $sentencia->bindParam (':nombres',$nombres);
    $sentencia->bindParam (':apellidos',$apellidos);
    $sentencia->bindParam (':rol_id',$rol_id);
    $sentencia->bindParam (':email',$email);
    $sentencia->bindParam (':fyh_update',$fechaHora);
    $sentencia->bindParam (':id_usuario',$id_usuario);

    try{
      if($sentencia->execute()){
          session_start();
            $_SESSION['titulo'] = "Excelente!";
            $_SESSION['mensaje'] = "Se ha actualizó el usuario correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/usuarios");
      }
      else{
          session_start();
            $_SESSION['titulo'] = "Opps";
            $_SESSION['mensaje'] = "No se ha podido actualizar en la base de datos";
            $_SESSION['icono'] = "error";

      }
    } catch(Exception $exception){

    echo "Error en la base de datos: " . $exception->getMessage();

     ?>
      <script>

      window.history.back();
      </script>
    <?php

    }



}else {
        if($password == $password_repet){

    $password = password_hash($password,PASSWORD_DEFAULT);

   
    $sentencia = $pdo->prepare ("UPDATE usuarios
    SET nombres=:nombres, apellidos=:apellidos, rol_id=:rol_id, email=:email, password=:password, fyh_update=:fyh_update 
    WHERE id_usuarios=:id_usuario");

    $sentencia->bindParam (':nombres',$nombres);
    $sentencia->bindParam (':apellidos',$apellidos);
    $sentencia->bindParam (':rol_id',$rol_id);
    $sentencia->bindParam (':email',$email);
    $sentencia->bindParam (':fyh_update',$fechaHora);
    $sentencia->bindParam (':id_usuario',$id_usuario);
    $sentencia->bindParam (':password',$password);


    try{
      if($sentencia->execute()){
          session_start();
            $_SESSION['titulo'] = "Excelente!";
            $_SESSION['mensaje'] = "Se ha actualizado el usuario correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/usuarios");
      }
      else{
          session_start();
            $_SESSION['titulo'] = "Opps";
            $_SESSION['mensaje'] = "No se ha podido actualizar en la base de datos";
            $_SESSION['icono'] = "error";
    ?>
      <script>

      window.history.back();
      </script>
    <?php
      }
    } catch(Exception $exception){

      echo "Error en la base de datos: " . $exception->getMessage();
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
}

