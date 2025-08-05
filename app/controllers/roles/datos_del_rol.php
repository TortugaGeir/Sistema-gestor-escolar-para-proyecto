<?php
$id_roles = $_GET['id'];

$query_roles = $pdo->prepare("SELECT * FROM roles WHERE estado = '1' and id_roles= '$id_roles'");
$query_roles->execute();
$datos_roles = $query_roles->fetchAll(PDO:: FETCH_ASSOC);

foreach ($datos_roles as $datos_roles) {

  $nombre_rol = $datos_roles['nombre_rol'];
}
?>