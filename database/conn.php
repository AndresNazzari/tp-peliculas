<?php

require_once  __DIR__ . '/insertData.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '');
    
    // solo ejecutar una vez
    // createAndSeedDatabase($pdo);

} catch (PDOException $e) {
    var_dump($e);
}

