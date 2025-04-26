<?php
include ('../../../app/config.php');

// Detectar si es una petición API (usamos JSON en el cuerpo)
$is_json_request = strpos($_SERVER["CONTENT_TYPE"] ?? '', 'application/json') !== false;
$is_api_call = $is_json_request || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

// Leer datos
if ($is_json_request) {
    $input = json_decode(file_get_contents("php://input"), true);
    $nombre_materia = $input['nombre_materia'] ?? null;
} else {
    $nombre_materia = $_POST['nombre_materia'] ?? null;
}

// Validar
if (!$nombre_materia) {
    if ($is_api_call) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'El nombre de la materia es requerido']);
        exit;
    } else {
        // Manejo clásico
        echo 'error: nombre de la materia requerido';
        exit;
    }
}

$sentencia = $pdo->prepare('INSERT INTO materias (nombre_materia, fyh_creacion, estado)
VALUES (:nombre_materia, :fyh_creacion, :estado)');

$sentencia->bindParam(':nombre_materia', $nombre_materia);
$sentencia->bindParam(':fyh_creacion', $fechaHora);
$sentencia->bindParam(':estado', $estado_de_registro);

if($sentencia->execute()) {
    if ($is_api_call) {
        echo json_encode(['status' => 'success', 'message' => 'Materia registrada correctamente']);
    } else {
        echo 'success';
        session_start();
        $_SESSION['mensaje'] = "Se registró la materia correctamente en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/materias");
    }
} else {
    if ($is_api_call) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Error al registrar la materia']);
    } else {
        echo 'error al registrar en la base de datos';
        session_start();
        $_SESSION['mensaje'] = "Error: No se pudo registrar. Comuníquese con el administrador.";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
    }
}
