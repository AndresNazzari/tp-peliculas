<?php

require __DIR__ . '/../database/conn.php';


try {
    // Preparar la consulta SQL
    $sql = 'SELECT * FROM categories';
    $stmt = $pdo->prepare($sql);
    
    // Ejecutar la consulta SQL
    $stmt->execute();
    
    // Recuperar los resultados como objetos anónimos
    $categories = $stmt->fetchAll(PDO::FETCH_OBJ);

} catch (PDOException $e) {
    // Capturar y manejar cualquier excepción de PDO
    echo "Error: " . $e->getMessage();
}