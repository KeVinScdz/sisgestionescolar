<?php

include ('../../../app/config.php');

$id_docente = $_POST['id_docente'];


$sentencia = $pdo->prepare("DELETE FROM docentes where id_docente=:id_docente ");

$sentencia->bindParam('id_docente',$id_docente);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se elimino al docente de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/docentes");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/docentes");
    }
}catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este registro ya esta en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/docentes");
}