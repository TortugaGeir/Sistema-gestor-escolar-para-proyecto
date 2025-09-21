<?php

$id_nivel = $_GET['id'];
require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');

include_once('../../app/controllers/configuraciones/periodos/listado_periodos.php');
include_once('../../app/controllers/niveles/datos_nivel.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Modificar Nivel:<?=$nivel;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llenar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/niveles/update.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                        <div class="form-group">
                          <input type="text" name="id_nivel" value="<?=$id_nivel;?>" hidden>
                          <label for=""><b>niveles</b></label>
                          <select name="niveles" id="" class="form-select" required>
                            <option value="INICIAL" 
                          <?php
                            if($nivel== 'INICIAL'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>INICIAL</option>
                            <option value="PRIMERA ETAPA"
                              <?php
                            if($nivel== 'PRIMERA ETAPA'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>PRIMERA ETAPA</option>
                            <option value="SEGUNDA ETAPA"
                              <?php
                            if($nivel== 'SEGUNDA ETAPA'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>SEGUNDA ETAPA</option>
                            <option value="MEDIA GENERAL"
                              <?php
                            if($nivel== 'MEDIA GENERAL'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>MEDIA GENERAL</option>
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
                            <option value="<?=$periodos ['id_periodo'];?>"
                            <?php
                            if($periodo_id==$periodos ['id_periodo']){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>
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
                            <?php
                            if($turno == "MAÑANA"){ ?>
                            <option value="MAÑANA" selected="selected">MAÑANA</option>
                            <option value="TARDE">TARDE</option>
                            <?php }else { ?>
                            <option value="MAÑANA">MAÑANA</option>
                            <option value="TARDE" selected="selected">TARDE</option>
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