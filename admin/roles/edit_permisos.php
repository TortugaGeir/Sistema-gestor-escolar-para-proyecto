<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/roles/listado_roles.php');
?>

<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Crear nuevo Permiso de Acceso</h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Llenar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/configuraciones/periodos/create.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Ruta</b></label>
                      <input type="text" redonly class= "form-control" name="periodo" Required>
                    </div>
                  </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-warning">Registrar</button>
                    <a href="<?=APP_URL;?>/admin/roles/listado_permisos.php" class= "btn btn-secondary">Cancelar</a>
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