<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','gestion_escolar');

define('APP_NAME','Sistema de gestion escolar');
define('APP_URL','http://localhost/practicas_php');
define('KEY_API_MAPS','');

$servidor = "mysql::dbname=".BD.":host=".SERVIDOR;

try{

  $pdo = new PDO($servidor,USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8" ));

 //echo "conexion exitosa a la base de datos";
}
catch(PDOException $e){
  print_r($e);

  echo "error, no se pudo conectar a la base de datos";
}
 
date_default_timezone_set ('America/Caracas');
  $fechaHora = date (format:'Y-m-d H:i:s');

  $fecha_actual = date (format:'Y-m-d');
  $dia_actual = date (format:'d');
  $mes_actual = date (format:'m');
  $year_actual = date (format:'Y');

