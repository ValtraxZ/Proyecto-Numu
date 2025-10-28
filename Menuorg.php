<?php
include("conexioncentral.php");
$resultado = $conexion->query("SELECT * FROM evento");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Organizador</title>
    <link rel="stylesheet" href="styleMorg.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="background-color: white;">
    <div id="navbar">
        <a href="Menuorg.php">GedG</a>
        <a href="crear_evento.php">Crear Evento</a>
        <a href="gestion_evento.php">Gestionar Eventos</a>
        <a href="ver_eventos.php">Ver Mis Eventos</a>
        <a href="masinfoorg.php">Más Información</a>
        <a href="logout.php" class="btn-logout">Cerrar sesión</a>
    </div>
    <div class="card-container">
        <?php while ($evento = $resultado->fetch_assoc()) { ?>
            <div class="card">
                <img src="<?php echo $evento['imagen']; ?>" alt="Imagen del evento">
                <div class="card-body">
                    <h3><?php echo $evento['Nombre_evento']; ?></h3>
                    <p>Fecha: <?php echo $evento['Fecha_evento']; ?></p>
                    <p>Lugar: <?php echo $evento['Lugar']; ?></p>
                    <p><strong>Asistencia:</strong> <?php echo ($evento['AsistUsuario'] == "Sí") ? "Confirmada" : "No confirmada"; ?></p>

                    <form class="evento-form" data-id="<?= $evento['Id']; ?>">
                        <input type="hidden" name="Id" value="<?= $evento['Id']; ?>">
                        <button type="button" name="accion" value="asistir" class="btn btn-success btn-asistir">Asistir</button>
                    </form>

                </div>
            </div>
        <?php } ?>
    </div>

    <script>
        $(document).ready(function() {
            // Asistir a un evento
            $(".btn-asistir").click(function() {
                var form = $(this).closest(".evento-form");
                var evento_id = form.find("input[name='Id']").val();

                $.ajax({
                    url: "procesar_evento.php",
                    type: "POST",
                    data: { Id: evento_id, accion: "asistir" },
                    success: function(response) {
                        alert("Se agregó a su lista de ver eventos.");
                        location.reload(); // Recargar la página para reflejar los cambios
                    },
                    error: function() {
                        alert("Error al confirmar asistencia.");
                    }
                });
            });
        });
    </script>
</body>
</html>