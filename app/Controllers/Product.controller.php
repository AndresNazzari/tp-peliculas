<?php
require '../Config/DBConfig.php';
require '../Repositories/Products.repository.php';
require '../Services/Products.service.php';

$productsRepository = new ProductsRepository(DBConfig::getDBConnection());
$productsService = new ProductService($productsRepository);

if (isset($_GET['update'])) {
    $id = (int) $_GET['update'];
    $products = $productsService->update($id , $_POST);
} else if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $products = $productsService->delete($id);
} else if (isset($_GET['create'])) {
    $products = $productsService->create($_POST);
}
header('Location: ../../public/index.php');
exit();