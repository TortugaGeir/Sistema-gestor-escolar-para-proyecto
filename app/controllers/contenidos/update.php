<?php
require_once ('../../../app/config.php');

$id_contenido= $_POST['id_contenido'];
$titulo= $_POST['titulo_contenido'];
$titulo = mb_strtoupper ($titulo, encoding: 'UTF-8');
$descripcion = $_POST['descripcion_contenido'];

if ($_FILES['material_contenido']['name'] !=null){
//echo "existe una imagen";

$nombre_del_archivo = date('Y-m-d-H-i-s') . '-' . $_FILES['material_contenido']['name'];
$location = "../../../public/pdf/material/".$nombre_del_archivo;
move_uploaded_file($_FILES['material_contenido']['tmp_name'],$location);
$material = $nombre_del_archivo;

}else{
if($material == ""){
  $material = "";
}else{
  $material = $_POST['material_contenido'] ?? null;
}

}


$sentencia = $pdo->prepare ("UPDATE contenido 
SET titulo=:titulo,descripcion=:descripcion,material=:material,fyh_update=:fyh_update
WHERE id_contenido=:id_contenido");

  $sentencia->bindParam(':id_contenido',$id_contenido);
  $sentencia->bindParam(':titulo',$titulo);
  $sentencia->bindParam(':descripcion',$descripcion);
  $sentencia->bindParam(':material',$material);
  $sentencia->bindParam(':fyh_update',$fechaHora);

  
  try{
    if($sentencia->execute()){
      session_start();
        $_SESSION['titulo'] = "Exelente";
        $_SESSION['mensaje'] = "Se ha registrado correctamente el contenido";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/contenidos/create.php?id_asignacion=$id_asignacion&id_docente=$id_docente&id_asignatura=$id_asignatura");
    }else{
      session_start();
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido realizar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/contenidos/create.php");
    
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