<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/docentes/listado_asignaciones.php');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Grados asignados</h1>
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
                                            $contador = $contador + 1; ?>
                                        <tr>
                                            <td><center><?=$contador;?></center></td>
                                            <td><center><?=$asignacione['nivel'];?></center></td>
                                            <td><center><?=$asignacione['turno'];?></center></td>
                                            <td><center><?=$asignacione['curso'];?></center></td>
                                            <td><center><?=$asignacione['paralelo'];?></center></td>
                                            <td><center><?=$asignacione['nombre_materia'];?></center></td>
                                            <td style="text-align: center"><a href="create.php?id_grado=<?=$id_grado?>" class="btn btn-primary btn-sm"><i class="bi bi-check2-square"></i>Notas</a></td>
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
