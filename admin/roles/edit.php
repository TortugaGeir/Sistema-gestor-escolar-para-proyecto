<?php
include ('../../app/config.php');
include ('../layout/parte_1.php');

include ('../../app/controllers/roles/datos_del_rol.php');

$id_roles = $_GET['id'];

?>
<div class= "content-wraper">
    <div class= "container">
      <form action="<?=APP_URL;?>/app/controllers/roles/update.php" method="post">
        <div class= "row">
      <h1>Editar rol: <?=$nombre_rol;?> </h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-primary">
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
                      <input type="text" name="id_rol" value="<?=$id_roles;?> " hidden>
                      <input type="text" class=" form-control" name="nombre_rol" value="<?=$nombre_rol;?> ">
                    </div>
                  </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="<?=APP_URL;?>/admin/roles" class= "btn btn-secondary">Cancelar</a>
                    </div>
                  </div>
      </form>
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