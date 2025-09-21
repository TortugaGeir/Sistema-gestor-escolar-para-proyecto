<?php
require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');

include_once('../../app/controllers/configuraciones/periodos/listado_periodos.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Crear Nivel Edecutivo</h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llenar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/niveles/create.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>niveles</b></label>
                          <select name="niveles" id="" class="form-select" required>
                            <option value="INICIAL">INICIAL</option>
                            <option value="PRIMERA ETAPA">PRIMERA ETAPA</option>
                            <option value="SEGUNDA ETAPA">SEGUNDA ETAPA</option>
                            <option value="MEDIA GENERAL">MEDIA GENERAL</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Periodo Escolar</b></label>
                          <select name="periodo_id" id="" class="form-select" required>
                      <?php
                        foreach ($periodos as $periodos){
                          if($periodos['estado']=="1"){ ?>
                            <option value="<?=$periodos ['id_periodo']; ?>">
                        <?=$periodos ['periodo']; ?>
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
                          <label for=""><b>Turno</b></label>
                          <select name="turno" id="" class="form-select" required>
                            <option value="MAÑANA">MAÑANA</option>
                            <option value="TARDE">TARDE</option>
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
                    <a href="<?=APP_URL;?>/admin/niveles" class= "btn btn-secondary">Cancelar</a>
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