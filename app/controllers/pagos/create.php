<?php
include ('../../../app/config.php');

$estudiante_id = $_POST['estudiante_id'];
$mes_pagado = $_POST['mes_pagado'];
$monto_pagado = $_POST['monto_pagado'];
$fecha_pagado = $_POST['fecha_pagado'];

$sentencia = $pdo->prepare('INSERT INTO pagos
        (estudiante_id,mes_pagado,monto_pagado,fecha_pagado, fyh_creacion, estado)
VALUES ( :estudiante_id,:mes_pagado,:monto_pagado,:fecha_pagado,:fyh_creacion,:estado)');

$sentencia->bindParam(':estudiante_id',$estudiante_id);
$sentencia->bindParam(':mes_pagado',$mes_pagado);
$sentencia->bindParam(':monto_pagado',$monto_pagado);
$sentencia->bindParam(':fecha_pagado',$fecha_pagado);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se registro el pago de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    ?><script>window.history.back();</script><?php
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}