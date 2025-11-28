<?php
// Asegúrate de que esta ruta sea correcta para tu configuración PDO
require_once ('../../../app/config.php'); 

// Obtener el ID del Grado
$id_grado = $_GET['id_grados'] ?? null;

if (!$id_grado) {
    http_response_code(400);
    echo json_encode(["error" => "ID de grado requerido."]);
    exit;
}

$sql = ("
SELECT 
    CASE
        WHEN ((calificaciones.nota_1° +calificaciones.nota_2° + calificaciones.nota_3°) / 3) >= 12 THEN 'Aprobado (12+)'
        ELSE 'Reprobado (< 12)'
    END as categoria_rendimiento,
    COUNT(calificaciones.id_calificacion) as total_estudiantes
FROM 
    calificaciones 
INNER JOIN 
    estudiante  ON calificaciones.estudiante_id = calificaciones.id_estudiante
INNER JOIN 
    historial_academico  ON estudiante.id_estudiante = historial_academico.estudiante_id
WHERE 
    historial_academico.grados_id = :id_grados
GROUP BY 
    categoria_rendimiento
");

$query = $pdo->prepare($sql);
$query->bindParam(':id_grado', $id_grado, PDO::PARAM_INT);
$query->execute();
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($resultados); 
?>