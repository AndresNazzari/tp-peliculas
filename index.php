<?php
// require __DIR__ . '/consultas/listado-peliculas.php'
require __DIR__ . '/database/conn.php';
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

                        

                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" form="form" type="submit">Filtrar</button>
            </div>
        </div>
        <div class="d-flex flex-row flex-wrap">


            
        </div>
    </main>
</body>
</html>