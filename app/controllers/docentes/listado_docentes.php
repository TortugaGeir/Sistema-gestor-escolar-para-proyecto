<?php

$query_docentes = $pdo->prepare("SELECT * FROM usuarios INNER JOIN roles 
ON usuarios.rol_id= roles.id_roles
INNER JOIN personas ON personas.usuario_id = usuarios.id_usuarios
INNER JOIN docentes ON docentes.personas_id = personas.id_personas 
WHERE docentes.estado ='1'");
$query_docentes->execute();
$docentes = $query_docentes->fetchAll(PDO:: FETCH_ASSOC);

?>