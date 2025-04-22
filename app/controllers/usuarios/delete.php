<?php

include ('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];


$sentencia = $pdo->prepare("DELETE FROM usuarios where id_usuario=:id_usuario ");

$sentencia->bindParam('id_usuario',$id_usuario);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se elimino el usuarios de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/usuarios");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/usuarios");
    }
}catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este usuario ya esta en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/usuarios");
}






