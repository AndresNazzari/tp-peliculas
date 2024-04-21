<?php

require __DIR__ . '/../database/conn.php';

$id = $_GET['id'];

// Preparo el stament
$stmt = $pdo->prepare('SELECT * FROM peliculas WHERE id = ?');

// Lo ejecuto
$stmt->execute([$id]);

// Lo recupero
$pelicula = $stmt->fetch(PDO::FETCH_OBJ);

