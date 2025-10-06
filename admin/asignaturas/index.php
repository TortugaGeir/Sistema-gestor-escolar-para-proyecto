<?php
require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/asignaturas/listado_asignaturas.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Asignaturas</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Asignaturas Registradas</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Agregar una nueva Asignatura</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Asignatura</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_asignaturas = 0;
            foreach ($asignaturas as $asignaturas) {
              $contador_asignaturas = $contador_asignaturas +1;
              $id_asignaturas = $asignaturas ['id_asignaturas'];
              $nombre_asignatura = $asignaturas['nombre_asignatura'];
              $descripcion = $asignaturas['descripcion'];
              $estado = $asignaturas ['estado'];
              
              ?>
            <tr>
              <td><?=$contador_asignaturas;?></td>
              <td><?=$nombre_asignatura;?></td>
              <td><?=$descripcion;?></td>
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
                  <a href="show.php?id=<?=$id_asignaturas;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_asignaturas;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/asignaturas/delete.php" onclick="preguntar<?=$id_asignaturas;?>(event)" method="post" id="miFormulario<?=$id_asignaturas;?>">
                    <input type="text" name="id_asignatura" value="<?=$id_asignaturas;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form> 
              <script>
              function preguntar<?=$id_asignaturas;?>(event) {
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
                      var form = $('#miFormulario<?=$id_asignaturas;?>');
                      form.submit();
                        }
                      });
                }
              </script>  
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
include ('../layout/parte_2.php');
include ('../../layout/mensajes.php');


?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>