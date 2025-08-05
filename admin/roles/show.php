<?php
include ('../../app/config.php');
include ('../layout/parte_1.php');

include ('../../app/controllers/roles/datos_del_rol.php');

$id_roles = $_GET['id'];

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Rol: <?=$nombre_rol;?> </h1> 
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
                      <label for=""><b>Nombre del Rol</b></label>
                      <p><?=$nombre_rol;?></p>
                    </div>
                  </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <a href="<?=APP_URL;?>/admin/roles" class= "btn btn-secondary">Volver</a>
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