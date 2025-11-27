<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/docentes/datos_asignaciones.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Grados Asignados</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Asignaciones Registradas</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Nivel</th>
            <th>Turno</th>
            <th>Grado</th>
            <th>Sección</th>
            <th>Asignatura</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $contador_asignacion = 0;
            foreach($asignaciones_docente as $asignacion){
              if($email_session == $asignacion['email']){ 
                $id_grado = $asignacion['id_grados'];
                $id_docente = $asignacion['id_docentes'];
                echo  $id_asignatura = $asignacion['id_asignaturas'];
                $contador_asignacion = $contador_asignacion + 1;?>
                  <tr>
                    <td><?=$contador_asignacion;?></td>
                    <td><?=$asignacion['nivel'];?></td>
                    <td><?=$asignacion['turno'];?></td>
                    <td><?=$asignacion['grado'];?></td>
                    <td><?=$asignacion['seccion'];?></td>
                    <td><?=$asignacion['nombre_asignatura'];?></td>
                    <td>
                      <a href="create.php?id_grados=<?=$id_grado;?>&id_docente=<?=$id_docente;?>&id_asignatura=<?=$id_asignatura;?>" class="btn btn-warning btn-sm"><i class="bi bi-clipboard-check-fill"></i>Notas</a></td>
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