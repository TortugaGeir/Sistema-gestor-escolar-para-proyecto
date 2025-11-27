<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/contenidos/datos_contenido_estudiantes.php');


?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Contenidos Disponibles</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Materias Registradas</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Grado</th>
            <th>Sección</th>
            <th>Asignatura</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $contador_contenidos = 0;
            foreach($contenidos_estudiantes  as $contenido_estudiante){
              if($email_session == $contenido_estudiante['email'] ){ 
                $id_grado = $contenido_estudiante['id_grados'];
                $id_asignatura = $contenido_estudiante['id_asignaturas'];
                $contador_contenidos = $contador_contenidos + 1;?>
                  <tr>
                    <td><?=$contador_contenidos;?></td>
                    <td><?=$contenido_estudiante['grado'];?></td>
                    <td><?=$contenido_estudiante['seccion'];?></td>
                    <td><?=$contenido_estudiante['nombre_asignatura'];?></td>
                     <td><a href="ver_contenido.php?id_asignatura=<?=$id_asignatura;?>" class="btn btn-success btn-sm"><i class="bi bi-journal-bookmark-fill"></i>Contenido</a>
                
                
                </td>
                  </tr>


                <?php
              }
            }
            ?>
          </tbody>
        </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>

<?php
include_once ('../layout/parte_2.php');
include_once ('../../layout/mensajes.php');


?>