<?php

require __DIR__ . '/../database/conn.php';

$sql = 'SELECT * FROM products';

try {
    if (isset($_GET['category']) && $_GET['category'] != '') {
        $category = $_GET['category'];
        $sql = $sql . ' WHERE category = :category';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':category', $category);
        
    } else {
        $stmt = $pdo->prepare($sql);
    }
    // Lo ejecuto
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    // Capturar y manejar cualquier excepción de PDO
    echo "Error: " . $e->getMessage();
}