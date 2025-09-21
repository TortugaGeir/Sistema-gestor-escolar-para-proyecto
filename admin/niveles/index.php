<?php
require_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/niveles/listado_niveles.php');

?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Niveles</h1> 
        <br> <br> <br> <br>

      <div class="col-md-12">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Niveles Registrados</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Agregar un nuevo Nivel</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example2" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Niveles</th>
            <th>Turno</th>
            <th>Periodo Escolar</th>
            <th>Estado</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_niveles = 0;
            foreach ($niveles as $niveles) {
              $contador_niveles = $contador_niveles +1;
              $id_niveles = $niveles ['id_nivel'];
              $nivel = $niveles ['nivel'];
              $turno = $niveles ['turno'];
              $periodo_escolar = $niveles['periodo']  ?? null;
              $estado = $niveles ['estado'];
              ?>
            <tr>
              <td><?=$contador_niveles;?></td>
              <td><?=$nivel;?></td>
              <td><?=$turno;?></td>
              <td><?=$periodo_escolar;?></td>
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
                  <a href="show.php?id=<?=$id_niveles;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_niveles;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/niveles/delete.php" onclick="preguntar<?=$id_niveles;?>(event)" method="post" id="miFormulario<?=$id_niveles;?>">
                    <input type="text" name="id_nivel" value="<?=$id_niveles;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form> 
              <script>
              function preguntar<?=$id_niveles;?>(event) {
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
                      var form = $('#miFormulario<?=$id_niveles;?>');
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