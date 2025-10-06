<?php
require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');

include_once('../../app/controllers/niveles/listado_niveles.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Crear Grado</h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llenar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/grados/create.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Nivel</b></label>
                          <select name="nivel_id" id="" class="form-select" required>
                      <?php
                        foreach ($niveles as $niveles){
                          if($niveles['estado']=="1"){ ?>
                            <option value="<?=$niveles ['id_nivel']; ?>">
                        <?=$niveles ['nivel'] . "-".$niveles['turno'] ; ?>
                      </option>
                            <?php
                          }
                          ?>
                      <?php
                        }
                      ?>
                      </select>
                        </div>
                      </div>
                  <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Grado</b></label>
                          <select name="grado" id="" class="form-select" required>
                            <option value="INICIAL 1">INICIAL 1</option>
                            <option value="INICIAL 2">INICIAL 2</option>
                            <option value="INICIAL 3">INICIAL 3</option>
                            <option value="PRIMER GRADO">PRIMER GRADO</option>
                            <option value="SEGUNDO GRADO">SEGUNDO GRADO</option>
                            <option value="TERCER GRADO">TERCER GRADO</option>
                            <option value="CUARTO GRADO">CUARTO GRADO</option>
                            <option value="QUINTO GRADO">QUINTO GRADO</option>
                            <option value="SEXTO GRADO">SEXTO GRADO</option>
                            <option value="SEPTIMO GRADO">SEPTIMO GRADO</option>
                            <option value="OCTAVO GRADO">OCTAVO GRADO</option>
                            <option value="NOVENO GRADO">NOVENO GRADO</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Sección</b></label>
                          <select name="seccion" id="" class="form-select" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
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
                    <a href="<?=APP_URL;?>/admin/grados" class= "btn btn-secondary">Cancelar</a>
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