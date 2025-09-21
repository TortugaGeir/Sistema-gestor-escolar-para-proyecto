<?php

$query_niveles = $pdo->prepare("SELECT * FROM niveles INNER JOIN periodo_educativo 
ON niveles.periodo_id= periodo_educativo.id_periodo WHERE niveles.estado ='1'");
$query_niveles->execute();
$niveles = $query_niveles->fetchAll(PDO:: FETCH_ASSOC);

?>