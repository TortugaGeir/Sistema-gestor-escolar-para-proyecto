<?php

include ('../app/config.php');

$email = $_POST('email');
$password = $_POST('password');

$sql ="SELECT * FROM usuarios WHERE email ='$email' ";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll ( fetch_style: PDO::FETCH_ASSOC);

$contador = 0;

foreach ($usuarios as $usuario){
  $password_tabla = $usuario['pasword'];
  $contador = $contador + 1;
}

if(($contador>0) && (password_verify($password, $password_tabla))){

  echo "los datos son correctos";
  header (string: 'Location:'.APP_URL."/admin");

}else{

  echo "los datos son incorrectos";
  header (string:'Location:'.APP_URL."/login");
}