<?php
$id_grado_get = $_GET['id_grado'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/estudiantes/listado_de_estudiantes.php');

$curso = "";
$paralelo = "";

foreach ($estudiantes as $estudiante){

    if ($id_grado_get ==$estudiante['id_grado'] ){
        $curso = $estudiante['curso'];
        $paralelo = $estudiante['paralelo'];
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de estudiantes del grado: <?=$curso;?> Paralelo <?=$paralelo;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Estudiantes registrados</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Apellidos y nombres</center></th>
                                    <th><center>Nivel</center></th>
                                    <th><center>Turno</center></th>
                                    <th><center>Grado</center></th>
                                    <th><center>Paralelo</center></th>
                                    <th><center>1er trimestre</center></th>
                                    <th><center>2do trimestre</center></th>
                                    <th><center>3er trimestre</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_estudiantes = 0;
                                foreach ($estudiantes as $estudiante){

                                    if ($id_grado_get ==$estudiante['grado_id'] ){ 
                                    $id_estudiante = $estudiante['id_estudiante'];
                                    $contador_estudiantes = $contador_estudiantes +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_estudiantes;?></td>
                                        <td><?=$estudiante['apellidos']." - ".$estudiante['nombres'];?></td>
                                        <td style="text-align: center"><?=$estudiante['nivel'];?></td>
                                        <td style="text-align: center"><?=$estudiante['turno'];?></td>
                                        <td style="text-align: center"><?=$estudiante['curso'];?></td>
                                        <td style="text-align: center"><?=$estudiante['paralelo'];?></td>
                                        <td>
                                           <input style="text-align: center" type="number" class="form-control" >
                                        </td>
                                        <td>
                                           <input style="text-align: center" type="number" class="form-control" >
                                        </td>
                                        <td>
                                           <input style="text-align: center" type="number" class="form-control" >
                                        </td>
                                        
                                    </tr>
                                    <?php
                                    }
                                    
                                }
                                ?>
                                </tbody>
                            </table>
                            <hr>
                            <button class="btn btn-primary btn-lg" id="btn_guardar">Guardar notas</button>
                            <script>
                                  $('#btn_guardar').click(function () {
                                    alert("listo");
                                });  
                            </script>
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