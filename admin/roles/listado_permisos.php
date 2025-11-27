<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/roles/listado_permisos.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Permisos</h1> 
        <br> <br> <br> <br>

      <div class="col-md-10">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Permisos Registrados</h3>

                <div class="card-tools">
                  <a href="create_permiso.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Crear un nuevo Permiso</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example1" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Nombre de la url</th>
            <th>Url</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_permisos = 0;
            foreach ($permisos as $permiso) {
              $contador_permisos = $contador_permisos +1;
              $id_permiso = $permisos ['id_permisos'];
              $nombre_url = $permisos ['nombre'];
              $url = $permisos ['ruta'];
              ?>
            <tr>
              <td><?=$contador_permisos;?></td>
              <td><?=$nombre_url;?></td>
              <td><?=$url;?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="edit_permisos.php?id=<?=$id_permiso;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/roles/delete_permisos.php" onclick="preguntar<?=$id_permiso;?>(event)" method="post" id="miFormulario<?=$id_roles;?>">
                    <input type="text" name="id_rol" value="<?=$id_permiso;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
            <script>
              function preguntar<?=$id_permiso;?>(event) {
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
                      var form = $('#miFormulario<?=$id_permiso;?>');
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
include_once ('../layout/parte_2.php');
include_once ('../../layout/mensajes.php');


?>
<!-- Page specific script -->
<<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Roles",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>