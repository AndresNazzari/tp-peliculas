<?php
// require __DIR__ . '/consultas/listado-peliculas.php'
require __DIR__ . '/consultas/getCategories.php';
require __DIR__ . '/consultas/getProductById.php';
require __DIR__ . '/database/conn.php';
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach ($categories as $category): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="#"><?php echo ucfirst($category->name); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>



    <main class="container">
        <section class="d-flex flex-wrap justify-content-evenly gap-3">
            <div class="card d-flex flex-column" style="width: 18rem;">
                <img src=<?php echo $product->image; ?> class="card-img-top" alt=<?php echo $product->title; ?>>
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title"><?php echo ucfirst($product->title); ?></h5>
                    <p class="card-text"><?php echo ucfirst($product->brand); ?> <?php echo ucfirst($product->model); ?>
                    <p class="card-text"><?php echo ucfirst($product->description); ?> </p>
                    <a href="index.php" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </section>
    </main>
</body>

</html>