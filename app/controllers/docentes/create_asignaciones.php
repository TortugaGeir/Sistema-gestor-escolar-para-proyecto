<?php
require_once ('../../../app/config.php');

$id_docentes= $_POST['id_docente'];
$id_nivel = $_POST['id_nivel'];
$id_grado = $_POST['id_grados'];
$id_asignatura = $_POST['id_asignaturas'];


$sentencia = $pdo->prepare ("INSERT INTO asignaciones (docentes_id,nivel_id,grados_id,asignaturas_id,fyh_create,estado)
  VALUES (:id_docente,:id_nivel,:id_grados,:id_asignatura,:fyh_create,:estado)");

  $sentencia->bindParam(':id_docente',$id_docentes);
  $sentencia->bindParam(':id_nivel',$id_nivel);
  $sentencia->bindParam(':id_grados',$id_grado);
  $sentencia->bindParam(':id_asignatura',$id_asignatura);
  $sentencia->bindParam(':fyh_create',$fechaHora);
  $sentencia->bindParam(':estado',$estado_de_registro);
  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente la asignación de materia";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/docentes/asignacion.php");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
    
    }
    ?>
  <script>

  window.history.back();
  </script>

<?php
  }catch (Exception $exception) {
  echo "Error en la base de datos: " . $exception->getMessage();
  }
  

  ?>