<?php

$id_administrativo = $_GET ['id'];
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/roles/listado_roles.php');
include_once ('../../app/controllers/administrativos/datos_administrativos.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Modificar Administrativos: <?=$nombres." ".$apellidos;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llenado de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/administrativos/update.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                <!--Formulario-->
                <input type="text" name="id_administrativo" value="<?=$id_administrativo;?>" hidden>
                <input type="text" name="id_personas" value="<?=$id_personas;?>" hidden>
                <input type="text" name="id_usuarios" value="<?=$id_usuarios;?>" hidden>
                      <label for=""><b>Nombre del Rol</b></label>
                      <a href="<?=APP_URL;?>/admin/roles/create.php"><i class="bi bi-bookmark-plus"></i></a>
                      <select name="rol_id" id="" class="form-select" required>
                      <?php
                        foreach ($roles as $roles){?>
                      <option value="<?=$roles ['id_roles']; ?>" <?=$rol==$roles ['nombre_rol'] ? 'selected': ''?>>
                        <?=$roles ['nombre_rol']; ?>
                      </option>
                      <?php
                        }
                      ?>
                      </select>
                      
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombres</b></label>
                        <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control" required>
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos</b></label>
                        <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Cedula de Identidad</b></label>
                        <input type="number" name="ci" value="<?=$ci;?>"  class="form-control" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Fecha de Nacimiento</b></label>
                        <input type="text" name="fecha_nacimiento" value="<?=$fecha_nacimiento;?>"  class="form-control" >
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Telefono</b></label>
                        <input type="number" name="tlf"value="<?=$tlf;?>"  class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Profesión</b></label>
                        <input type="text" name="profesion" value="<?=$profesion;?>"  class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Correo Electronico</b></label>
                        <input type="email" name="email" value="<?=$email;?>"  class="form-control" required>
                    </div>
                    </div>
                  </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección</b></label>
                          <textarea class="form-control" name="direccion_admin" rows="3"  style="margin-bottom: 12px;" required>
                            <?php
                              echo htmlspecialchars($direccion);
                            ?>
                          </textarea>
                        </div>
                      </div>
                  
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="<?=APP_URL;?>/admin/administrativos" class= "btn btn-secondary">Cancelar</a>
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