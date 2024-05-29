<?php
require __DIR__ . '/insertData.php';

class DBConfig
{
    public static function getDBConnection()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // solo ejecutar una vez
            // createAndSeedDatabase($pdo);

        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return null;
        }

        return $pdo;
    }


}