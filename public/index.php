<?php
require '../app/Config/DBConfig.php';
require '../app/Models/Product.php';
require '../app/Services/Products.service.php';
require '../app/Repositories/Products.repository.php';
require '../app/Services/Categories.service.php';
require '../app/Repositories/Categories.repository.php';

$productsRepository = new ProductsRepository(DBConfig::getDBConnection());
$categoriesRepository = new CategoriesRepository(DBConfig::getDBConnection());

$productsService = new ProductService($productsRepository);
$categoriesService = new CategoriesService($categoriesRepository);
$products = $productsService->getAll();
$categories = $categoriesService->getAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="container">
        <section>
            <div class="row">
                <div class="col-md-12">
                    <h1>Products</h1>
                </div>
                <div class="col-md-12">
                    <a href="forms/create.php" class="btn btn-primary">
                        <span class="fa fa-home"> New Product</span>
                    </a>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-8">
                    <form id="form" action="index.php" method="GET">
                        <div class="form-group">
                            <label for="category"></label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select a category</option>
                                <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category->name ?>"><?php echo ucfirst($category->name); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" form="form" type="submit">Filtrar</button>
                </div>
            </div>

            <div class="d-flex flex-row flex-wrap">
            </div>
        </section>

        <?php if (empty($products)): ?>
        <p>No hay productos disponibles en este momento.</p>
        <?php else: ?>
        <section class="vh-100">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product->id; ?></td>
                                <td><?php echo $product->title; ?></td>
                                <td><?php echo $product->brand; ?></td>
                                <td><?php echo $product->model; ?></td>
                                <td><?php echo $product->price; ?></td>
                                <td>
                                    <a href="detail.php?id=<?php echo $product->id; ?>"
                                        class="btn btn-primary">Details</a>
                                    <a href="forms/edit.php?id=<?php echo $product->id; ?>" class="btn btn-primary">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    <form
                                        action="../app/Controllers/Product.controller.php?delete=<?php echo $product->id ?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>




        </section>
        <?php endif; ?>
    </main>
</body>

</html>