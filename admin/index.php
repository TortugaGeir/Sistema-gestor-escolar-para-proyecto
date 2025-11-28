<?php

include_once ('../app/config.php');
include_once ('layout/parte_1.php');
include_once('../app/controllers/roles/listado_roles.php');
include_once('../app/controllers/usuarios/listado_de_usuarios.php');
include_once('../app/controllers/niveles/listado_niveles.php');
include_once('../app/controllers/grados/listado_grados.php');
include_once('../app/controllers/asignaturas/listado_asignaturas.php');
include_once('../app/controllers/administrativos/listado_administrativos.php');
include_once('../app/controllers/docentes/listado_docentes.php');
include_once('../app/controllers/docentes/datos_asignaciones.php');
include_once('../app/controllers/estudiantes/listado_estudiantes.php');
include_once('../app/controllers/estudiantes/conteo_del_estudiante.php');


if (isset($_SESSION['sesion_email'])) 
  //echo "el usuario paso el login";
  $email_session = $_SESSION['sesion_email'];
  $query_session = $pdo->prepare("SELECT * FROM usuarios WHERE email = '$email_session' AND estado = '1' ");
  $query_session->execute();

  $datos_session_usuarios = $query_session->fetchAll(PDO:: FETCH_ASSOC);
    foreach ($datos_session_usuarios as $datos_session_usuarios) {
      $nombre_session_usuario = $datos_session_usuarios ['nombres'];
      $apellido_session_usuario = $datos_session_usuarios ['apellidos'];
      $fecha_session_usuario = $datos_session_usuarios['fyh_create'];
      $rol_session_usuario = $datos_session_usuarios ['rol_id'];
    }
?>
    <div class="content-wrapper">
      <div class="container">
        <div class="container">
          <div class="row">
            <h1 style="margin-bottom: 24px;"><?=APP_NAME;?></h1>
          </div>
          <?php if ($rol_session_usuario == 1): // Administrador ?>
          <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info ">
              <div class="inner">
                <?php
                $contador_roles = 0;
                  foreach($roles as $roles){
                    $contador_roles = $contador_roles + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_roles;?></h3>

                <p class="text-light">Roles registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bookmarks-fill fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $contador_usuarios = 0;
                  foreach($usuarios as $usuarios){
                    $contador_usuarios = $contador_usuarios + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_usuarios;?></h3>

                <p class="text-light">Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-people-fill fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_niveles = 0;
                  foreach($niveles as $niveles){
                    $contador_niveles = $contador_niveles + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_niveles;?></h3>

                <p class="text-light">Niveles Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bar-chart-fill fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/niveles" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_grados = 0;
                  foreach($grados as $grados){
                    $contador_grados = $contador_grados + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_grados;?></h3>

                <p class="text-light">Grados Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bookshelf fs-1 opacity-30" style="color: white;"></i>
              </div>
              <a href="<?=APP_URL;?>/admin/grados" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          
<!-- segunda columna -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger ">
              <div class="inner">
                <?php
                $contador_asignaturas = 0;
                  foreach($asignaturas as $asignaturas){
                    $contador_asignaturas = $contador_asignaturas + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_asignaturas;?></h3>

                <p class="text-light">Asignaturas registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-journals fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/asignaturas" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <?php
                $contador_administrativos = 0;
                  foreach($administrativos as $administrativos){
                    $contador_administrativos = $contador_administrativos + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_administrativos;?></h3>

                <p class="text-light">Administrativos Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-person-lines-fill fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/administrativos" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">
                <?php
                $contador_docentes = 0;
                  foreach($docentes as $docentes){
                    $contador_docentes = $contador_docentes + 1;
                  }
                ?>
                <h3 ><?=$contador_docentes;?></h3>

                <p >Docentes Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-person-video3 fs-1 opacity-30"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/docentes" class="small-box-footer text-dark">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <?php
                $contador_estudiantes = 0;
                  foreach($estudiantes as $estudiantes){
                    $contador_estudiantes = $contador_estudiantes + 1;
                  }
                ?>
                <h3 class="text-light"><?=$contador_estudiantes;?></h3>

                <p class="text-light">Estudiantes Registrados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-file-person-fill fs-1 opacity-30" style="color: white;"></i>
              </div>
              <a href="<?=APP_URL;?>/admin/estudiantes" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <hr>
          <?php 
          $grados_data = [];

// Recorrer los resultados para separar las etiquetas (grados) y los datos (totales)
foreach ($resultados_grados as $row) {
    $grados_labels[] = $row['grado'];          // Array de nombres de grados (Eje X)
    $grados_data[] = (int)$row['total_estudiantes']; // Array de conteos de estudiantes (Eje Y)
}


          $fechas_labels = [];
          $totales_datos = [];
          foreach($estudiantes_conteo as $conteo){
            $registro= $conteo['fecha'];
            $valor= $conteo['total_estudiantes'];

            // Si estás sumando los totales de diferentes grados para la misma fecha:
    if (array_key_exists($registro, $fechas_labels)) {
        // Suma el total si la fecha ya existe
        $fechas_labels[$registro] += $valor; 
    } else {
        // Crea la entrada si la fecha es nueva
        $fechas_labels[$registro] = $valor;
    }

          }
          // Ahora, preparamos los arrays finales para JSON:
          $chart_labels = array_keys($fechas_labels);   // Las fechas únicas serán las etiquetas (Enero, Febrero, etc.)
          $chart_data = array_values($fechas_labels); // Los totales sumados serán los datos (15, 27, etc.)
          ?>
      <div class="row">
        <div class="col-md-6">
              <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos Registros Estudiantes por Grados</h3>
                <!-- /.card-tools -->
              <!-- /.card-header -->
        <canvas id="myChart"></canvas>
          </div>
          </div> 
        </div>
    <script>
       // Inyección dinámica de datos desde PHP
        // La variable 'grados' tendrá los nombres de los grados como etiquetas (Eje X)
       var grados = <?php echo json_encode($grados_labels); ?>; 
        
        // La variable 'datos' tendrá el conteo de estudiantes por cada grado (Eje Y)
        var datos = <?php echo json_encode($grados_data); ?>;
        // Los datos numéricos es mejor definirlos como números, no como strings
        // var datos = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]; 
        const datosNumerico = datos.map(Number)
        
        const ctx = document.getElementById('myChart');
        
        new Chart(ctx, {
            type: 'line',
            data: { 
                // CORRECCIÓN 1: labels DENTRO de data
                labels: grados, 
                datasets: [{ // CORRECCIÓN 2: datasets DEBE ser un array []
                    label: 'Total de Estudiantes por Grado',
                    data: datosNumerico, // Usamos el conteo como datos
                    backgroundColor: 'rgba(75, 192, 192, 0.6)', // Color de las barras
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }] 
            },
            // CORRECCIÓN 3: options (con 's')
            options: { 
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                // RECOMENDACIÓN: Añadir responsive: true si usas Bootstrap/col-md-6
                responsive: true, 
                maintainAspectRatio: true 
            }
        });
    </script>
</div>
<br><br>
            <div class="row">
        <div class="col-md-6">
              <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos Registros Estudiantes por Meses</h3>
                <!-- /.card-tools -->
              <!-- /.card-header -->
        <canvas id="myChart2"></canvas>
          </div>
          </div> 
        </div>
        <script>
        var meses = <?php echo json_encode($chart_labels); ?>; 
        var datos = <?php echo json_encode($chart_data); ?>;

        // Asegúrate de que los datos son numéricos para Chart.js
        const datosNumericos = datos.map(Number);
        // Los datos numéricos es mejor definirlos como números, no como strings
        // var datos = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]; 
        
        const ctx2 = document.getElementById('myChart2');
        
        new Chart(ctx2, {
            type: 'bar',
            data: { 
                // CORRECCIÓN 1: labels DENTRO de data
                labels: meses, 
                datasets: [{ // CORRECCIÓN 2: datasets DEBE ser un array []
                    label: 'Estudiantes registrados',
                    data: datos,
                    borderWidth: 1
                }] 
            },
            // CORRECCIÓN 3: options (con 's')
            options: { 
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                // RECOMENDACIÓN: Añadir responsive: true si usas Bootstrap/col-md-6
                responsive: true, 
                maintainAspectRatio: true 
            }
        });
    </script>
          

          
        </div>
        <?php endif; // Fin if Todos los roles ?>
        

    <?php if ($rol_session_usuario == 7): // Administrador ?>            
 <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info ">
              <div class="inner">
                <?php
                $contador_grados = 0;
                  foreach($asignaciones_docente as $asignacion){
                    if($email_session == $asignacion['email']){ 
                    $contador_grados = $contador_grados + 1;
                  }
                }
                ?>
                <h3 class="text-light"><?=$contador_grados;?></h3>

                <p class="text-light">Grados Asignados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-box-arrow-in-right fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/calificaciones" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
               <?php
               foreach($asignaturas as $asignatura){
                $contador_asignatura = 0;
                  foreach($asignaciones_docente as $asignaciones){
                    if($email_session == $asignaciones['email']){ 
                      if($asignaciones['asignaturas_id']==$asignatura['id_asignaturas']){
                    $contador_asignatura = $contador_asignatura + 1;
                  }
                  }
                }
                }
                ?>
                <h3 class="text-light"><?=$contador_asignatura;?></h3>

                <p class="text-light">Asignatura por Grado</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-journals fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/contenidos" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                foreach($niveles as $nivel){
                $contador_nivel = 1;
                  foreach($asignaciones_docente as $asignaciones){
                    if($email_session == $asignaciones['email']){ 
                      if($asignaciones['nivel_id']==$nivel['id_nivel']){
                    $contador_nivel = $contador_nivel + 1;
                  }
                  }
                }
              }
                ?>
                <h3 class="text-light"><?=$contador_nivel;?></h3>

                <p class="text-light">Niveles Asignados</p>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-bar-chart-fill fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/contenidos" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
          <!-- ./col -->
           <?php endif; // Fin if Todos los roles ?>
             <?php if ($rol_session_usuario == 16): // Administrador ?>            
 <div class="row">


              <h3>Bienvenida:<?=$nombre_session_usuario."-".$apellido_session_usuario?></h3>
            </div>
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info ">
              <div class="inner">
                <br>
                <h4 class="text-light">Contenidos para Ver</h4>
              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-journal-bookmark-fill fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/contenidos/contenidos_alumnos.php" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
            
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4 class="text-light">Ver Calificaciones</h4>


              </div>
              <div class="icon">
                <i class="ion"><i class="bi bi-clipboard-check-fill fs-1 opacity-30" style="color: white;"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/calificaciones/inicio_alumno.php" class="small-box-footer text-light">Mas información <i class="fas"><i class="bi bi-arrow-right-circle"></i></i></a>
            </div>
          </div>
            
          </div>
           
          
          <!-- ./col -->
           <?php endif; // Fin if Todos los roles ?>




<?php
include ('layout/parte_2.php');
include ('../layout/mensajes.php');

?>