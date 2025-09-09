<?php

require_once ('../../../app/config.php');
include_once ('../../layout/parte_1.php');
include_once('../../../app/controllers/configuraciones/instituciones/datos_de_institucion.php');

$id_config_institucion = $_GET['id'];

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Institución: <?=$nombre_institucion;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Nombre de la Institución</b></label>
                          <p><?=$nombre_institucion;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Correo  de la Institución</b></label>
                          <p><?=$email_institucion;?></p>
                        </div>
                      </div>
                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Tipo de Institución</b></label>
                            <p><?=$tipo_institucion;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Telefono</b></label>
                          <p><?=$telefono_institucion;?></p>
                        </div>
                      </div>
                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>RIF</b></label>
                          <p><?=$rif_institucion;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Código DEA</b></label>
                          <p><?=$codigo_dea;?></p>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección</b></label>
                          <p><?=$direccion_institucion;?></p>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Fecha de Creación</b></label>
                          <p><?=$fyh_create;?></p>
                        </div>
                      </div>
                      </div>
                  </div>
                    <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for=""><b>Logo de la Institución</b></label>
                          <center> 
                            <img src="<?=APP_URL."/public/images/configuraciones/".$logo;?>" width="200px" alt="">
                          </center>
                        </div>
                        </div>
                      </div>
                    </div>
                </div>
                
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <a href="<?=APP_URL;?>/admin/configuraciones/instituciones" class= "btn btn-secondary">Volver</a>
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
include_once ('../../layout/parte_2.php');
require_once ('../../../layout/mensajes.php');


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