<?php
// require __DIR__ . '/consultas/listado-peliculas.php'
require_once __DIR__ . '/consultas/getCategories.php';
require_once __DIR__ . '/consultas/getProducts.php';
require_once __DIR__ . '/database/conn.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <main class="container">
        <section>
            <div class="row">
                <div class="col-md-12">
                    <h1>Products</h1>
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

        <section class="d-flex flex-wrap justify-content-evenly gap-3">
            <?php foreach ($products as $product): ?>
            <div class="card d-flex flex-column" style="width: 18rem;">
                <img src=<?php echo $product->image; ?> class="card-img-top" alt=<?php echo $product->title; ?>>
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title"><?php echo ucfirst($product->title); ?></h5>
                    <p class="card-text"><?php echo ucfirst($product->brand); ?> <?php echo ucfirst($product->model); ?>
                    </p>
                    <a href="productDetail.php?id=<?php echo ucfirst($product->id); ?>"
                        class="btn btn-primary">Details</a>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>