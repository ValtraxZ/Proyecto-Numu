<?php
include("conexioncentral.php");

// Obtener el ID del evento a editar
if (isset($_GET['Id'])) {
    $evento_id = intval($_GET['Id']);
    $resultado = $conexion->query("SELECT * FROM evento WHERE Id = $evento_id");
    $evento = $resultado->fetch_assoc();
}

// Procesar el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evento_id = intval($_POST['Id']);
    $nombre = $_POST['Nombre_evento'];
    $fecha = $_POST['Fecha_evento'];
    $lugar = $_POST['Lugar'];
    $capacidad = $_POST['Capacidad'];
    $asistencia = $_POST['AsistUsuario'];

    // Actualizar el evento en la base de datos
    $sql = "UPDATE evento SET Nombre_evento = ?, Fecha_evento = ?, Lugar = ?, Capacidad = ?, AsistUsuario = ? WHERE Id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssisi", $nombre, $fecha, $lugar, $capacidad, $asistencia, $evento_id);

    if ($stmt->execute()) {
        // Redirigir a gestion_evento.php después de actualizar
        header("Location: gestion_evento.php");
        exit();
    } else {
        echo "Error al actualizar el evento: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link rel="stylesheet" href="diseñologin.css">
</head>
<body>
    <div id="navbar">
        <a href="Menuorg.php">GedG</a>
        <a href="crear_evento.php">Crear Evento</a>
        <a href="gestion_evento.php">Gestionar Eventos</a>
        <a href="masinfoorg.php">Más Información</a>
        <a href="ver_eventos.php">Ver Mis Eventos</a>
    </div>
    <div class="form-container">
        <h2>Editar Evento</h2>
        <form method="POST" action="editar_evento.php">
            <input type="hidden" name="Id" value="<?= $evento['Id']; ?>">
            <label for="Nombre_evento">Nombre del Evento:</label>
            <input type="text" name="Nombre_evento" value="<?= $evento['Nombre_evento']; ?>" required>
            <label for="Fecha_evento">Fecha del Evento:</label>
            <input type="date" name="Fecha_evento" value="<?= $evento['Fecha_evento']; ?>" required>
            <label for="Lugar">Lugar:</label>
            <input type="text" name="Lugar" value="<?= $evento['Lugar']; ?>" required>
            <label for="Capacidad">Capacidad:</label>
            <input type="number" name="Capacidad" value="<?= $evento['Capacidad']; ?>" required>
            <label for="AsistUsuario">Asistencia:</label>
            <select name="AsistUsuario" required>
                <option value="Sí" <?= ($evento['AsistUsuario'] == "Sí") ? "selected" : ""; ?>>Sí</option>
                <option value="No" <?= ($evento['AsistUsuario'] == "No") ? "selected" : ""; ?>>No</option>
            </select>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>