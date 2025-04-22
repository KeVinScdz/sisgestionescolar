<?php

include ('../../../app/config.php');

$id_administrativo = $_POST['id_administrativo'];


$sentencia = $pdo->prepare("DELETE FROM administrativos where id_administrativo=:id_administrativo ");

$sentencia->bindParam('id_administrativo',$id_administrativo);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se elimino al personal administrativo de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/administrativos");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/administrativos");
    }
}catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este registro ya esta en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/administrativos");
}