<?php


$query_estudiantes_conteo = $pdo->prepare("SELECT 
        grados.grado,               -- Campo para el nombre del grado
        DATE(historial_academico.fyh_create) AS fecha,  -- Campo para la fecha de creación/registro
        COUNT(estudiante.id_estudiante) AS total_estudiantes -- Contamos los estudiantes
    FROM 
        usuarios 
    INNER JOIN 
        roles ON usuarios.rol_id = roles.id_roles
    INNER JOIN 
        personas ON personas.usuario_id = usuarios.id_usuarios
    INNER JOIN 
        estudiante ON estudiante.personas_id = personas.id_personas
    INNER JOIN 
        historial_academico ON historial_academico.estudiante_id = estudiante.id_estudiante
    INNER JOIN 
        grados ON historial_academico.grados_id = grados.id_grados
    WHERE 
        estudiante.estado = '1'
    GROUP BY 
        grados.grado, 
        fecha                                      -- Agrupamos por grado y fecha
    ORDER BY 
        fecha ASC, 
        total_estudiantes DESC                     -- Ordenamos por fecha y luego por la cantidad (registro)
");
$query_estudiantes_conteo->execute();
$estudiantes_conteo = $query_estudiantes_conteo->fetchAll(PDO:: FETCH_ASSOC);


$query_grados = $pdo->prepare("SELECT 
        grados.grado AS grado,         -- Nombre del grado
        COUNT(estudiante.id_estudiante) AS total_estudiantes -- Contamos los estudiantes por grado
    FROM 
        estudiante 
    INNER JOIN 
        historial_academico ON historial_academico.estudiante_id = estudiante.id_estudiante
    INNER JOIN 
        grados ON historial_academico.grados_id = grados.id_grados
    WHERE 
        estudiante.estado = '1'
    GROUP BY 
        grados.grado                             -- Agrupamos solo por el grado
    ORDER BY 
        grados.id_grados ASC                            -- Opcional: Ordenamos por el ID para un orden lógico (Ini-1, Ini-2, Primero, etc.)

");
$query_grados->execute();
$resultados_grados = $query_grados->fetchAll(PDO:: FETCH_ASSOC);