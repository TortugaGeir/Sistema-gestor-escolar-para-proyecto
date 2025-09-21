<?php
require_once ('../../../app/config.php');
include_once ('../../layout/parte_1.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Crear un Periodo Educativo</h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llenar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/configuraciones/periodos/create.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Periodo Escolar</b></label>
                      <input type="text" redonly class= "form-control" name="periodo" Required>
                    </div>
                  </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Momento</b></label>
                          <select name="momento" id="" class="form-select" required>
                            <option value="1°">1°</option>
                            <option value="2°">2°</option>
                            <option value="3°">3°</option>
                          </select>
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
                    <a href="<?=APP_URL;?>/admin/configuraciones/periodos" class= "btn btn-secondary">Cancelar</a>
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