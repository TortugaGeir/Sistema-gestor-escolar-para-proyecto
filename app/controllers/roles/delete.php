<?php
include ('../../../app/config.php');

$id_rol = $_POST['id_rol'];

$query_usuarios = $pdo->prepare("SELECT * FROM usuarios  WHERE estado = '1' AND rol_id = $id_rol");
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO:: FETCH_ASSOC);
$contador = 0;

foreach($usuarios as $usuarios){
  $contador = $contador + 1;
}
if($contador>0){
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se puede eliminar el rol porque otros usuarios estan vinculados a él";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/roles");
}else{
$sentencia = $pdo->prepare ("DELETE FROM roles WHERE id_roles = :id_roles");
  $sentencia->bindParam(':id_roles', $id_rol);

    if($sentencia->execute()){
      session_start();
      $_SESSION['titulo'] = "Excelente!";
        $_SESSION['mensaje'] = "Se elimino el rol correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles");
    }else{
      $_SESSION['titulo'] = "Oops";
      $_SESSION['mensaje'] = "No se ha podido eliminar el registro";
      $_SESSION['icono'] = "error";
      header('Location:'.APP_URL."/admin/roles");
    
    }


}


?>
