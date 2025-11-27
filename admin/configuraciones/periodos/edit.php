<?php

$id_periodo = $_GET['id'];

require_once ('../../../app/config.php');
include_once ('../../layout/parte_1.php');
include_once('../../../app/controllers/configuraciones/periodos/dato_periodo.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Editar Periodo: <?=$periodo;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llenar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/configuraciones/periodos/update.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <hr>
                      <input type="text" name="id_periodo" value="<?=$id_periodo;?>" hidden>
                      <label for=""><b>Periodo Escolar</b></label>
                      <input type="text" value="<?=$periodo;?>" redonly class= "form-control" name="periodo" Required>
                    </div>
                  </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><b>Estado</b></label>
                          <select name="estado" id="" class="form-select" required>
                            <?php
                            if($estado == 1){ ?>
                            <option value="ACTIVO" selected="selected">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                            <?php }else { ?>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO" selected="selected">INACTIVO</option>
                            <?php
                            } ?>
                          </select>
                        </div>
                      </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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