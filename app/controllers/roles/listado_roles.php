<?php

$query_roles = $pdo->prepare("SELECT * FROM roles WHERE estado = '1'");
$query_roles->execute();
$roles = $query_roles->fetchAll(PDO:: FETCH_ASSOC);

?>