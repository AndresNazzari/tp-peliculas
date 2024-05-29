<?php
require '../../app/Config/DBConfig.php';
require '../../app/Models/Product.php';
require '../../app/Services/Products.service.php';
require '../../app/Repositories/Products.repository.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$productsRepository = new ProductsRepository(DBConfig::getDBConnection());
$productsService = new ProductService($productsRepository);
$product = $productsService->getById($id);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product->title ?>| Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Edit Product</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="../../app/Controllers/Product.controller.php?update=<?php echo $product->id ?>"
                        method="POST" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <label for="title">Título</label>
                            <input type="text" id="title" name="title" class="form-control"
                                value="<?php echo $product->title ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control"
                                value="<?php echo $product->description ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="brand">Brand</label>
                            <input type="text" id="brand" name="brand" class="form-control"
                                value="<?php echo $product->brand ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="model">Model</label>
                            <input type="text" id="model" name="model" class="form-control"
                                value="<?php echo $product->model ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="color">Color</label>
                            <input type="text" id="color" name="color" class="form-control"
                                value="<?php echo $product->color ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="category">Category</label>
                            <input type="text" id="category" name="category" class="form-control"
                                value="<?php echo $product->category ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control"
                                value="<?php echo $product->price ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="discount">Discount</label>
                            <input type="number" id="discount" name="discount" class="form-control"
                                value="<?php echo $product->discount ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="image">Image</label>
                            <input type="text" id="image" name="image" class="form-control"
                                value="<?php echo $product->image ?>">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


</body>

</html>