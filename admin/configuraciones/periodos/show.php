<?php

$id_periodo = $_GET['id'];

require_once ('../../../app/config.php');
include_once ('../../layout/parte_1.php');
include_once('../../../app/controllers/configuraciones/periodos/dato_periodo.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Gestión: <?=$periodo;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Ver datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Periodo Escolar</b></label>
                      <p><?=$periodo;?></p>
                    </div>
                  </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Momento</b></label>
                            <p><?=$momento;?></p>
                        </div>
                      </div>
                      <div class="col-md-8">
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
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Fecha de creación</b></label>
                            <p><?=$fyh_create;?></p>
                        </div>
                      </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <a href="<?=APP_URL;?>/admin/configuraciones/periodos" class= "btn btn-info">Volver</a>
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