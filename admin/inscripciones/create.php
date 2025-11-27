<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/roles/listado_roles.php');
include_once('../../app/controllers/grados/listado_grados.php');
include_once('../../app/controllers/configuraciones/periodos/listado_periodos.php');
?>

<script src="<?=APP_URL;?>/public/js/steps_form.js"></script>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Inscripción de un Nuevo Estudiante</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Inscribir Estudiante</h3>

                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?=APP_URL;?>/app/controllers/inscripciones/create.php" method="post" enctype="multipart/form-data">
                <ol class="list-group list-group-horizontal" style="justify-content: space-between;">
                  <li class="list-group-item btn-primary" style="border-radius: 50%;"><i class="bi bi-1-circle-fill"></i>
                </li>
                  <li class="list-group-item btn-primary" style="border-radius: 50%;"><i class="bi bi-2-circle-fill"></i></li>
                  <li class="list-group-item btn-primary" style="border-radius: 50%;"><i class="bi bi-3-circle-fill"></i></li>
                </ol>
                <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Nombre del Rol</b></label>
                      <a href="<?=APP_URL;?>/admin/roles/create.php"><i class="bi bi-bookmark-plus"></i></a>
                      <select name="rol_id" id="" class="form-select" required>
                      <?php
                        foreach ($roles as $roles){?>
                      <option value="<?=$roles ['id_roles']; ?>" <?=$roles ['nombre_rol']=="ESTUDIANTE" ? 'selected': ''?>>
                        <?=$roles ['nombre_rol']; ?>
                      </option>
                      <?php
                        }
                      ?>
                      </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Cedula Estudiantil</b></label>
                          <input type="number" name="ci_estudiantil" class="form-control" required>
                        </div>
                      </div>
                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Nombres del Estudiante</b></label>
                          <input type="text" class="form-control" name="nombres_estudiante">
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Apellidos del Estudiante</b></label>
                          <input type="text" class="form-control" name="apellidos_estudiante">
                        </div>
                      </div>

                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Telefono</b></label>
                          <input type="number" name="telefono_estudiante" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Cedula de Identidad</b></label>
                          <input type="number" name="ci" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Deber</b></label>
                          <input type="text" name="profesion_estudiante" class="form-control" value="Estudiante" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Fecha de Nacimiento</b></label>
                          <input type="date" name="fecha_nacimiento_estudiante" class="form-control" required>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección</b></label>
                          <textarea class="form-control" name="direccion_estudiante" rows="3" placeholder="Escriba la Dirección" style="margin-bottom: 12px;" required></textarea>
                        </div>
                      </div>
                  </div>
                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for=""><b>Logo de la Institución</b></label>
                          <input type="file" name="foto_estudiante" id="file" class="form-control btn btn-warning" style="margin-bottom: 24px; border: radius 50px;">
                          <center> 
                            <output id="list"></output>
                          </center>
                        </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              
              <!-- /.card-body -->
            </div>
    </div>
</div>

<div class= "content-wraper" style="margin-top: 40px;">
    <div class= "container">
      <div class= "row">
        <br> <br> <br> 

      <div class="col-md-12">
      <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llenado de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                    <!--Formulario-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Grado a Cursar</b></label>
                      <a href="<?=APP_URL;?>/admin/grados/create.php"><i class="bi bi-bookmark-plus"></i></a>
                      <select name="grados_id" id="" class="form-select" required>
                      <?php
                        foreach ($grados as $grados){?>
                      <option value="<?=$grados ['id_grados']; ?>" >
                        <?=$grados ['grado']. " - ".$grados['seccion']. " - ".$grados['turno']; ?>
                      </option>
                      <?php
                        }
                      ?>
                      </select>
                      
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Periodo a Cursar</b></label>
                      <a href="<?=APP_URL;?>/admin/configuraciones/periodos/create.php"><i class="bi bi-bookmark-plus"></i></a>
                      <select name="periodo_id" id="" class="form-select" required>
                      <?php
                        foreach ($periodos as $periodos){
                          if($periodos['estado']=="1"){?>
                      <option value="<?=$periodos ['id_periodo']; ?>" >
                        <?=$periodos ['periodo']; ?>
                      </option>
                      <?php
                          }
                          ?>
                      <?php
                        }
                      ?>
                      </select>
                      
                    </div>
                  </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Correo Electronico</b></label>
                        <input type="email" name="email_estudiante" class="form-control" required>
                    </div>
                    </div>
                </div>
                <hr>
      <!-- /.card-header -->
              </div> 
          </div>
              </div>
              </div>
            </div>
    </div>
</div>
<div class= "content-wraper" style="margin-top: 40px;">
    <div class= "container">
      <div class= "row">
        <br> <br> <br> 

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llenado de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombres del Representante</b></label>
                        <input type="text" name="nombres_repre" class="form-control" required>
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos del Representante</b></label>
                        <input type="text" name="apellidos_repre" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Cedula de Identidad del Reprsentante</b></label>
                        <input type="number" name="ci_repre" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for="" style="margin-bottom: 30px;"><b>Parentesco</b></label>
                        <select name="parentesco" id="" class="form-select" required>
                            <option value="MADRE">MADRE</option>
                            <option value="PADRE">PADRE</option>
                            <option value="ABUELO">ABUELO</option>
                            <option value="TIO">TIO</option>
                            <option value="TIA">TIA</option>
                            <option value="HERMANO">HERMANO</option>
                            <option value="HERMANA">HERMANA</option>
                            <option value="TUTOR">TUTOR</option>
                            <option value="OTROS">OTROS</option>
                          </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Fecha de Nacimiento del Representante</b></label>
                        <input type="date" name="fecha_nacimiento_repre" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Telefono del Representante</b></label>
                        <input type="number" name="tlf_repre" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Profesión del Representante</b></label>
                        <input type="text" name="profesion_repre" class="form-control" required>
                    </div>
                    </div>
                  </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección del Representante</b></label>
                          <textarea class="form-control" name="direccion_repre" rows="3" placeholder="Escriba la Dirección" style="margin-bottom: 12px;" required></textarea>
                        </div>
                      </div>
                  
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-warning">Registrar</button>
                    <a href="<?=APP_URL;?>/admin/inscripciones" class= "btn btn-secondary">Cancelar</a>
                    </div>
                  </div>
                </div>
              </div> 
            </form>
          </div>
              
              </div>
              
              </div>

            </div>
    </div>
</div>
<?php
include_once ('../layout/parte_2.php');
include_once ('../../layout/mensajes.php');


?>

<script>
    function archivo(evt) {
    var files = evt.target.files; // FileList object
     // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
     //Solo admitimos imágenes.
      if (!f.type.match('image.*')) {
        continue;
                        }
      var reader = new FileReader();
      reader.onload = (function (theFile) {
      return function (e) {
       // Insertamos la imagen
      document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
          };
    })(f);
      reader.readAsDataURL(f);
      }
        }
  document.getElementById('file').addEventListener('change', archivo, false);
</script>


