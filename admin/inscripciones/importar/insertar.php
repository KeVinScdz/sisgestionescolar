<?php
include ('../../../app/config.php');

$rol_id = $_POST['d1'];
$nombres = $_POST['d2'];
$apellidos = $_POST['d3'];
$ci = $_POST['d4'];
$fecha_nacimiento = $_POST['d5'];
$celular = $_POST['d6'];
$email = $_POST['d7'];
$direccion = $_POST['d8'];
$nivel_id = $_POST['d9'];
$grado_id = $_POST['d10'];
$rude = $_POST['d11'];
$nombres_apellidos_ppff = $_POST['d12'];
$ci_ppf = $_POST['d13'];
$celular_ppff = $_POST['d14'];
$ocupacion_ppff = $_POST['d15'];
$ref_nombre = $_POST['d16'];
$ref_parentezco = $_POST['d17'];
$ref_celular = $_POST['d18'];
$profesion = "ESTUDIANTE";


$pdo->beginTransaction();
///////////////////////////////// INSERTAR A LA TABLA USUARIOS
$password = password_hash($ci, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('INSERT INTO usuarios
        (rol_id, email, password, fyh_creacion, estado)
VALUES ( :rol_id,:email,:password,:fyh_creacion,:estado)');

$sentencia->bindParam(':rol_id',$rol_id);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password',$password);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);
$sentencia->execute();

$id_usuario = $pdo->lastInsertId();

/////////////////////////////////////INSERTAR A LA TABLA PERSONAS

$sentencia = $pdo->prepare('INSERT INTO personas
(usuario_id,nombres,apellidos,ci,fecha_nacimiento,celular,profesion,direccion, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellidos,:ci,:fecha_nacimiento,:celular,:profesion,:direccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id',$id_usuario);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);
$sentencia->execute();

$id_persona = $pdo->lastInsertId();

///////////////////////////////////INSERTAR A LA TABLA ESTUDIANTES
$sentencia = $pdo->prepare('INSERT INTO estudiantes
        (persona_id, nivel_id, grado_id, rude, fyh_creacion, estado)
VALUES ( :persona_id,:nivel_id,:grado_id,:rude,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id',$id_persona);
$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam(':rude',$rude);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);
$sentencia->execute();

$id_estudiante = $pdo->lastInsertId();

///////////////////////////////////INSERTAR A LA PPFFS
$sentencia = $pdo->prepare('INSERT INTO ppffs
        (estudiante_id, nombres_apellidos_ppff, ci_ppf, celular_ppff,ocupacion_ppff,ref_nombre,ref_parentezco,ref_celular, fyh_creacion, estado)
VALUES ( :estudiante_id,:nombres_apellidos_ppff,:ci_ppf,:celular_ppff,:ocupacion_ppff,:ref_nombre,:ref_parentezco,:ref_celular,:fyh_creacion,:estado)');

$sentencia->bindParam(':estudiante_id',$id_estudiante);
$sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
$sentencia->bindParam(':ci_ppf',$ci_ppf);
$sentencia->bindParam(':celular_ppff',$celular_ppff);
$sentencia->bindParam(':ocupacion_ppff',$ocupacion_ppff);
$sentencia->bindParam(':ref_nombre',$ref_nombre);
$sentencia->bindParam(':ref_parentezco',$ref_parentezco);
$sentencia->bindParam(':ref_celular',$ref_celular);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);


if($sentencia->execute()){
    //echo 'success';
    $pdo->commit();
    
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
}