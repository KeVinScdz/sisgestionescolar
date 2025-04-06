<?php
include ('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];
$id_nivel = $_POST['id_nivel'];
$id_grado = $_POST['id_grado'];
$id_materia = $_POST['id_materia'];


$sentencia = $pdo->prepare('UPDATE asignaciones
 SET nivel_id=:nivel_id,
     grado_id=:grado_id, 
     materia_id=:materia_id,
     fyh_actualizacion=:fyh_actualizacion
WHERE id_asignacion = :id_asignacion');

$sentencia->bindParam(':nivel_id',$id_nivel);
$sentencia->bindParam(':grado_id',$id_grado);
$sentencia->bindParam(':materia_id',$id_materia);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_asignacion',$id_asignacion); 

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se actualizo la asignacion de la materia de manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/docentes/asignacion.php");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
} 