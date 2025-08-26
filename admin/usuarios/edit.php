<?php

$id_usuario = $_GET['id'];

include ('../../app/config.php');
include ('../layout/parte_1.php');
include ('../../app/controllers/roles/listado_roles.php');
include ('../../app/controllers/usuarios/datos_del_usuario.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Editar Usuario: <?=$nombres;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llenado de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/usuarios/update.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                <!--Formulario-->
                      <label for=""><b>Nombre del Rol</b></label>
                      <input type="text" name="id_usuario" value="<?=$id_usuario?>" hidden>
                      <a href="<?=APP_URL;?>/admin/roles/create.php"><i class="bi bi-bookmark-plus"></i></a>
                      <select name="rol_id" id="" class="form-control" >
                      <?php
                        foreach ($roles as $roles){
                          $nombre_rol_tabla = $roles['nombre_rol'];?>
                      <option value="<?=$roles ['id_roles'];?>" 
                      <?php
                      if ($nombre_rol==$nombre_rol_tabla){
                    ?> 
                      selected="selected"> 
                    <?php 
                    } 
                  ?>
                        <?=$roles ['nombre_rol'];?>
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
                        <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control" >
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos del usuario</b></label>
                        <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Correo Electronico</b></label>
                        <input type="email" name="email" value="<?=$email;?>" class="form-control" >
                    </div>
                  </div>
                  
                    <div class="col-md-4">
                      <div class="form-group">
                      <hr>
                      <label for=""><b>Contraseña</b></label>
                        <input type="password" name="password" class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <hr>
                      <label for=""><b>Repetir Contraseña</b></label>
                        <input type="password" name="password-repet" class="form-control">
                      </div>
                    </div>
                  
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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