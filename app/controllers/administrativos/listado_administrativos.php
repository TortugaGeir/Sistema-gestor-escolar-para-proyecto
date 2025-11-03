<?php

$query_administrativos = $pdo->prepare("SELECT * FROM usuarios INNER JOIN roles 
ON usuarios.rol_id= roles.id_roles
INNER JOIN personas ON personas.usuario_id = usuarios.id_usuarios
INNER JOIN administrativos ON administrativos.personas_id = personas.id_personas 
WHERE administrativos.estado ='1'");
$query_administrativos->execute();
$administrativos = $query_administrativos->fetchAll(PDO:: FETCH_ASSOC);

?>