<?php
require_once ('../../../app/config.php');
include_once ('../../layout/parte_1.php');
include_once ('../../../app/controllers/configuraciones/instituciones/listado_instituciones.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de instituciones</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Instituciones Registradas</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Agregar nueva Institución</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body overflow-y-scroll">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Nombre de la Institución</th>
            <th>Logo</th>
            <th>Dirección</th>
            <th>Tipo de Institución</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Rif</th>
            <th>Código Dea</th>
            <th>Estado</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_institucion = 0;
            foreach ($instituciones as $instituciones) {
              $contador_institucion = $contador_institucion +1;
              $id_intituciones = $instituciones ['id_config_institucion'];
              $nombre_institucion = $instituciones ['nombre_institucion'];
              $logo = $instituciones ['logo'];
              $direccion = $instituciones ['direccion'];
              $tipo_institucion = $instituciones ['tipo_institucion'];
              $correo = $instituciones ['email'];
              $telefono = $instituciones ['telefono'];
              $rif = $instituciones ['rif'];
              $cog_dea = $instituciones ['cog_dea'];
              $estado = $instituciones ['estado'];
              ?>
            <tr>
              <td><?=$contador_institucion;?></td>
              <td><?=$nombre_institucion;?></td>
              <td>
                <img src="<?=APP_URL."/public/images/configuraciones/".$logo;?>" width="100px" alt="">
              </td>
              <td><?=$direccion;?></td>
              <td><?=$tipo_institucion;?></td>
              <td><?=$correo;?></td>
              <td><?=$telefono;?></td>
              <td><?=$rif;?></td>
              <td><?=$cog_dea;?></td>
              <td><?=$estado;?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="show.php?id=<?=$id_intituciones;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_intituciones;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/usuarios/delete.php" onclick="preguntar<?=$id_intituciones;?>(event)" method="post" id="miFormulario<?=$id_intituciones;?>">
                    <input type="text" name="id_instituciones" value="<?=$id_intituciones;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
              <script>
              function preguntar<?=$id_intituciones;?>(event) {
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
                      var form = $('#miFormulario<?=$id_intituciones;?>');
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