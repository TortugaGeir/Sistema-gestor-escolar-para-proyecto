<?php
require_once ('../../../app/config.php');

$asignatura= $_POST['asignatura'];
$asignatura = mb_strtoupper ($asignatura, encoding: 'UTF-8');
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

if($estado == "ACTIVO"){
  $estado = 1;
}else{
  $estado = 0;
}


$sentencia = $pdo->prepare ("INSERT INTO asignaturas (nombre_asignatura,descripcion,fyh_create,estado)
  VALUES (:asignatura,:descripcion,:fyh_create,:estado)");

  $sentencia->bindParam(':asignatura',$asignatura);
  $sentencia->bindParam(':descripcion',$descripcion);
  $sentencia->bindParam(':fyh_create',$fechaHora);
  $sentencia->bindParam(':estado',$estado);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente la asignatura";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/asignaturas");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/configuraciones/asignaturas/create.php");
    
    }


  }catch (Exception $exception) {
   session_start();
        $_SESSION['titulo'] = "Opps";
        $_SESSION['mensaje'] = "Datos no cincidentes, vuelva a intentar";
        $_SESSION['icono'] = "error";
 ?>
  <script>

  window.history.back();
  </script>
<?php
  }
  

  ?>