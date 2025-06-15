<?php

include ('../app/config.php');

$email = $_POST['email'];
$password = $_POST['password'];
//consulta si el usuario existe
$sql = "SELECT * FROM `usuarios` WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios=$query->fetchAll(fetch_style: PDO::FETCH_ASSOC);

$contador = 0;

foreach ($usuarios as $usuario){
  $password_tabla = $usuario['password'];
  $contador = $contador + 1;
  //print_r($usuario);
}

//verifica clave
if(($contador>0) && (password_verify($password, $password_tabla))){
//datos correctos
  echo "los datos son correctos";
  session_start();
  $_SESSION ['mensaje'] = " Bienvenido";
  $_SESSION ['icono'] = "success";
  header (string: 'Location:'.APP_URL."/admin");

}else{

 // echo "los datos son incorrectos";
  session_start();
  $_SESSION ['mensaje'] = " Los datos no son correctos, vuelva a intentar";
  header (string:'Location:'.APP_URL."/login");
}

?>