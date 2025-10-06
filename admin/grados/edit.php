<?php
$id_grados = $_GET['id'];

require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');

include_once('../../app/controllers/niveles/listado_niveles.php');
include_once('../../app/controllers/grados/datos_grados.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Modificar Grado:<?=$grado;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llenar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/grados/update.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Nivel</b></label>
                          <input type="text" name="id_grado" value="<?=$id_grados;?>" hidden>
                          <select name="nivel_id" id="" class="form-select" required>
                      <?php
                        foreach ($niveles as $niveles){
                          if($niveles['estado']=="1"){ ?>
                            <option value="<?=$niveles ['id_nivel']; ?>"
                              <?php
                            if($nivel_id==$niveles ['id_nivel']){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>
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
                            <option value="INICIAL 1"
                            <?php
                            if($grado== 'INICIAL 1'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>INICIAL 1</option>
                            <option value="INICIAL 2"
                            <?php
                            if($grado== 'INICIAL 2'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>INICIAL 2</option>
                            <option value="INICIAL 3"
                            <?php
                            if($grado== 'INICIAL 3'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>INICIAL 3</option>
                            <option value="PRIMER GRADO"
                            <?php
                            if($grado== 'PRIMER GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>PRIMER GRADO</option>
                            <option value="SEGUNDO GRADO"
                            <?php
                            if($grado== 'SEGUNDO GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>SEGUNDO GRADO</option>
                            <option value="TERCER GRADO"
                            <?php
                            if($grado== 'TERCER GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>TERCER GRADO</option>
                            <option value="CUARTO GRADO"
                            <?php
                            if($grado== 'CUARTO GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>CUARTO GRADO</option>
                            <option value="QUINTO GRADO"
                            <?php
                            if($grado== 'QUINTO GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>QUINTO GRADO</option>
                            <option value="SEXTO GRADO"
                            <?php
                            if($grado== 'SEXTO GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>SEXTO GRADO</option>
                            <option value="SEPTIMO GRADO"
                            <?php
                            if($grado== 'SEPTIMO GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>SEPTIMO GRADO</option>
                            <option value="OCTAVO GRADO"
                            <?php
                            if($grado== 'OCTAVO GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>OCTAVO GRADO</option>
                            <option value="NOVENO GRADO"
                            <?php
                            if($grado== 'NOVENO GRADO'){ ?>
                              selected="selected"
                              <?php
                            }
                            ?>>NOVENO GRADO</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Sección</b></label>
                          <select name="seccion" id="" class="form-select" required>
                            <option value="A" <?=$seccion=='A' ? 'selected': ''?>>A</option>
                            <option value="B" <?=$seccion=='B' ? 'selected': ''?>>B</option>
                            <option value="C" <?=$seccion=='C' ? 'selected': ''?>>C</option>
                            <option value="D" <?=$seccion=='D' ? 'selected': ''?>>D</option>
                            <option value="E" <?=$seccion=='E' ? 'selected': ''?>>E</option>
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