<?php
include_once ('../../app/config.php');
include_once ('../layout/parte_1.php');
include_once ('../../app/controllers/roles/listado_roles.php');
?>
<div class= "content-wraper">
    <div class= "container">
      <div class= "row">
      <h1>Listado de Roles</h1> 
        <br> <br> <br> <br>

      <div class="col-md-10">
      <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Listado de Roles</h3>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Crear un nuevo rol</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table  id="example1" class= "table table-striped table-hover">
          <thead>
            <tr>
            <th>Nro.</th>
            <th>Nombre de rol</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_rol = 0;
            foreach ($roles as $roles) {
              $contador_rol = $contador_rol +1;
              $id_roles = $roles ['id_roles'];
              $nombre_rol = $roles ['nombre_rol'];?>
            <tr>
              <td><?=$contador_rol;?></td>
              <td><?=$nombre_rol;?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
               
                  <a href="show.php?id=<?=$id_roles;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_roles;?>" class="btn btn-success btn-sm"><i class="bi bi-pen"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/roles/delete.php" onclick="preguntar<?=$id_roles;?>(event)" method="post" id="miFormulario<?=$id_roles;?>">
                    <input type="text" name="id_rol" value="<?=$id_roles;?>" hidden>
                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
            <script>
              function preguntar<?=$id_roles;?>(event) {
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
                      var form = $('#miFormulario<?=$id_roles;?>');
                      form.submit();
                        }
                      });
                }
              </script>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalAsignacionrol">
                    <i class="bi bi-check2-circle"></i>
                  </button>

                <div class="modal fade " id="modalAsignacionrol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                              <div class="modal-header" style="text-align: center; background-color:khaki">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Asignación de Permisos</b></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <form action="<?=APP_URL;?>/app/controllers/docentes/create_asignaciones.php" method="post">
                                    <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                              </div>
                                </form>
                            </div>
                          </div>
                </div>
</div>
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