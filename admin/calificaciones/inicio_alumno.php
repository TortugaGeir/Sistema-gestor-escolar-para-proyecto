<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/calificaciones/calificacion_alumno.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Materias Vistas</h1> 
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
            <th>Grado</th>
            <th>Sección</th>
            <th>Asignatura</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $contador_contenidos = 0;
            foreach($calificaciones_estudiante  as $visualizar_grado){
              if($email_session == $visualizar_grado['email'] ){ 
                $id_grado = $visualizar_grado['id_grados'];
                $id_asignaturas = $visualizar_grado['id_asignaturas'];
                $contador_contenidos = $contador_contenidos + 1;?>
                  <tr>
                    <td><?=$contador_contenidos;?></td>
                    <td><?=$visualizar_grado['grado'];?></td>
                    <td><?=$visualizar_grado['seccion'];?></td>
                    <td><?=$visualizar_grado['nombre_asignatura'];?></td>
                    <td> <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalNotas<?=$id_asignaturas;?>">
                   <i class="bi bi-clipboard-check-fill"></i>Ver Notas
                  </button>
                <!-- Modal -->
            <div class="modal fade" id="modalNotas<?=$id_asignaturas;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header" style="text-align: center; background-color:salmon">
                    <h5 class="modal-title" id="exampleModalLabel">Notas de la Materia: <?=$visualizar_grado['nombre_asignatura'];?> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <table class="table table-bordered table-striped table-sm table-hover">
                            <?php 
                            $contador_nota = 0;
                            $contador_nota = $contador_nota +1;
                            ?>
                            <thead>
                              <tr>
                                <td><center>Nro</center></td>
                                <td><center>Perido</center></td>
                                <td><center>Momento 1°</center></td>
                                <td><center>Momento 2°</center></td>
                                <td><center>Momento 3°</center></td>
                              </tr>
                            </thead>
                            <tr>
                              <td><center><?=$contador_nota;?></center></td>
                              <td><center><?=$visualizar_grado['periodo'];?></center></td>
                              <td><center><?=$visualizar_grado['nota_1°'];?></center></td>
                              <td><center><?=$visualizar_grado['nota_2°'];?></center></td>
                              <td><center><?=$visualizar_grado['nota_3°'];?></center></td>
                            </tr>
                          </table>

                </div>
              </div>
            </div>


                
                
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