<?php

$sql_calificaiones = "SELECT * FROM calificaciones where estado = '1' ";
$query_calificaiones = $pdo->prepare($sql_calificaiones);
$query_calificaiones->execute();
$calificaiones = $query_calificaiones->fetchAll(PDO::FETCH_ASSOC);