<?php
require_once ('../../../../app/config.php');

$periodo = $_POST['periodo'];
$estado = $_POST['estado'];

if($estado == "ACTIVO"){
  $estado = 1;
}else{
  $estado = 0;
}


$sentencia = $pdo->prepare ("INSERT INTO periodo_educativo (periodo,fyh_create,estado)
  VALUES (:periodo,:fyh_create,:estado)");

  $sentencia->bindParam(':periodo',$periodo);
  $sentencia->bindParam(':fyh_create',$fechaHora);
  $sentencia->bindParam(':estado',$estado);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente el periodo";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/periodos");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/configuraciones/periodos/create.php");
    
    }


  }catch (Exception $exception) {
   session_start();
        $_SESSION['titulo'] = "Opps";
        $_SESSION['mensaje'] = "Datos no coincidentes, vuelva a intentar";
        $_SESSION['icono'] = "error";
 ?>
  <script>

  window.history.back();
  </script>
<?php
  }
  

  ?>