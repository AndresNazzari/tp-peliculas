<?php
require __DIR__ . '/consultas/listado-peliculas.php'
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Películas</h1>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-8">
                <form id="form" action="index.php" method="GET">
                    <div class="form-group">
                        <label for="fecha"></label>
                        <select name="fecha" id="fecha" class="form-control">
                            <option value="all">Seleccione un año</option>
                            <?php for($i=2012; $i<=2024; $i++): ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php endfor; ?>
                            <option value="all">Todos</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" form="form" type="submit">Filtrar</button>
            </div>
        </div>
        <div class="d-flex flex-row flex-wrap">
            <?php foreach($peliculas as $pelicula): ?>
                <div class="card  m-3" style="width: 18rem;">
                    <img class="card-img-top" src=<?php echo $pelicula->poster ?> alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $pelicula->titulo ?></h5>
                        <p class="card-text"><?php echo $pelicula->genero ?></p>
                        <a href="pelicula.php?id=<?php echo $pelicula->id; ?>" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>