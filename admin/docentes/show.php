<?php

$id_docentes = $_GET ['id'];
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/docentes/datos_docente.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Docente:<?=$nombres;?></h1> 
        <br> <br> <br> 

      <div class="col-md-12">
      <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Mostrar datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                <!--Formulario-->
                      <label for=""><b>Nombre del Rol</b></label>
                      <p><?=$rol;?></p>
                      
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Nombres</b></label>
                        <p><?=$nombres;?></p>
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos</b></label>
                        <p><?=$apellidos;?></p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Cedula de Identidad</b></label>
                        <p><?=$ci;?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Fecha de Nacimiento</b></label>
                        <p><?=$fecha_nacimiento;?></p>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Telefono</b></label>
                        <p><?=$tlf;?></p>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Profesión</b></label>
                        <p><?=$profesion;?></p>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Correo Electronico</b></label>
                        <p><?=$email;?></p>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Especialidad</b></label>
                        <p><?=$especialidad;?></p>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Antiguedad en la Institución</b></label>
                        <p><?=$antiguedad;?></p>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>estado</b></label>
                        <p><?php
                          if($estado == '1'){
                            print "ACTIVO";
                          }else{
                            print "INACTIVO";
                          }
                        ?></p>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Fecha de Creación</b></label>
                        <p><?=$fyh_create;?></p>
                    </div>
                    </div>
                  </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección</b></label>
                          <p><?=$direccion;?></p>
                        </div>
                      </div>
                  
                </div>
                <hr>
                              <!-- /.card-header -->
            <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                    <a href="<?=APP_URL;?>/admin/docentes" class= "btn btn-info">Volver</a>
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
include_once ('../layout/parte_2.php');
include_once ('../../layout/mensajes.php');


?>