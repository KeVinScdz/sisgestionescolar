<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/roles/listado_de_roles.php');
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creación de un nuevo usuario</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/usuarios/create.php" method="post" onsubmit="return validar()">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <div class="form-inline">
                                                <select name="rol_id" id="rol_id" class="form-control">
                                                    <?php
                                                    foreach ($roles as $role){ ?>
                                                        <option value="<?=$role['id_rol'];?>"><?=$role['nombre_rol'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary"><i class="bi bi-file-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password_repet">Repetir Password</label>
                                            <input type="password" name="password_repet" id="password_repet" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                            <a href="<?=APP_URL;?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
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
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let password_repet = document.getElementById("password_repet").value;
    let rol_id = document.getElementById("rol_id").value;

    if (rol_id === "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El rol es obligatorio'
        });
        return false;
    }

    if (email === null || email === "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El email es obligatorio'
        });
        return false;
    }

    if (password === null || password === "" || password_repet === null || password_repet === "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'La contraseña es obligatoria'
        });
        return false;
    }

    if (password !== password_repet) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Las contraseñas no coinciden'
        });
        return false;
    }
    Swal.fire({
        icon: 'success',
        title: 'Datos Correctos',
        text: 'Tus datos han sido validados exitosamente'
    });
    return true;
}
</script>

<?php
include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>
