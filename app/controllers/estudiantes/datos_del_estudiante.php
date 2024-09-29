<?php
$sql_estudiantes = "SELECT *, est.nivel_id as nivel_id FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN niveles as niv ON niv.id_nivel = est.nivel_id
INNER JOIN grados as gra ON gra.id_grado = est.grado_id    
INNER JOIN ppffs as ppf ON ppf.estudiante_id = est.id_estudiante 
where est.estado = '1' and est.id_estudiante = '$id_estudiante' ";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);

foreach($estudiantes as $estudiante){
    $id_ppff = $estudiante['id_ppff'];
    $id_usuario = $estudiante['id_usuario'];
    $id_persona = $estudiante['id_persona'];
    $id_estudiante = $estudiante['id_estudiante'];
    
    $rol_id = $estudiante['rol_id'];
    $nombre_rol = $estudiante['nombre_rol'];
    $nombres = $estudiante['nombres'];
    $apellidos = $estudiante['apellidos'];
    $ci = $estudiante['ci'];
    $fecha_nacimiento = $estudiante['fecha_nacimiento'];
    $celular = $estudiante['celular'];
    $email = $estudiante['email'];
    $direccion = $estudiante['direccion'];
    $nivel_id = $estudiante['nivel_id'];
    $nivel = $estudiante['nivel'];
    $turno = $estudiante['turno'];
    $grado_id = $estudiante['grado_id'];
    $curso = $estudiante['curso'];
    $paralelo = $estudiante['paralelo'];
    $rude = $estudiante['rude'];
    $nombres_apellidos_ppff = $estudiante['nombres_apellidos_ppff'];
    $ci_ppf = $estudiante['ci_ppf'];
    $celular_ppff = $estudiante['celular_ppff'];
    $ocupacion_ppff = $estudiante['ocupacion_ppff'];
    $ref_nombre = $estudiante['ref_nombre'];
    $ref_parentezco = $estudiante['ref_parentezco'];
    $ref_celular = $estudiante['ref_celular'];
    $fyh_creacion = $estudiante['fyh_creacion'];
    $estado = $estudiante['estado'];
}