<?php
include("conexioncentral.php");
$resultado = $conexion->query("SELECT * FROM evento");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Eventos</title>
    <link rel="stylesheet" href="diseñologin.css">
    <link rel="stylesheet" href="stylegevent.css">
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
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Capacidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($evento = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $evento['Nombre_evento']; ?></td>
                        <td><?php echo $evento['Fecha_evento']; ?></td>
                        <td><?php echo $evento['Lugar']; ?></td>
                        <td><?php echo $evento['Capacidad']; ?></td>
                        <td>
                            <a href="editar_evento.php?Id=<?= $evento['Id']; ?>" class="btn btn-warning">Editar</a>
                            <a href="eliminar_evento.php?Id=<?= $evento['Id']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>