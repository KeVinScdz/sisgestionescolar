<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/roles/listado_de_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creación de un nuevo Administrativos</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/administrativos/create.php" method="post" onsubmit="return validar()">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="rol_id" id="rol_id" class="form-control">
                                                    <?php
                                                    foreach ($roles as $role){ ?>
                                                        <option value="<?=$role['id_rol'];?>"><?=$role['nombre_rol'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" id="nombres" class="form-control">
                                        </div>
                                    </div><div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" name="apellidos" id="apellidos" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de indentidad</label>
                                            <input type="number" name="ci" id="ci" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" id="celular" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesion</label>
                                            <input type="text" name="profesion" id="profesion" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">correo</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="address" name="direccion" id="direccion" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                            <a href="<?=APP_URL;?>/admin/administrativos" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

<script>
    function validar() {
        let nombres = document.getElementById("nombres").value;
        let apellidos = document.getElementById("apellidos").value;
        let celular = document.getElementById("celular").value;
        let email = document.getElementById("email").value;
        let direccion = document.getElementById("direccion").value;
        let profesion = document.getElementById("profesion").value;
        let fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
        let ci = document.getElementById("ci").value;

        if (nombres === ""){
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Los nombres son obligatorios'
        });
        return false;
        }
        if (apellidos === ""){
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Los apellidos son obligaorios'
        });
        return false;
        }
        if (ci === ""){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El CI es obligatorio'
            });
            return false;
        }
        if (fecha_nacimiento === ""){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La fecha de nacimiento es obligatoria'
            });
            return false;
        }
        if (celular === ""){
            Swal.fire({
            icon:  'error',
            title: 'Error',
            text: 'El celular es obligatorio'
        });
        return false;
        }
        if (profesion === ""){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La profesion es obligatoria'
            });
            return false;
        }
        if (email === ""){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El email es obligatorio'
            });
            return false;
        }
        if (direccion === ""){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La direccion es obligatoria'
            });
            return false;
        }
    }
</script>

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>
