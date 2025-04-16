<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/roles/listado_de_roles.php');
include ('../../app/controllers/roles/listado_de_permisos.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de roles</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Roles registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo rol</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nombre del rol</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_rol = 0;
                                    foreach ($roles as $role){
                                        $id_rol = $role['id_rol'];
                                        $contador_rol = $contador_rol +1; ?>
                                        <tr>
                                            <td style="text-align: center"><?=$contador_rol;?></td>
                                            <td><?=$role['nombre_rol'];?></td>
                                            <td style="text-align: center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal_signacion<?=$id_rol?>">
                                                        <i class="bi bi-check-circle"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal_signacion<?=$id_rol?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$id_rol?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #dbcd59;">
                                                                    <h5 class="modal-title" id="exampleModalLabel<?=$id_rol?>">Asignación de roles</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
                                                                        <span aria-hidden="true">&times;</span> 
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <label>Rol: <?=$role['nombre_rol'];?></label>  
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <select name="" id="" class="form-control">
                                                                                <?php
                                                                                foreach ($permisos as $permiso){
                                                                                    $id_permiso = $permiso['id_permiso']; ?>
                                                                                    <option value="<?=$id_permiso?>"><?=$permiso['nombre_url'];?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <button type="submit" class="btn btn-primary mb-2">Asignar</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <table>
                                                                            
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="show.php?id=<?=$id_rol;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?=$id_rol;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?=APP_URL;?>/app/controllers/roles/delete.php" onclick="preguntar<?=$id_rol;?>(event)" method="post" id="miFormulario<?=$id_rol;?>">
                                                        <input type="text" name="id_rol" value="<?=$id_rol;?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                    <script>
                                                        function preguntar<?=$id_rol;?>(event) {
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
                                                                    var form = $('#miFormulario<?=$id_rol;?>');
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
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
                }, {
                    extend: 'csv'
                }, {
                    extend: 'excel'
                }, {
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
