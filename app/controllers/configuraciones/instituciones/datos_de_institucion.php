<?php

$id_config_institucion = $_GET['id'];

$query_instituciones = $pdo->prepare("SELECT * FROM configuracion_instituciones WHERE id_config_institucion = '$id_config_institucion' ");
$query_instituciones->execute();
$instituciones = $query_instituciones->fetchAll(PDO:: FETCH_ASSOC);

foreach($instituciones as $instituciones){

$nombre_institucion = $instituciones['nombre_institucion'];
$email_institucion = $instituciones['email'];
$tipo_institucion = $instituciones['tipo_institucion'];
$telefono_institucion = $instituciones['telefono'];
$rif_institucion = $instituciones['rif'];
$codigo_dea = $instituciones['cog_dea'];
$direccion_institucion = $instituciones['direccion'];
$logo = $instituciones['logo'];
$fyh_create = $instituciones['fyh_create'];
$estado = $instituciones['estado'];

}

?>