<?php
include ('../app/config.php');
include ('../admin/layout/parte1.php');
include ('../app/controllers/roles/listado_de_roles.php');
include ('../app/controllers/usuarios/listado_de_usuarios.php');
include ('../app/controllers/niveles/listado_de_niveles.php');
include ('../app/controllers/grados/listado_de_grados.php');
include ('../app/controllers/materias/listado_de_materias.php');
include ('../app/controllers/administrativos/listado_de_administrativos.php');
include ('../app/controllers/docentes/listado_de_docentes.php');
include ('../app/controllers/estudiantes/listado_de_estudiantes.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="container">
        <div class="container">
            <div class="row">
                <h1><?=APP_NAME;?></h1>
            </div>
            <br>
            <!--Vista para el estudiante-->
            <?php
            if (trim($rol_sesion_usuario) == "ESTUDIANTE") {
                foreach ($estudiantes as $estudiante) {
                    if($email_sesion == $estudiante['email']){
                          $id_estudiante = $estudiante['id_estudiante'];  
                          $nivel = $estudiante['nivel'];  
                          $turno = $estudiante['turno'];  
                          $curso = $estudiante['curso'];  
                          $paralelo = $estudiante['paralelo'];  
                    } 
                } 
                ?>
                 <div class="row">
                    <div class="col-md-6">
                      <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del docente</h3>
                        </div>
                        <div class="card-body">
                        <table class="table table-sm table-hover table-striped table-bordered">
                              <tr>
                                <td><b>Nombres y Apellidos:</b></td>
                                <td><?=$nombres_sesion_usuario." ".$apellidos_sesion_usuario;?></td>
                              </tr>
                              <tr>
                                <td><b>Carnet de identidad:</b></td>
                                <td><?=$ci_sesion_usuario;?></td>
                              </tr>
                              <tr>
                                <td><b>Nivel:</b></td>
                                <td><?=$nivel;?></td>
                              </tr>
                              <tr>
                                <td><b>Turno:</b></td>
                                <td><?=$turno;?></td>
                              </tr>
                              <tr>
                                <td><b>Grado:</b></td>
                                <td><?=$curso;?></td>
                              </tr>
                              <tr>
                                <td><b>Paralelo:</b></td>
                                <td><?=$paralelo;?></td>
                              </tr>
                            </table>
                        </div>
                      </div>     
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="bi bi-hospital"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Reportes de kardex</b></span>
                            <a href="<?=APP_URL;?>/admin/kardex/reporte_estudiante.php?id_estudiante=<?=$id_estudiante?>" class="btn btn-primary btn-sm">Ingresar</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="bi bi-calendar-range"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Calificaiones</b></span>
                            <a href="<?=APP_URL;?>/admin/calificaciones/reporte_estudiante.php?id_estudiante=<?=$id_estudiante?>" class="btn btn-info btn-sm">Ingresar</a>
                        </div>
                    </div>
                </div>
                 </div>
            
            <?php
            } else if if (trim($rol_sesion_usuario) == "DOCENTE") {
                foreach ($docentes as $docente) {
                    if($email_sesion == $docente['email']){
                        $nombre_rol = $docente['nombre_rol'];
                        $profesion = $docente['profesion'];
                        $especialidad = $docente['especialidad'];

                    } 
                } 
                ?>
                 <div class="row">
                    <div class="col-md-6">
                      <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del docente</h3>
                        </div>
                        <div class="card-body">
                        <table class="table table-sm table-hover table-striped table-bordered">
                              <tr>
                                <td><b>Nombres y Apellidos:</b></td>
                                <td><?=$nombres_sesion_usuario." ".$apellidos_sesion_usuario;?></td>
                              </tr>
                              <tr>
                                <td><b>Profesión:</b></td>
                                <td><?=$profesion;?></td>
                              </tr>
                              <tr>
                                <td><b>Rol:</b></td>
                                <td><?=$nombre_rol;?></td>
                              </tr>
                              <tr>
                                <td><b>Especialidad:</b></td>
                                <td><?=$especialidad;?></td>
                              </tr>
                            </table>
                        </div>
                      </div>     
                    </div>
                 </div>
            <?php
            } else {
                $sql_datos = "SELECT * FROM usuarios as usu 
                    INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
                    INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
                    where est.estado = '1' and usu.gmail = '$email_sesion' ";
                $query_datos = $pdo->prepare($sql_datos);
                $query_datos->execute();
                $datos = $query_datos->fetchAll(PDO::FETCH_ASSOC);
                foreach ($datos as $dato) {
                    echo $nombre = $dato['nombres'];
                }
            }
            ?>
            <!--Vista para el estudiante-->




            <!--Vista para el docentes-->
            <?php
            
            ?>
            <!--Vista para el docentes-->






             <!--Vista para el administrador-->
            <?php
            if (trim($rol_sesion_usuario) == "ADMINISTRADOR") { ?>
                <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_roles = 0;
                            foreach ($roles as $role){
                                $contador_roles = $contador_roles + 1;
                            }
                            ?>
                            <h3><?=$contador_roles;?></h3>
                            <p>Roles registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-bookmarks"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador_usuarios = 0;
                            foreach ($usuarios as $usuario){
                                $contador_usuarios = $contador_usuarios + 1;
                            }
                            ?>
                            <h3><?=$contador_usuarios;?></h3>
                            <p>usuarios registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-people-fill"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador_niveles = 0;
                            foreach ($niveles as $nivele){
                                $contador_niveles = $contador_niveles + 1;
                            }
                            ?>
                            <h3><?=$contador_niveles;?></h3>
                            <p>Niveles registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-bookshelf"></i></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/niveles" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador_grados = 0;
                            foreach ($grados as $grado){
                                $contador_grados = $contador_grados + 1;
                            }
                            ?>
                            <h3><?=$contador_grados;?></h3>
                            <p>Grados registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-bar-chart-steps"></i></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/grados" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php
                            $contador_materias = 0;
                            foreach ($materias as $materia){
                                $contador_materias = $contador_materias + 1;
                            }
                            ?>
                            <h3><?=$contador_materias;?></h3>
                            <p>Materias registradas</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-book-half"></i></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/materias" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-default">
                        <div class="inner">
                            <?php
                            $contador_administrativos = 0;
                            foreach ($administrativos as $administrativo){
                                $contador_administrativos = $contador_administrativos + 1;
                            }
                            ?>
                            <h3><?=$contador_administrativos;?></h3>
                            <p>administrativos registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-book-half"></i></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/administrativos" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <?php
                            $contador_docentes = 0;
                            foreach ($docentes as $docente){
                                $contador_docentes = $contador_docentes + 1;
                            }
                            ?>
                            <h3><?=$contador_docentes;?></h3>
                            <p>Docentes registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas" style="color:white"><i class="bi bi-person-video3"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/docentes" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_estudiantes = 0;
                            foreach ($estudiantes as $estudiante){
                                $contador_estudiantes = $contador_estudiantes + 1;
                            }
                            ?>
                            <h3><?=$contador_estudiantes;?></h3>
                            <p>Estudiantes registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas" style="color:white"><i class="bi bi-person-video"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/estudiantes" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                </div>
                 <?php
            }
            ?>

            
            <!--Vista para el administrador-->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include ('../admin/layout/parte2.php');
include ('../layout/mensajes.php');

?>
