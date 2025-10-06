<?php

$id_asignatura = $_GET['id'];

include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/asignaturas/datos_asignatura.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Modificar Asignatura:<?=$asignatura;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llenar de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/asignaturas/update.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombre de Asignatura</b></label>
                      <input type="text" name="id_asignatura" value="<?=$id_asignatura;?>" hidden>
                      <input type="text" redonly class= "form-control" name="asignatura" value="<?=$asignatura;?>" required>
                    </div>
                  </div>
                  <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Descripción</b></label>
                          <textarea class="form-control" name="descripcion" rows="3"  style="margin-bottom: 12px;">
                            <?php
                              echo htmlspecialchars($descripcion);
                            ?>
                          </textarea>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for=""><b>Estado</b></label>
                          <select name="estado" id="" class="form-select">
                            <option value="ACTIVO" <?=$estado=='1' ? 'selected': ''?>>
                              ACTIVO</option>
                            <option value="INACTIVO" <?=$estado=='0' ? 'selected': ''?>>INACTIVO</option>
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