<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/docentes/listado_asignaciones.php');
include ('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include ('../../app/controllers/kardex/listado_de_kardexs.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Grados asignados para reportes de kardex</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Asignaciones registrados</h3>
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nivel</center></th>
                                    <th><center>Turno</center></th>
                                    <th><center>Grado</center></th>
                                    <th><center>Paralelo</center></th>
                                    <th><center>Materia</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($asignaciones as $asignacione){
                                        $id_grado = $asignacione['id_grado'];
                                        if($email_sesion == $asignacione['email']){
                                            $id_asignacion = $asignacione['id_asignacion'];
                                            $docente_id = $asignacione['docente_id'];
                                            $contador = $contador + 1; ?>
                                        <tr>
                                            <td><center><?=$contador;?></center></td>
                                            <td><center><?=$asignacione['nivel'];?></center></td>
                                            <td><center><?=$asignacione['turno'];?></center></td>
                                            <td><center><?=$asignacione['curso'];?></center></td>
                                            <td><center><?=$asignacione['paralelo'];?></center></td>
                                            <td><center><?=$asignacione['nombre_materia'];?></center></td>
                                            <td>
                                                <center>
                                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?=$id_asignacion;?>">
                                                    <i class="bi bi-check2-square">
                                                   </i>Reportar
                                                </a>
                                                </center>
                                                <div class="modal fade" id="exampleModal<?=$id_asignacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                   <div class="modal-header" style="background-color: red !important;">
                                                       <h5 class="modal-title" id="exampleModalLabel"style="color: white !important;">
                                                         Reporte del curso - <?=$asignacione['curso'];?>
                                                       </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?=APP_URL;?>/app/controllers/kardex/create.php" method="post">
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Fecha</label>
                                                                <input type="text" name="docente_id"value="<?=$docente_id;?>" hidden>
                                                                <input type="date" name="fecha" class="form-control">
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Estudiante</label>
                                                                <select name="estudiante_id" id="" class="form-control">
                                                                    <?php
                                                                    foreach ($estudiantes as $estudiante){
                                                                        if ($estudiante['id_grado']==$asignacione['grado_id']) {
                                                                            $id_estudiante = $estudiante['id_estudiante']; ?>
                                                                            <option value="<?=$id_estudiante;?>"><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></option>
                                                                            <?php
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Materia</label>
                                                                <input type="text" class="form-control" value="<?=$asignacione['nombre_materia'];?>" disabled>
                                                                <input type="text" class="form-control" name="materia_id" value="<?=$asignacione['id_materia'];?>" hidden>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Observación</label>
                                                                <select name="observacion" id="" class="form-control">
                                                                    <option value="DISCIPLINA">DISCIPLINA</option>
                                                                    <option value="ASISTENCIA">ASISTENCIA</option>
                                                                    <option value="RENDIMIENTO ACADÉMICO">RENDIMIENTO ACADÉMICO</option>
                                                                </select>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Nota</label>
                                                                <textarea name="nota" id="" cols="30" class="form-control" 
                                                                rows="3"></textarea>
                                                            </div>
                                                          </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                      <button type="submit" class="btn btn-danger">Registrar</button>
                                                    </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
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
                                    <th><center>Nivel</center></th>
                                    <th><center>Grado</center></th>
                                    <th><center>Paralelo</center></th>
                                    <th><center>Materia</center></th>
                                    <th><center>Estudiante</center></th>
                                    <th><center>Fecha de reporte</center></th>
                                    <th><center>Observación</center></th>
                                    <th><center>Nota</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_reportes = 0;
                                foreach ($kardexs as $kardex) {
                                    if($email_sesion == $kardex['email']) {
                                        $id_kardex = $kardex['id_kardex'];
                                        $estudiante_id = $kardex['estudiante_id'];
                                        $grado_id = $kardex['grado_id'];
                                        $contador_reportes = $contador_reportes + 1; ?>
                                        <tr>
                                            <td><center><?=$contador_reportes;?></center></td>
                                            <?php
                                            foreach ($estudiantes as $estudiante) {
                                                if($estudiante['id_estudiante']==$estudiante_id) {  ?>
                                                    <td><center><?=$estudiante['nivel'];?><br><?=$estudiante['turno'];?></center></td>
                                                    <td><center><?=$estudiante['curso'];?></center></td>
                                                    <td><center><?=$estudiante['paralelo'];?></center></td>
                                                    <td><center><?=$kardex['nombre_materia'];?></center></td>
                                                    <td><center><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></center></td>
                                                    <td><center><?=$kardex['fecha'];?></center></td>
                                                    <td><center><?=$kardex['observacion'];?></center></td>
                                                    <td><center><?=$kardex['nota'];?></center></td>
                                                <?php
                                                }
                                            }
                                            ?>
                                            
                                            
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editar<?=$id_kardex;?>">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <div class="modal fade" id="modal_editar<?=$id_kardex;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                   <div class="modal-header" style="background-color: green !important;">
                                                       <h5 class="modal-title" id="exampleModalLabel"style="color: white !important;">
                                                         Editar reporte
                                                       </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?=APP_URL;?>/app/controllers/kardex/update.php" method="post">
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Fecha</label>
                                                                <input type="text" value="<?=$id_kardex?>" name="id_kardex" hidden>
                                                                <input type="text" name="docente_id"value="<?=$docente_id;?>" hidden>
                                                                <input type="date" value="<?=$kardex['fecha'];?>"name="fecha" class="form-control">
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Estudiante</label> 
                                                                <select name="estudiante_id" id="" class="form-control">
                                                                    <?php
                                                                    foreach ($estudiantes as $estudiante){
                                                                        if ($estudiante['id_grado']==$grado_id) {
                                                                            $id_estudiante = $estudiante['id_estudiante']; ?>
                                                                            <option value="<?=$id_estudiante;?>" <?=$id_estudiante==$estudiante_id ? 'selected' : ''?>><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></option>
                                                                            <?php
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Materia</label>
                                                                <input type="text" class="form-control" value="<?=$kardex['nombre_materia'];?>" disabled>
                                                                <input type="text" class="form-control" name="materia_id" value="<?=$kardex['id_materia'];?>" hidden>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Observación</label>
                                                                <select name="observacion" id="" class="form-control">
                                                                    <option value="DISCIPLINA" <?=$kardex['observacion']=="DISCIPLINA" ? 'selected' : ''?>>DISCIPLINA</option>
                                                                    <option value="ASISTENCIA" <?=$kardex['observacion']=="ASISTENCIA" ? 'selected' : ''?>>ASISTENCIA</option>
                                                                    <option value="RENDIMIENTO ACADÉMICO" <?=$kardex['observacion']=="RENDIMIENTO ACADÉMICO" ? 'selected' : ''?>>RENDIMIENTO ACADÉMICO</option>
                                                                </select>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Nota</label>
                                                                <textarea name="nota" id="" cols="30" class="form-control" 
                                                                rows="3"><?=$kardex['nota'];?></textarea>
                                                            </div>
                                                          </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                      <button type="submit" class="btn btn-success">Actualizar</button>
                                                    </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                              <form action="<?=APP_URL;?>/app/controllers/kardex/delete.php" onclick="preguntar<?=$id_kardex;?>(event)"
                                                      method="post" id="miFormulario<?=$id_kardex;?>">
                                                    <input type="text" name="id_kardex" value="<?=$id_kardex;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<?=$id_kardex;?>(event) {
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
                                                                var form = $('#miFormulario<?=$id_kardex;?>');
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Reportes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Reportes",
                "infoFiltered": "(Filtrado de _MAX_ total Reportes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Reportes",
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