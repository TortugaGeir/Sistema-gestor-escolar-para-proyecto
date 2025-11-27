<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_estudiantes = $_GET ['id'];
} else {
    // Redirigir o mostrar un error si el ID no es válido
    // header('Location: error.php');
    // exit;
    $id_estudiantes = null; // O manejar el error adecuadamente
}
// ... el resto del código

include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/roles/listado_roles.php');
include_once('../../app/controllers/grados/listado_grados.php');
include_once('../../app/controllers/configuraciones/periodos/listado_periodos.php');
require_once('../../app/controllers/estudiantes/datos_estudiante.php');
?>

<script src="<?=APP_URL;?>/public/js/steps_form.js"></script>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Modificar Estudiante: <?=$nombres_estudiantes. "-" .$apellidos_estudiantes;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Modificar Estudiante</h3>

                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?=APP_URL;?>/app/controllers/estudiantes/update.php" method="post" enctype="multipart/form-data">
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
                <input type="text" name="id_estudiantes" value="<?=$id_estudiantes;?>" hidden>
                <input type="text" name="id_representante" value="<?=$id_representante;?>" hidden>
                <input type="text" name="id_personas" value="<?=$id_personas;?>" hidden>
                <input type="text" name="id_usuarios" value="<?=$id_usuarios;?>" hidden>
                <input type="text" name="id_historial" value="<?=$id_historial;?>" hidden>
                <input type="text" name="id_grados" value="<?=$id_grados;?>" hidden>
                <input type="text" name="id_periodo" value="<?=$id_periodo;?>" hidden>
                <input type="text" name="id_est_repre" value="<?=$id_est_repre;?>" hidden>
                          <label for=""><b>Nombre del Rol</b></label>
                      <a href="<?=APP_URL;?>/admin/roles/create.php"><i class="bi bi-bookmark-plus"></i></a>
                      <select name="rol_id" id="" class="form-select">
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
                          <input type="number" value="<?=$ci_escolar;?>" name="ci_estudiantil" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Nombres del Estudiante</b></label>
                          <input type="text" value="<?=htmlspecialchars($nombres_estudiantes);?>" class="form-control" name="nombres_estudiante">
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Apellidos del Estudiante</b></label>
                          <input type="text" value="<?=$apellidos_estudiantes;?>" class="form-control" name="apellidos_estudiante">
                        </div>
                      </div>

                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Telefono</b></label>
                          <input type="number" value="<?=$tlf_estudiantes;?>" name="telefono_estudiante" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Cedula de Identidad</b></label>
                          <input type="number" value="<?=$ci;?>" name="ci" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Deber</b></label>
                          <input type="text" name="profesion_estudiante" class="form-control" value="<?=$deber_estudiantes;?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Fecha de Nacimiento</b></label>
                          <input type="text" value="<?=$fecha_nacimiento_estudiantes;?>" name="fecha_nacimiento_estudiante" class="form-control">
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección</b></label>
                          <textarea class="form-control" name="direccion_estudiante" rows="3" placeholder="Escriba la Dirección" style="margin-bottom: 12px;">
                            <?php
                              echo htmlspecialchars($direccion_estudiantes);
                            ?>
                          </textarea>
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
                            <output id="list">
                              <img src="<?=APP_URL."/public/images/estudiantes/".$foto;?>" width="200px" alt="">
                            </output>
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
                  <select name="grados_id" id="" class="form-select">
                    <?php
                      foreach ($grados as $grado){ // <--- CAMBIADO $grados a $grado
                    ?>
                      <option value="<?=$grado ['id_grados']; ?>" <?=$grado ['id_grados']==$id_grados ? 'selected': ''?>>
                        <?=$grado ['grado']. " - ".$grado['seccion']. " - ".$grado['turno']; ?>
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
                      <select name="periodo_id" id="" class="form-select">
                      <?php
                        foreach ($periodos as $periodos){
                          if($periodos['estado']=="1"){?>
                      <option value="<?=$periodos ['id_periodo']; ?>" <?=$periodos ['id_periodo']==$id_periodo ? 'selected': ''?>>
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
                        <input type="email" value="<?=$email_estudiantes;?>" name="email_estudiante" class="form-control">
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
                        <input type="text" value="<?=$nombres_representante;?>" name="nombres_repre" class="form-control">
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos del Representante</b></label>
                        <input type="text" value="<?=$apellidos_representante;?>" name="apellidos_repre" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Cedula de Identidad del Reprsentante</b></label>
                        <input type="number" value="<?=$ci_representante;?>" name="ci_repre" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for="" style="margin-bottom: 30px;"><b>Parentesco</b></label>
                        <select name="parentesco" id="" class="form-select">
                            <option value="MADRE" <?=$parentesco=='MADRE' ? 'selected': ''?>>MADRE</option>
                            <option value="PADRE" <?=$parentesco=='PADRE' ? 'selected': ''?>>PADRE</option>
                            <option value="ABUELO" <?=$parentesco=='ABUELO' ? 'selected': ''?>>ABUELO</option>
                            <option value="TIO" <?=$parentesco=='TIO' ? 'selected': ''?>>TIO</option>
                            <option value="TIA" <?=$parentesco=='TIA' ? 'selected': ''?>>TIA</option>
                            <option value="HERMANO" <?=$parentesco=='HERMANO' ? 'selected': ''?>>HERMANO</option>
                            <option value="HERMANA" <?=$parentesco=='HERMANA' ? 'selected': ''?>>HERMANA</option>
                            <option value="TUTOR" <?=$parentesco=='TUTOR' ? 'selected': ''?>>TUTOR</option>
                            <option value="OTROS" <?=$parentesco=='OTROS' ? 'selected': ''?>>OTROS</option>
                          </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Fecha de Nacimiento del Representante</b></label>
                        <input type="text" value="<?=$fecha_nacimiento_representante;?>" name="fecha_nacimiento_repre" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Telefono del Representante</b></label>
                        <input type="number" value="<?=$tlf_representante;?>" name="tlf_repre" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Profesión del Representante</b></label>
                        <input type="text" value="<?=$profesion;?>" name="profesion_repre" class="form-control">
                    </div>
                    </div>
                  </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección del Representante</b></label>
                          <textarea class="form-control" name="direccion_repre" rows="3" placeholder="Escriba la Dirección" style="margin-bottom: 12px;">
                            <?php
                              echo htmlspecialchars($direccion_representante);
                            ?>
                          </textarea>
                        </div>
                      </div>
                  
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                    <a href="<?=APP_URL;?>/admin/estudiantes" class= "btn btn-secondary">Cancelar</a>
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


