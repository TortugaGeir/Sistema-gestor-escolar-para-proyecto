<?php
require_once ('../../../app/config.php');
include_once ('../../layout/parte_1.php');
include_once ('../../../app/controllers/configuraciones/periodos/listado_periodos.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Periodos Escolares</h1> 
        <br> <br> <br> <br>

      <div class="col-md-8">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Periodos Registrados</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Agregar un nuevo Periodo Educativo</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Perido Escolar</th>
            <th>Momento</th>
            <th>Estado</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_periodos = 0;
            foreach ($periodos as $periodos) {
              $contador_periodos = $contador_periodos +1;
              $id_periodo = $periodos ['id_periodo'];
              $periodo = $periodos ['periodo'];
              $momento = $periodos ['momento'];
              $estado = $periodos ['estado'];
              ?>
            <tr>
              <td><?=$contador_periodos;?></td>
              <td><?=$periodo;?></td>
              <td><?=$momento;?></td>
              <td><?=$estado;?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="show.php?id=<?=$id_periodos;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_periodo;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/configuraciones/periodos/delete.php" onclick="preguntar<?=$id_periodo;?>(event)" method="post" id="miFormulario<?=$id_periodo;?>">
                    <input type="text" name="id_periodo" value="<?=$id_periodo;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
              <script>
              function preguntar<?=$id_periodo;?>(event) {
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
                      var form = $('#miFormulario<?=$id_periodo;?>');
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
include ('../../layout/parte_2.php');
include ('../../../layout/mensajes.php');


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