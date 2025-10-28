<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento</title>
    <link rel="stylesheet" href="crearevent.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .container {
            margin-top: 40px;
        }
    </style>
</head>
<body class="bg-light">
    <div id="navbar">
        <a class="active" href="Menuorg.php">GedG</a>
        <a href="crear_evento.php">Crear Evento</a>
        <a href="gestion_evento.php">Gestionar Eventos</a>
        <a href="masinfoorg.php">Más Información</a>
        <a href="ver_eventos.php">Ver Mis Eventos</a>
        <a href="logout.php" class="btn-logout">Cerrar sesión</a>
    </div>

    <div class="container">
        <h2 class="text-center mb-4">Crear Nuevo Evento</h2>
        <div class="card shadow-sm p-4">
            <form action="guardar_evento.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="Nombre_evento" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-4">
                        <input type="text" id="Nombre_evento" name="Nombre_evento" class="form-control" required>
                    </div>
                    
                    <label for="Fecha_evento" class="col-sm-2 col-form-label">Fecha:</label>
                    <div class="col-sm-4">
                        <input type="date" id="Fecha_evento" name="Fecha_evento" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Lugar" class="col-sm-2 col-form-label">Lugar:</label>
                    <div class="col-sm-4">
                        <input type="text" id="Lugar" name="Lugar" class="form-control" required>
                    </div>
                    
                    <label for="Capacidad" class="col-sm-2 col-form-label">Capacidad:</label>
                    <div class="col-sm-4">
                        <input type="number" id="Capacidad" name="Capacidad" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="imagen" class="col-sm-2 col-form-label">Imagen:</label>
                    <div class="col-sm-10">
                        <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Crear Evento</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>