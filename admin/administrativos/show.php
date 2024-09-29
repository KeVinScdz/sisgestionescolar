<?php

$id_administrativo = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/administrativos/datos_administrativos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Personal administrativo: <?=$nombres." ".$apellidos;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos registrados</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <div class="form-inline">
                                                <p>
                                                   <?=$nombre_rol;?> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <p>
                                            <?=$nombres;?>
                                            </p>
                                        </div>
                                    </div><div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                           <p>
                                            <?=$apellidos;?>
                                           </p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de indentidad</label>
                                            <p>
                                                <?=$ci;?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">fecha de nacimiento</label>
                                            <p>
                                                <?=$fecha_nacimiento;?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <p>
                                                <?=$celular;?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesion</label>
                                            <p>
                                                <?=$profesion;?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">correo</label>
                                            <p>
                                                <?=$email;?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <p>
                                                <?=$direccion;?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">fecha y hora de la creacion</label>
                                            <p>
                                                <?=$fyh_creacion;?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <p>
                                                <?php
                                                if($estado == "1") echo "ACTIVO";
                                                else echo "INACTIVO"
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?=APP_URL;?>/admin/administrativos" class="btn btn-secondary">Volver</a>
                                        </div>
                                    </div>
                                </div>
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
