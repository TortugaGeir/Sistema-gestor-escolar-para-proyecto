<?php
include ('../../app/config.php');
include ('../layout/parte_1.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Crear una Asignatura</h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llenar de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/asignaturas/create.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombre de Asignatura</b></label>
                      <input type="text" redonly class= "form-control" name="asignatura" Required>
                    </div>
                  </div>
                  <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Descripción</b></label>
                          <textarea class="form-control" name="descripcion" rows="3" placeholder="Escriba la Descripción" style="margin-bottom: 12px;" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Estado</b></label>
                          <select name="estado" id="" class="form-select" required>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                          </select>
                        </div>
                      </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <a href="<?=APP_URL;?>/admin/asignaturas" class= "btn btn-secondary">Cancelar</a>
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