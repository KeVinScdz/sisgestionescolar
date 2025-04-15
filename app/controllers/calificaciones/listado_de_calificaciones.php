<?php

$sql_calificaiones = "SELECT * FROM calificaciones as cal
           INNER JOIN materias as mat ON mat.id_materia =  cal.materia_id   where cal.estado = '1' ";
$query_calificaiones = $pdo->prepare($sql_calificaiones);
$query_calificaiones->execute();
$calificaiones = $query_calificaiones->fetchAll(PDO::FETCH_ASSOC);