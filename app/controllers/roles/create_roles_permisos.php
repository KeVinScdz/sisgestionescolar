<?php

include ('../../../app/config.php');

$rol_id = $_GET['rol_id'];
$permiso_id = $_GET['permiso_id'];
$fechaHora = date("Y-m-d H:i:s"); // Asegúrate que esta variable exista
$estado = '1'; // Valor por defecto o dinámico

$sentencia = $pdo->prepare( 'INSERT INTO roles_permisos
(rol_id, permiso_id, fyh_creacion, estado)
VALUES (:rol_id, :permiso_id, :fyh_creacion, :estado)') ;

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':permiso_id', $permiso_id);
$sentencia->bindParam(':fyh_creacion', $fechaHora);
$sentencia->bindParam(':estado', $estado); // ESTO FALTABA

$sentencia->execute();

echo "Registro exitoso";

/*
if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se registro el permiso de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/roles/permisos.php");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}  */