<?php

$id_asignatura = $_GET['id'];

include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/asignaturas/datos_asignatura.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Asignatura:<?=$asignatura;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombre de Asignatura</b></label>
                          <p style="margin-bottom: 16px;"><?=$asignatura;?></p>
                    </div>
                  </div>
                  <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Descripción</b></label>
                          <p style="margin-bottom: 16px;"><?=$descripcion;?></p>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Estado</b></label>
                        <p style="margin-bottom: 16px;"><?php
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
                    <a href="<?=APP_URL;?>/admin/asignaturas" class= "btn btn-secondary">Volver</a>
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
include ('../layout/parte_2.php');
include ('../../layout/mensajes.php');


?>