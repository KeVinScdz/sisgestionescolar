<?php

include ('../../../app/config.php');

$id_kardex = $_POST['id_kardex'];


$sentencia = $pdo->prepare("DELETE FROM kardexs where id_kardex=:id_kardex ");

$sentencia->bindParam('id_kardex',$id_kardex);


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino el reporte de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/kardex");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/kardex");
}