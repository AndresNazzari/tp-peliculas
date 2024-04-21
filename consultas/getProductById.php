<?php

require __DIR__ . '/../database/conn.php';

try {
    $id = $_GET['id'];
    
    // Preparar la consulta SQL
    $sql = 'SELECT * FROM products WHERE id = ' . $id;
    $stmt = $pdo->prepare($sql);
    
    // Ejecutar la consulta SQL
    $stmt->execute();
    
    // Recuperar los resultados como objetos anónimos
    $product = $stmt->fetch(PDO::FETCH_OBJ);

} catch (PDOException $e) {
    // Capturar y manejar cualquier excepción de PDO
    echo "Error: " . $e->getMessage();
}