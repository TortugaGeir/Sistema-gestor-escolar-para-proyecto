<?php
$id_docentes = $_GET ['id'];
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/roles/listado_roles.php');
include_once('../../app/controllers/docentes/datos_docente.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Modificar Docente:<?=$nombres." ".$apellidos;?></h1> 
        <br> <br> <br> 

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llenado de datos</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
                <form action="<?=APP_URL;?>/app/controllers/docentes/update.php" method="post">
                  <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                <!--Formulario-->
                <input type="text" name="id_docente" value="<?=$id_docentes;?>" hidden>
                <input type="text" name="id_personas" value="<?=$id_personas;?>" hidden>
                <input type="text" name="id_usuarios" value="<?=$id_usuarios;?>" hidden>
                      <label for=""><b>Nombre del Rol</b></label>
                      <a href="<?=APP_URL;?>/admin/roles/create.php"><i class="bi bi-bookmark-plus"></i></a>
                      <select name="rol_id" id="" class="form-select" required>
                      <?php
                        foreach ($roles as $roles){?>
                      <option value="<?=$roles ['id_roles']; ?>" <?=$roles ['nombre_rol']=="DOCENTE" ? 'selected': ''?>>
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
                        <input type="text" value="<?=$nombres;?>" name="nombres" class="form-control" required>
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Apellidos</b></label>
                        <input type="text" value="<?=$apellidos;?>" name="apellidos" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Cedula de Identidad</b></label>
                        <input type="number" value="<?=$ci;?>" name="ci" class="form-control" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Fecha de Nacimiento</b></label>
                        <input type="text" value="<?=$fecha_nacimiento;?>" name="fecha_nacimiento" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Telefono</b></label>
                        <input type="number" value="<?=$tlf;?>" name="tlf" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Profesión</b></label>
                        <input type="text" value="<?=$profesion;?>" name="profesion" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Correo Electronico</b></label>
                        <input type="email" value="<?=$email;?>" name="email" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Especialidad</b></label>
                        <input type="text" value="<?=$especialidad;?>" name="especialidad" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <hr>
                      <label for=""><b>Antiguedad en la Institución</b></label>
                        <input type="text" value="<?=$antiguedad;?>" name="antiguedad" class="form-control" required>
                    </div>
                    </div>
                  </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Dirección</b></label>
                          <textarea class="form-control" name="direccion_docente" rows="3"style="margin-bottom: 12px;" required>
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
                    <button type="submit" class="btn btn-primary">Actualizar
                    </button>
                    <a href="<?=APP_URL;?>/admin/docentes" class= "btn btn-secondary">Cancelar</a>
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