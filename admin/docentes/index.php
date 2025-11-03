<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/docentes/listado_docentes.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado del Personal Docente</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Docentes Registrados</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Crear un nuevo Docente</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body overflow-y-scroll">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Carnet Identidad</th>
            <th>Correo</th>
            <th>Profesión</th>
            <th>Especialidad</th>
            <th>Antiguedad</th>
            <th>Estado</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_docentes = 0;
            foreach ($docentes as $docentes) {
              $contador_docentes = $contador_docentes +1;
              $id_docentes = $docentes ['id_docentes'];
              $nombres_docentes = $docentes ['nombres'];
              $Apellidos_docentes = $docentes ['apellidos'];
              $ci = $docentes ['ci'];
              $correo = $docentes ['email'];
              $profesion = $docentes ['profesion'];
              $especialidad = $docentes ['especialidad'];
              $antiguedad = $docentes ['antiguedad'];
              $estado = $docentes ['estado'];
              ?>
            <tr>
              <td><?=$contador_docentes;?></td>
              <td><?=$nombres_docentes;?></td>
              <td><?=$Apellidos_docentes;?></td>
              <td><?=$ci;?></td>
              <td><?=$correo;?></td>
              <td><?=$profesion;?></td>
              <td><?=$especialidad;?></td>
              <td><?=$antiguedad;?></td>
            <td>
            <?php
            if($estado == "1"){?>

            <button class="btn btn-success btn-sm" style="border-radius: 20px;">Activo</button>
            <?php
            }else{?>
            <button class="btn btn-danger btn-sm" style="border-radius: 20px;">Inactivo</button>
            <?php
            }
            ?>
            </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="show.php?id=<?=$id_docentes;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_docentes;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
              <!--    <form action="<?=APP_URL;?>/app/controllers/usuarios/delete.php" onclick="preguntar<?=$id_docentes;?>(event)" method="post" id="miFormulario<?=$id_docentes;?>">
                    <input type="text" name="id_usuarios" value="<?=$id_docentes;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
              <script>
              function preguntar<?=$id_docentes;?>(event) {
                event.preventDefault();
                  Swal.fire({
                    title: 'Eliminar registro',
                    text: '¿Desea eliminar este registro?',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: 'Eliminar',
                    confirmButtonColor: '#a5161d',
                    denyButtonColor: '#270a0a',
                    denyButtonText: 'Cancelar',
                    }).then((result) => {
                      if (result.isConfirmed) {
                      var form = $('#miFormulario<?=$id_docentes;?>');
                      form.submit();
                        }
                      });
                }
              </script>
          -->
                </div>
              </td>
            </tr>
              <?php
            }  
            ?>

          </tbody>
        </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>

<?php
include_once ('../layout/parte_2.php');
include_once ('../../layout/mensajes.php');


?>