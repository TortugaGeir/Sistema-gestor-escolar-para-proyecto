<?php
include ('../../app/config.php');
include ('../layout/parte_1.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Crear un nuevo rol</h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llenado de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/roles/create.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <hr>
                      <label for="">Nombre del Rol</label>
                      <input type="text" redonly class= "form-control" name="nombre_rol" Required>
                    </div>
                  </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <a href="<?=APP_URL;?>/admin/roles" class= "btn btn-secondary">Cancelar</a>
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
include ('../layout/parte_2.php');
include ('../../layout/mensajes.php');


?>