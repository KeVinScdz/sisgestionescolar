<?php
$sql_kardexs = "SELECT * FROM kardexs as kar
INNER JOIN docentes as doc ON doc.id_docente = kar.docente_id
INNER JOIN personas as per ON per.id_persona = doc.persona_id
INNER JOIN usuarios as usu ON usu.id_usuario = per.usuario_id   
INNER JOIN materias as mat ON mat.id_materia = kar.materia_id 
INNER JOIN estudiantes as est ON est.id_estudiante = kar.estudiante_id ";

$query_kardexs = $pdo->prepare($sql_kardexs);
$query_kardexs->execute();
$kardexs = $query_kardexs->fetchAll(PDO::FETCH_ASSOC);

