<?php
$id_grados = $_GET['id'];

require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');

include_once('../../app/controllers/grados/datos_grados.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Grado:<?=$grado;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/niveles/create.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Nivel</b></label>
                          <p><?=$nivel;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Grado</b></label>
                            <p><?=$grado;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Sección</b></label>
                          <p><?=$seccion;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Fecha de Creación</b></label>
                          <p><?=$fyh_create;?></p>
                        </div>
                      </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Estado</b></label>
                            <p><?php
                          if($estado == '1'){
                            print "ACTIVO";
                          }else{
                            print "INACTIVO";
                          }
                        ?></p>
                        </div>
                      </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <a href="<?=APP_URL;?>/admin/grados" class= "btn btn-secondary">Volver</a>
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
require_once ('../../layout/mensajes.php');


?>