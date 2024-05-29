<?php


function createAndSeedDatabase($conn) {
    createProductsTable($conn);
    createCategoriesTable($conn);

    $categoriesFetch = fetchURL('https://fakestoreapi.in/api/products/category');
    $productsFetch = fetchURL('https://fakestoreapi.in/api/products');
    
    $products = json_decode(json_encode($productsFetch), true);
    $categories =  json_decode(json_encode($categoriesFetch), true);

    if (isset($products['products'])) {
        insertProducts($conn, $products['products']);
    }

    if (isset($categories['categories'])) {
        insertCategories($conn, $categories['categories']);
    }
}


function createProductsTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        image VARCHAR(255),
        price DECIMAL(10,2) NOT NULL,
        description TEXT,
        brand VARCHAR(100),
        model VARCHAR(100),
        color VARCHAR(50),
        category VARCHAR(50),
        discount DECIMAL(5,2)
    )";
    $conn->exec($sql);
}

function createCategoriesTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS categories (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL
    )";
    $conn->exec($sql);
}


function insertProducts($conn, $products) {
    $sql = "INSERT INTO products (title, image, price, description, brand, model, color, category, discount) 
            VALUES (:title, :image, :price, :description, :brand, :model, :color, :category, :discount)";
    
    $stmt = $conn->prepare($sql);

    foreach ($products as $product) {
        $stmt->bindParam(':title', $product['title']);
        $stmt->bindParam(':image', $product['image']);
        $stmt->bindParam(':price', $product['price']);
        $stmt->bindParam(':description', $product['description']);
        $stmt->bindParam(':brand', $product['brand']);
        $stmt->bindParam(':model', $product['model']);
        $stmt->bindParam(':color', $product['color']);
        $stmt->bindParam(':category', $product['category']);
        $stmt->bindParam(':discount', $product['discount']);

        $stmt->execute();
    }
}

function insertCategories($conn, $categories) {
    $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (:name)");

    foreach ($categories as $category) {
        $stmt->bindParam(':name', $category);
        $stmt->execute();
    }
}

function fetchURL($url) {
    $data = file_get_contents($url);
    return json_decode($data, true);
}