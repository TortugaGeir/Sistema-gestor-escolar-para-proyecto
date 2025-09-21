<?php
include ('../../app/config.php');
include ('../layout/parte_1.php');
include ('../../app/controllers/roles/listado_roles.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Crear un nuevo Usuario</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llenado de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/usuarios/create.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                <!--Formulario-->
                      <label for=""><b>Nombre del Rol</b></label>
                      <a href="<?=APP_URL;?>/admin/roles/create.php"><i class="bi bi-bookmark-plus"></i></a>
                      <select name="rol_id" id="" class="form-control" required>
                      <?php
                        foreach ($roles as $roles){?>
                      <option value="<?=$roles ['id_roles']; ?>">
                        <?=$roles ['nombre_rol']; ?>
                      </option>
                      <?php
                        }
                      ?>
                      </select>
                      
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombres del usuario</b></label>
                        <input type="text" name="nombres" class="form-control" required>
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos del usuario</b></label>
                        <input type="text" name="apellidos" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Correo Electronico</b></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                  </div>
                  
                    <div class="col-md-4">
                      <div class="form-group">
                      <hr>
                      <label for=""><b>Contraseña</b></label>
                        <input type="password" name="password" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <hr>
                      <label for=""><b>Repetir Contraseña</b></label>
                        <input type="password" name="password-repet" class="form-control" require>
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
                    <a href="<?=APP_URL;?>/admin/usuarios" class= "btn btn-secondary">Cancelar</a>
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