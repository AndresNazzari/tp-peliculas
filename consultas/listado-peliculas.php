<?php

require __DIR__ . '/../conn.php';

$sql = 'SELECT * FROM peliculas';

// Preparo el stament

if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];
    $sql = $sql . ' WHERE estreno >= :fechaInicio AND estreno <= :fechaFin';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fechaInicio', $fecha . '-01-01');
    $stmt->bindValue(':fechaFin', $fecha . '-12-31');
} else {
    $stmt = $pdo->prepare($sql);
}

// Lo ejecuto
$stmt->execute();

// Lo recupero
$peliculas = $stmt->fetchAll(PDO::FETCH_OBJ);
