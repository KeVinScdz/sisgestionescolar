<?php
include ('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_docente = $_POST['id_docente']; 

$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion'];
$especialidad = $_POST['especialidad'];
$antiguedad = $_POST['antiguedad'];


$pdo->beginTransaction();
///////////////////////////////// ACTUALIZAR A LA TABLA USUARIOS
$password = password_hash($ci, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('UPDATE usuarios
      SET   rol_id=:rol_id,
            email=:email,
            password=:password,
            fyh_actualizacion=:fyh_actualizacion
        WHERE id_usuario=:id_usuario');

$sentencia->bindParam(':rol_id',$rol_id);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password',$password);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->execute();

/////////////////////////////////////ACTUALIZAR A LA TABLA PERSONAS

$sentencia = $pdo->prepare('UPDATE personas
SET nombres=:nombres,
    apellidos=:apellidos,
    ci=:ci,
    fecha_nacimiento=:fecha_nacimiento,
    celular=:celular,
    profesion=:profesion,
    direccion=:direccion,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_persona=:id_persona ');

$sentencia->bindParam(':id_persona',$id_persona);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->execute();


///////////////////////////////////ACTUALIZAR A LA TABLA DOCENTES
$sentencia = $pdo->prepare('UPDATE docentes
      SET   especialidad=:especialidad,
            antiguedad=:antiguedad,
            fyh_actualizacion=:fyh_actualizacion
    WHERE id_docente=:id_docente ');

$sentencia->bindParam(':id_docente',$id_docente);
$sentencia->bindParam(':especialidad',$especialidad);
$sentencia->bindParam(':antiguedad',$antiguedad);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);

if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
            $_SESSION['mensaje'] = "Se actualizo los datos del personal docente de la manera correcta en la base de datos";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/docentes");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
            $_SESSION['icono'] = "error";
            ?><script>window.history.back();</script><?php
}
