<?php

$id_nivel = $_GET['id'];

$query_niveles = $pdo->prepare("SELECT * FROM niveles INNER JOIN periodo_educativo 
ON niveles.periodo_id= periodo_educativo.id_periodo WHERE niveles.estado ='1' 
AND niveles.id_nivel = '$id_nivel'");
$query_niveles->execute();
$niveles = $query_niveles->fetchAll(PDO:: FETCH_ASSOC);

foreach ($niveles as $niveles) {
$periodo_id = $niveles['periodo_id']; 
$periodo = $niveles['periodo'];
$nivel = $niveles['nivel'];
$turno = $niveles['turno'];
$fyh_create = $niveles['fyh_create'];
$estado = $niveles['estado'];
}

?>