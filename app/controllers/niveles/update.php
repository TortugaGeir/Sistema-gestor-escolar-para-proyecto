<?php
require_once ('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];

$periodo = $_POST['periodo_id'];
$niveles = $_POST['niveles'];
$turno = $_POST['turno'];


$sentencia = $pdo->prepare ("UPDATE niveles 
SET periodo_id=:periodo,nivel=:nivel,turno=:turno,fyh_update=:fyh_update
  WHERE id_nivel=:id_nivel");

  $sentencia->bindParam(':periodo',$periodo);
  $sentencia->bindParam(':nivel',$niveles);
  $sentencia->bindParam(':turno',$turno);
  $sentencia->bindParam(':fyh_update',$fechaHora);
  $sentencia->bindParam(':id_nivel',$id_nivel);

  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha actualizado correctamente el nivel";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/niveles");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/niveles/create.php");
    
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