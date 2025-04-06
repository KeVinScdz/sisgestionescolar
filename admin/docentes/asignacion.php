<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/docentes/listado_de_docentes.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/grados/listado_de_grados.php');
include ('../../app/controllers/materias/listado_de_materias.php');
include ('../../app/controllers/docentes/listado_asignaciones.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado del personal de docentes asignado a las materias</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Docentes asignados</h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_asignacion">
                            <i class="bi bi-plus-square"></i> Asignar materias
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombres del docente</center></th>
                                    <th><center>Ci</center></th>
                                    <th><center>Fecha de nacimineto</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Estado</center></th>
                                    <th><center>Materias asignadas</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_docentes = 0;
                                foreach ($docentes as $docente){
                                    $id_docente = $docente['id_docente'];
                                    $contador_docentes = $contador_docentes +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_docentes;?></td>
                                        <td><?=$docente['nombres']." - ".$docente['apellidos'];?></td>
                                        <td><?=$docente['ci'];?></td>
                                        <td style="text-align;: center"><?=$docente['fecha_nacimiento'];?></td>
                                        <td><?=$docente['email'];?></td>
                                        <td>
                                            <?php
                                            if($docente['estado'] == "1") echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?>
                                        </td>
                                        <td>
                                        <center>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_materias<?=$id_docente;?>">
                                            <i class="bi bi-postcard"></i> Ver materias
                                         </button>
                                        </center>
                                        <div class="modal fade" id="modal_materias<?=$id_docente;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header" style="background-color:rgb(12, 44, 255)">
                                                    <h5 class="modal-title" id="exampleModalLabel"><b>Materias asignadas</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <b>Docente: <?=$docente['apellidos']. " ".$docente['nombres'];?></b>
                                                    <hr>
                                                    <table class="table table-bordered table-striped table-sm table-hover">
                                                        <tr>
                                                            <th><center>Nro</center></th>
                                                            <th><center>Nivel</center></th>
                                                            <th><center>Turno</center></th>
                                                            <th><center>Grado</center></th>
                                                            <th><center>Paralelo</center></th>
                                                            <th><center>Materia</center></th>
                                                            <th><center>Acciones</center></th>
                                                        </tr>
                                                            <?php
                                                            $contador = 0;
                                                            foreach ($asignaciones as $asignacione){
                                                                $id_asignacion = $asignacione['id_asignacion'];
                                                                if($asignacione['docente_id']==$id_docente){  $contador = $contador +1;?>
                                                                        <tr>
                                                                            <td><center><?=$contador;?></center></td>
                                                                            <td><center><?=$asignacione['nivel'];?></center></td>
                                                                            <td><center><?=$asignacione['turno'];?></center></td>
                                                                            <td><center><?=$asignacione['curso'];?></center></td>
                                                                            <td><center><?=$asignacione['paralelo'];?></center></td>
                                                                            <td><center><?=$asignacione['nombre_materia'];?></center></td>
                                                                            <td>
                                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                                    <a data-toggle="modal" data-target="#modal_edicion<?=$id_asignacion;?>" type="button" 
                                                                                    class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>

                                                                                    <div class="modal fade" id="modal_edicion<?=$id_asignacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                            <div class="modal-header" style="background-color:rgb(6, 122, 41)">
                                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Asignacion de materias</b></h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <form action="<?=APP_URL;?>/app/controllers/docentes/update_asignaciones.php" method="post">
                                                                                                        <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="form-group">
                                                                                                                <input type="text" name="id_asignacion" value="<?=$id_asignacion;?>" hidden>
                                                                                                                <label for="">Nivel</label>
                                                                                                                <select name="id_nivel" id="" class="form-control">
                                                                                                                    <?php
                                                                                                                    foreach ($niveles as $nivele) {
                                                                                                                        $id_nivel = $nivele['id_nivel']; ?>
                                                                                                                        <option value="<?=$id_nivel;?>" <?=$nivele['id_nivel']==$asignacione['nivel_id'] ? 'selected': ''?>><?=$nivele['nivel']." - ".$nivele['turno'];?></option>

                                                                                                                    <?php   
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="">Grados</label>
                                                                                                                <select name="id_grado" id="" class="form-control">
                                                                                                                    <?php
                                                                                                                    foreach ($grados as $grado) {
                                                                                                                        $id_grado = $grado['id_grado']; ?>
                                                                                                                        <option value="<?=$id_grado;?>" <?=$grado['id_grado']==$asignacione['grado_id'] ? 'selected': ''?>><?=$grado['curso']." | paralelo ".$grado['paralelo'];?></option>

                                                                                                                    <?php   
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="">Materias</label>
                                                                                                                <select name="id_materia" id="" class="form-control">
                                                                                                                    <?php
                                                                                                                    foreach ($materias as $materia) {
                                                                                                                        $id_materia = $materia['id_materia']; ?>
                                                                                                                        <option value="<?=$id_materia;?>" <?=$materia['id_materia']==$asignacione['materia_id'] ? 'selected': ''?>><?=$materia['nombre_materia'];?></option>

                                                                                                                    <?php   
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                     </div>
                                                                                                </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                                                                                        </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                        </div>
                                                                                            <form action="<?=APP_URL;?>/app/controllers/docentes/delete_asignacion.php" onclick="preguntar<?=$id_asignacion;?>(event)" method="post" id="miFormulario<?=$id_asignacion;?>">
                                                                                                    <input type="text" name="id_asignacion" value="<?=$id_asignacion;?>" hidden>
                                                                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                                                                </form>
                                                                                                <script>
                                                                                                    function preguntar<?=$id_asignacion;?>(event) {
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
                                                                                                                var form = $('#miFormulario<?=$id_asignacion;?>');
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
                                                            }
                                                            ?>
                                                    </table>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Docentes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Docentes",
                "infoFiltered": "(Filtrado de _MAX_ total Docentes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Docentes",
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

<!-- Modal -->
<div class="modal fade" id="modal_asignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0c84ff">
        <h5 class="modal-title" id="exampleModalLabel"><b>Asignacion de materias</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=APP_URL;?>/app/controllers/docentes/create_asignaciones.php" method="post">
            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Docentes</label>
                    <select name="id_docente" id="" class="form-control">
                        <?php
                        foreach ($docentes as $docente) {
                            $id_docente = $docente['id_docente']; ?>
                            <option value="<?=$id_docente;?>"><?=$docente['apellidos']." ".$docente['nombres'];?></option>

                        <?php   
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Nivel</label>
                    <select name="id_nivel" id="" class="form-control">
                        <?php
                        foreach ($niveles as $nivele) {
                            $id_nivel = $nivele['id_nivel']; ?>
                            <option value="<?=$id_nivel;?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>

                        <?php   
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Grados</label>
                    <select name="id_grado" id="" class="form-control">
                        <?php
                        foreach ($grados as $grado) {
                            $id_grado = $grado['id_grado']; ?>
                            <option value="<?=$id_grado;?>"><?=$grado['curso']." | paralelo ".$grado['paralelo'];?></option>

                        <?php   
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Materias</label>
                    <select name="id_materia" id="" class="form-control">
                        <?php
                        foreach ($materias as $materia) {
                            $id_materia = $materia['id_materia']; ?>
                            <option value="<?=$id_materia;?>"><?=$materia['nombre_materia'];?></option>

                        <?php   
                        }
                        ?>
                    </select>
                </div>
            </div>
            </div>
         </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                 <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
        </form>
    </div>
  </div>
</div>