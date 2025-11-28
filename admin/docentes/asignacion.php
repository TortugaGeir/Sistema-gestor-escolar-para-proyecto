<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/docentes/listado_docentes.php');
include_once('../../app/controllers/niveles/listado_niveles.php');
include_once('../../app/controllers/grados/listado_grados.php');
include_once('../../app/controllers/asignaturas/listado_asignaturas.php');
require_once('../../app/controllers/docentes/datos_asignaciones.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado del Personal Docente Asignado</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Docentes Asignados </h3>

                <div class="card-tools">
                <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAsignacion">
                    <i class="bi bi-box-arrow-in-down-right"></i> Asignar Materias
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body overflow-y-scroll">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Carnet Identidad</th>
            <th>Especialidad</th>
            <th>Estado</th>
            <th>Materias Asignadas</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_docentes = 0;
            foreach ($docentes as $docentes_ver) {
              $contador_docentes = $contador_docentes +1;
              $id_docentes = $docentes_ver ['id_docentes'];
              $nombres_docentes = $docentes_ver ['nombres'];
              $Apellidos_docentes = $docentes_ver ['apellidos'];
              $ci = $docentes_ver ['ci'];
              $correo = $docentes_ver ['email'];
              $profesion = $docentes_ver ['profesion'];
              $especialidad = $docentes_ver ['especialidad'];
              $antiguedad = $docentes_ver ['antiguedad'];
              $estado = $docentes_ver ['estado'];
              ?>
            <tr>
              <td><?=$contador_docentes;?></td>
              <td><?=$nombres_docentes;?></td>
              <td><?=$Apellidos_docentes;?></td>
              <td><?=$ci;?></td>
              <td><?=$especialidad;?></td>
            <td>
            <?php
            if($estado == "1"){?>

            <button class="btn btn-success btn-sm" style="border-radius: 20px;">Activo</button>
            <?php
            }else{?>
            <button class="btn btn-danger btn-sm" style="border-radius: 20px;">Inactivo</button>

            <?php
            }
            ?>
            </td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#modalAsignacionVer<?=$id_docentes;?>">
              <i class="bi bi-card-heading"></i> Ver materias
              </button>
                <!-- Modal -->
                <div class="modal fade" id="modalAsignacionVer<?=$id_docentes;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header" style="text-align: center; background-color:#D0EAF8">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Materias Asignadas</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <b>Docente:</b><?=$Apellidos_docentes." - ".$nombres_docentes;?>
                        <table class="table table-bordered table-striped table-sm table-hover">
                            <tr>
                              <th><center>Nro</center></th>
                              <th><center>Nivel</center></th>
                              <th><center>Turno</center></th>
                              <th><center>Grado</center></th>
                              <th><center>Sección</center></th>
                              <th><center>Materia</center></th>
                              <th><center>Aciones</center></th>
                            </tr>
                          <?php 
                          
                        $contador = 0;
foreach ($asignaciones_docente as $asignacion) { // Ejemplo de cómo debería ser
  $id_asignacion = $asignacion['id_asignaciones'];
    if($asignacion['docentes_id'] == $id_docentes){ // Comprobar si esta asignación es para el docente actual
        $contador = $contador + 1;                  

?>

                              <tr>
                                <td><center><?=$contador;?></center></td>
                                <td><center><?=$asignacion['nivel'];?></center></td>
                                <td><center><?=$asignacion['turno'];?></center></td>
                                <td><center><?=$asignacion['grado'];?></center></td>
                                <td><center><?=$asignacion['seccion'];?></center></td>
                                <td><center><?=$asignacion['nombre_asignatura'];?></center></td>
                                <td>
              <!--  <div class="btn-group" role="group" aria-label="Basic example">
                  <a class="btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#modalEdicion<?=$id_asignacion;?>"><i class="bi bi-pen"></i></a>

                  <!-- Modal -->

                <!--  <div class="modal fade" id="modalEdicion<?=$id_asignacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; background-color:cadetblue">
        <h5 class="modal-title" id="exampleModalLabel"><b>Asignación de Materias</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?=APP_URL;?>/app/controllers/docentes/create_asignaciones.php" method="post">
            <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Docentes</label>
            <select name="id_docente" id="" class="form-select">
              <?php
                foreach($docentes as $docente_edit) {
                  $id_docente = $docente_edit['id_docentes']; ?>

                <option value="<?=$id_docente;?>"><?=$docente_edit['apellidos']."-".$docente['nombres']; ?></option>

                <?php
                }
              ?>
            </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Niveles</label>
            <select name="id_nivel" id="" class="form-select">
              <?php
                foreach($niveles as $nivele_edit) {
                  $id_nivel = $nivele_edit['id_nivel']; ?>

                <option value="<?=$id_nivel;?>"><?=$nivele_edit['nivel']."-".$nivele_edit['turno']; ?></option>

                <?php
                }
              ?>
            </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Grados</label>
            <select name="id_grados" id="" class="form-select">
              <?php
                foreach($grados as $grado_edit) {
                  $id_grado = $grado_edit['id_grados']; ?>

                <option value="<?=$id_grado;?>"><?=$grado_edit['grado']."-".$grado_edit['seccion']; ?></option>

                <?php
                }
              ?>
            </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Asignaturas</label>
            <select name="id_asignaturas" id="" class="form-select">
              <?php
                foreach($asignaturas as $asignatura_edit) {
                  $id_asignatura = $asignatura_edit['id_asignaturas']; ?>

                <option value="<?=$id_asignatura;?>"><?=$asignatura_edit['nombre_asignatura']; ?></option>

                <?php
                }
              ?>
            </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
        </form>
    </div>
  </div>
</div> -->
                <form action="<?=APP_URL;?>/app/controllers/docentes/delete_asignaciones.php" onclick="preguntar<?=$id_asignacion?>(event)" method="post" id="miFormulario<?=$id_asignacion;?>">
                    <input type="text" name="id_asignacion" value="<?=$id_asignacion;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
                  
              <script>
              function preguntar<?=$id_asignacion;?>(event) {
                event.preventDefault();
                  Swal.fire({
                    title: 'Eliminar registro',
                    text: '¿Desea eliminar este registro?',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: 'Eliminar',
                    confirmButtonColor: '#a5161d',
                    denyButtonColor: '#270a0a',
                    denyButtonText: 'Cancelar',
                    }).then((result) => {
                      if (result.isConfirmed) {
                      var form = $('#miFormulario<?=$id_asignacion;?>');
                      form.submit();
                        }
                      });
                }
              </script>
        
                </div>
                
              </td>
                              </tr>

                        <?php
                        
                        }
                        
                      }
                          ?>
                        </table>
                        
                      </div>
                    </div>
                  </div>
                </div>
            </td>
              
            </tr>
              <?php
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

<!-- Modal -->
<div class="modal fade" id="modalAsignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; background-color:cadetblue">
        <h5 class="modal-title" id="exampleModalLabel"><b>Asignación de Materias</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?=APP_URL;?>/app/controllers/docentes/create_asignaciones.php" method="post">
            <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Docentes</label>
            <select name="id_docente" id="" class="form-select">
              <?php
                foreach($docentes as $docente) {
                  $id_docente = $docente['id_docentes']; ?>

                <option value="<?=$id_docente;?>"><?=$docente['apellidos']."-".$docente['nombres']; ?></option>

                <?php
                }
              ?>
            </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Niveles</label>
            <select name="id_nivel" id="" class="form-select">
              <?php
                foreach($niveles as $nivele) {
                  $id_nivel = $nivele['id_nivel']; ?>

                <option value="<?=$id_nivel;?>"><?=$nivele['nivel']."-".$nivele['turno']; ?></option>

                <?php
                }
              ?>
            </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Grados</label>
            <select name="id_grados" id="" class="form-select">
              <?php
                foreach($grados as $grado) {
                  $id_grado = $grado['id_grados']; ?>

                <option value="<?=$id_grado;?>"><?=$grado['grado']."-".$grado['seccion']; ?></option>

                <?php
                }
              ?>
            </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Asignaturas</label>
            <select name="id_asignaturas" id="" class="form-select">
              <?php
                foreach($asignaturas as $asignatura) {
                  $id_asignatura = $asignatura['id_asignaturas']; ?>

                <option value="<?=$id_asignatura;?>"><?=$asignatura['nombre_asignatura']; ?></option>

                <?php
                }
              ?>
            </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
        </form>
    </div>
  </div>
</div>

