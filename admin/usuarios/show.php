<?php

$id_usuario = $_GET['id'];

require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/usuarios/datos_del_usuario.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Usuario: <?=$nombres;?></h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Datos del usuario</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group inline">
                      <hr>
                <!--Formulario-->
                      <label for=""><b>Nombre del Rol</b></label>
                      <p><?=$nombre_rol;?></p>
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombres del usuario</b></label>
                        <p><?=$nombres;?></p>
                    </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos del usuario</b></label>
                        <p><?=$apellidos;?></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Correo Electronico</b></label>
                        <p><?=$email;?></p>
                    </div>
                  </div>
                  
                    <div class="col-md-4">
                      <div class="form-group">
                      <hr>
                      <label for=""><b>Fecha de creación</b></label>
                        <p><?=$fyh_create;?></p>
                      </div>
                    </div>
                  <div class="col-md-4">
                      <div class="form-group">
                      <hr>
                      <label for=""><b>Estado</b></label>
                        <p><?php
                          if($estado == '1'){
                            print "ACTIVO";
                          }else{
                            print "INACTIVO";
                          }
                        ?></p>
                      </div>
                    </div>
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                  <a href="<?=APP_URL;?>/admin/usuarios" class= "btn btn-info">Volver</a>
                    </div>
                  </div>
                </div>
              </div> 
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