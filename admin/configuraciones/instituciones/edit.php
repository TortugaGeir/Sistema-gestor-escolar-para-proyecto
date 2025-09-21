<?php
require_once ('../../../app/config.php');
include_once ('../../layout/parte_1.php');
include_once('../../../app/controllers/configuraciones/instituciones/datos_de_institucion.php');

$id_config_institucion = $_GET['id'];


?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Editar Datos de la Institución: <?=$nombre_institucion;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/configuraciones/instituciones/update.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Nombre de la Institución</b></label>
                          <input type="text" name="id_config_institucion" value="<?=$id_config_institucion;?>" hidden>
                          <input type="text" name="logo" value="<?=$logo;?>" hidden>
                          <input type="text" name="nombre_institucion" value="<?=$nombre_institucion;?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Correo  de la Institución</b></label>
                          <input type="email" name="email_institucion" value="<?=$email_institucion;?> " class="form-control">
                        </div>
                      </div>
                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Tipo de Institución</b></label>
                          <select name="tipo_institucion" id="" class="form-select">
                            <?php
                            if ($tipo_institucion == 'publica'){ ?>
                            <option value="publica" selected="selected">Pública</option>
                            <option value="privada">Privada</option>
                            <?php
                            }else { ?>
                            <option value="publica">Pública</option>
                            <option value="privada" selected="selected">Privada</option>
                            <?php
                            }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Telefono</b></label>
                          <input type="number" name="telefono_institucion" value="<?=$telefono_institucion;?>" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>RIF</b></label>
                          <input type="number" name="rif_institucion"  value="<?=$rif_institucion;?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Código DEA</b></label>
                          <input type="text" name="codigo_dea" value="<?=$codigo_dea;?>" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Estado</b></label>
                          <select name="estado" id="" class="form-select" required>
                            <?php
                            if($estado == 1){ ?>
                            <option value="ACTIVO" selected="selected">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                            <?php }else { ?>
                            <option value="ACTIVO" >ACTIVO</option>
                            <option value="INACTIVO" selected="selected">INACTIVO</option>
                            <?php
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección</b></label>
                          <textarea class="form-control" name="direccion_institucion"  rows="3"  style="margin-bottom: 12px;">
                            <?php
                              echo htmlspecialchars($direccion_institucion);
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
                          <input type="file" name="logo" id="file" class="form-control btn btn-primary" style="margin-bottom: 24px;">
                          <center> 
                            <output id="list">
                              <img src="<?=APP_URL."/public/images/configuraciones/".$logo;?>" width="200px" alt="">
                            </output>
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
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="<?=APP_URL;?>/admin/configuraciones/instituciones" class= "btn btn-secondary">Cancelar</a>
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