<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/kardex/listado_de_kardexs.php');

$id_estudiante = $_GET['id_estudiante'];


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de reportes de kardex</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Reportes registrados</h3>
                            
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Materia</center></th>
                                    <th><center>Fecha de reporte</center></th>
                                    <th><center>Observación</center></th>
                                    <th><center>Nota</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_reportes = 0;
                                foreach ($kardexs as $kardex) {
                                    if($id_estudiante == $kardex['estudiante_id']) {
                                        $id_kardex = $kardex['id_kardex'];
                                        $nombre_materia = $kardex['nombre_materia'];
                                        $fecha = $kardex['fecha'];
                                        $observacion = $kardex['observacion'];
                                        $nota = $kardex['nota'];
                                        $contador_reportes = $contador_reportes + 1; ?>
                                        <tr>
                                            <td><center><?=$contador_reportes;?></center></td>
                                            <td><center><?=$nombre_materia;?></center></td>
                                            <td><center><?=$fecha;?></center></td>
                                            <td><center><?=$observacion;?></center></td>
                                            <td><?=$nota;?></td>
                                         </tr>
                                     <?php
                                    }
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

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Estudiantes",
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