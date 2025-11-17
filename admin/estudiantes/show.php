<?php

$id_estudiantes = $_GET ['id'];
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once('../../app/controllers/estudiantes/datos_estudiante.php')
?>

<script src="<?=APP_URL;?>/public/js/steps_form.js"></script>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Estudiante:<?=$nombres_estudiantes." ".$apellidos_estudiantes;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Mostrar datos</h3>

                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                      <p><?=$rol;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Cedula Estudiantil</b></label>
                          <p><?=$ci_escolar;?></p>
                        </div>
                      </div>
                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Nombres del Estudiante</b></label>
                          <p><?=$nombres_estudiantes;?></p>
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Apellidos del Estudiante</b></label>
                          <p><?=$apellidos_estudiantes;?></p>
                        </div>
                      </div>

                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Telefono</b></label>
                          <p><?=$tlf_estudiantes;?></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for=""><b>Cedula de Identidad</b></label>
                          <?=$ci;?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Deber</b></label>
                          <p><?=$deber_estudiantes;?></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for=""><b>Fecha de Nacimiento</b></label>
                          <?=$fecha_nacimiento_estudiantes;?>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección</b></label>
                          <p><?=$direccion_estudiantes;?></p>
                        </div>
                      </div>
                  </div>
                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for=""><b>Foto del Estudiante</b></label>
                          <center> 
                            <img src="<?=APP_URL."/public/images/estudiantes/".$foto;?>" width="250px" alt="">
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
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Mostrar Datos</h3>
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
                      <p><?=$grados. "-".$seccion;?></p>
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Periodo a Cursar</b></label>
                      
                      <p><?=$periodo;?></p>
                      
                    </div>
                  </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Correo Electronico</b></label>
                        <p><?=$email_estudiantes;?></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                          <div class="col-md-4">
                          <label for=""><b>Estatus</b></label>
                          <p><?=$estatus;?></p>
                          </div>
                          <div class="col-md-4">
                          <label for=""><b>Estado</b></label>
                          <p><?php
                          if($estado == '1'){
                            print "ACTIVO";
                          }else{
                            print "INACTIVO";
                          }
                        ?></p>
                          </div>
                          <div class="col-md-4">
                          <label for=""><b>Fecha de Creación</b></label>
                          <p><?=$fyh_create;?></p>
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
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Mostrar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombres del Representante</b></label>
                        <p><?=$nombres_representante;?></p>
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos del Representante</b></label>
                        <p><?=$apellidos_representante;?></p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Cedula de Identidad del Reprsentante</b></label>
                        <p><?=$ci_representante;?></p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for="" style="margin-bottom: 30px;"><b>Parentesco</b></label>
                        <p><?=$parentesco;?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Fecha de Nacimiento del Representante</b></label>
                        <?=$fecha_nacimiento_representante;?>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Telefono del Representante</b></label>
                        <p><?=$tlf_representante;?></p>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Profesión del Representante</b></label>
                        <p><?=$profesion;?></p>
                    </div>
                    </div>
                  </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección del Representante</b></label>
                          <p><?=$direccion_representante;?></p>
                        </div>
                      </div>
                  
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <a href="<?=APP_URL;?>/admin/estudiantes" class= "btn btn-info">Volver</a>
                    </div>
                  </div>
                </div>
              </div> 
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