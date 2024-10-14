<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/roles/listado_de_roles.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/grados/listado_de_grados.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creación de un nuevo estudiante</h1>
            </div>
            <br>
            <form action="<?=APP_URL;?>/app/controllers/inscripciones/create.php" method="post" onsubmit="return validar()">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Llene los datos del estudiante</b></h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="rol_id" id="rol_id" class="form-control">
                                                <?php
                                                    foreach ($roles as $role){ ?>
                                                    <option value="<?=$role['id_rol'];?>" <?=$role['nombre_rol']=="ESTUDIANTE" ? 'selected': ''?>><?=$role['nombre_rol'];?></option>
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" id="celular" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">correo</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="text" name="direccion" id="direccion" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><b>Llene los datos academicos</b></h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                                <select name="nivel_id" id="nivel_id" class="form-control">
                                                    <?php
                                                    foreach ($niveles as $nivele){ ?>
                                                        <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Grado</label>
                                            <select name="grado_id" id="grado_id" class="form-control">
                                                    <?php
                                                    foreach ($grados as $grado){ ?>
                                                        <option value="<?=$grado['id_grado'];?>"><?=$grado['curso']." | paraleo ".$grado['paralelo'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </div><div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Rude</label>
                                            <input type="text" name="rude" id="rude" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><b>Llene los datos del padre de familia</b></h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                    <div class="form-group">
                                            <label for="">Apellidos y nombres</label>
                                            <input type="text" name="nombres_apellidos_ppff" id="nombres_apellidos_ppff" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de identidad</label>
                                            <input type="text" name="ci_ppf" id="ci_ppf" class="form-control">
                                        </div>
                                    </div><div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular_ppff" id="celular_ppff" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupacion</label>
                                            <input type="text" name="ocupacion_ppff" id="ocupacion_ppff" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos y nombres de referencia</label>
                                            <input type="text" name="ref_nombre" id="ref_nombre" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Parentezco de la referencia</label>
                                            <input type="text" name="ref_parentezco"  id="ref_parentezco" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Celular de la refernecia</label>
                                            <input type="number" name="ref_celular"  id="ref_celular" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                        <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary btn-lg">Cancelar</a>
                    </div>
                </div>
            </div>
            
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function validar() {
        alert ("ingresa");
        let nombres = document.getElementById("nombres").value;
        let apellidos = document.getElementById("apellidos").value;
        let ci = document.getElementById("ci").value;
        let fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
        let celular = document.getElementById("celular").value;
        let email = document.getElementById("email").value;
        let direccion = document.getElementById("direccion").value;
        let rude = document.getElementById("rude").value;
        let nombres_apellidos_ppff = document.getElementById("nombres_apellidos_ppff").value;
        let ci_ppf = document.getElementById("ci_ppf").value;
        let celular_ppff = document.getElementById("celular_ppff").value;
        let ocupacion_ppff = document.getElementById("ocupacion_ppff").value;
        let ref_nombre = document.getElementById("ref_nombre").value;
        let ref_parentezco = document.getElementById("ref_parentezco").value;
        let ref_celular = document.getElementById("ref_celular").value;

        if (nombres === "" || apellidos === "" || ci === "" || fecha_nacimiento === "" || celular === "" || email === "" || direccion === "" || rude === "" || nombres_apellidos_ppff === "" || ci_ppf === "" || celular_ppff === "" || ocupacion_ppff === "" || ref_nombre === "" || ref_parentezco === "" || ref_celular === "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Verifica que todos los campos esten ingresados correctamente.'
            });
            return false;
        } 
    }

</script>

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>