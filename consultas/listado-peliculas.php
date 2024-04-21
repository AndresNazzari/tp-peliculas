<?php

require __DIR__ . '/../database/conn.php';

$sql = 'SELECT * FROM peliculas';

// Preparo el stament
$stmt = $pdo->prepare($sql);

if (isset($_GET['fecha']) ) {
    $fecha = $_GET['fecha'];
    
    if($fecha != 'all') {
        $sql = $sql . ' WHERE estreno >= :fechaInicio AND estreno <= :fechaFin';
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':fechaInicio', $fecha . '-01-01');
        $stmt->bindValue(':fechaFin', $fecha . '-12-31');
    }
} 

// Lo ejecuto
$stmt->execute();

// Lo recupero
$peliculas = $stmt->fetchAll(PDO::FETCH_OBJ);
