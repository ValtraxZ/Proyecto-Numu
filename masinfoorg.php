<?php
session_start(); // Iniciar sesión si es necesario
include("conexioncentral.php"); // Incluir la conexión a la base de datos

// Consulta para obtener los datos de asistencia
$query = "SELECT Nombre_evento, COUNT(*) AS asistentes FROM evento WHERE AsistUsuario = 'Sí' GROUP BY Nombre_evento";
$resultado = $conexion->query($query);

// Preparar los datos para Google Charts
$data = [['Evento', 'Asistentes']]; // Encabezados de la gráfica
while ($fila = $resultado->fetch_assoc()) {
    $data[] = [$fila['Nombre_evento'], (int)$fila['asistentes']];
}

// Convertir los datos a formato JSON
$data_json = json_encode($data);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Más Información - GedG</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="styleMorg.css">
    <!-- Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Cargar la API de Google Charts
        google.charts.load('current', { packages: ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Convertir los datos de PHP a un formato compatible con Google Charts
            const data = google.visualization.arrayToDataTable(<?php echo $data_json; ?>);

            // Opciones de la gráfica
            const options = {
                title: 'Asistencia a Eventos',
                titleTextStyle: {
                    fontSize: 20,
                    bold: true,
                },
                hAxis: {
                    title: 'Eventos',
                    titleTextStyle: {
                        fontSize: 16,
                        bold: true,
                    },
                },
                vAxis: {
                    title: 'Asistentes',
                    titleTextStyle: {
                        fontSize: 16,
                        bold: true,
                    },
                },
                bars: 'vertical', // Barras verticales
                colors: ['#BC5679'], // Color de las barras
                backgroundColor: '#f8f9fa', // Color de fondo
                legend: { position: 'none' }, // Ocultar la leyenda
                bar: {
                    strokeColor: '#871B47', // Color del borde de las barras
                    strokeOpacity: 0.6, // Opacidad del borde
                    strokeWidth: 8, // Grosor del borde
                    fillColor: '#BC5679', // Color de relleno de las barras
                    fillOpacity: 0.2, // Opacidad del relleno
                },
            };

            // Crear la gráfica
            const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body style="background-color: #f8f9fa;">
    <!-- Navbar (igual al de las otras páginas) -->
    <div id="navbar">
        <a href="Menuorg.php">GedG</a>
        <a href="crear_evento.php">Crear Evento</a>
        <a href="gestion_evento.php">Gestionar Eventos</a>
        <a href="ver_eventos.php">Ver Mis Eventos</a>
        <a href="masinfoorg.php">Más Información</a>
        <a href="logout.php" class="btn-logout">Cerrar sesión</a>
    </div>

    <!-- Contenido principal -->
    <div class="container my-5">
        <!-- Título -->
        <h1 class="display-4 text-center mb-4">Asistencia a Eventos</h1>

        <!-- Gráfica de Google Charts -->
        <div id="chart_div" style="width: 100%; height: 500px;"></div>

        <!-- Información sobre la aplicación -->
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <p class="lead text-center">
                    GedG es una aplicación líder en la gestión de eventos, diseñada para simplificar la organización y participación en eventos de todo tipo. Con más de <strong>2 millones de usuarios</strong> en todo el mundo, nuestra plataforma ofrece herramientas intuitivas y poderosas para crear, gestionar y asistir a eventos de manera eficiente.
                </p>
                <h2 class="mt-4">Nuestro Objetivo</h2>
                <p>
                    Nuestro objetivo es conectar a las personas a través de eventos memorables. Ya sea un concierto, una conferencia, una boda o una reunión de negocios, GedG te permite organizar y participar en eventos de manera sencilla y efectiva. Queremos que te enfoques en disfrutar el evento, mientras nosotros nos encargamos de los detalles técnicos.
                </p>
                <h2 class="mt-4">Características Principales</h2>
                <ul>
                    <li><strong>Creación de eventos:</strong> Crea eventos en minutos con nuestra interfaz fácil de usar.</li>
                    <li><strong>Gestión de asistentes:</strong> Controla quién asiste a tus eventos y mantén un registro actualizado.</li>
                    <li><strong>Notificaciones en tiempo real:</strong> Mantén a todos informados con alertas y recordatorios automáticos.</li>
                    <li><strong>Integración con redes sociales:</strong> Comparte tus eventos en Facebook, Twitter y otras plataformas.</li>
                    <li><strong>Seguridad y privacidad:</strong> Tus datos están protegidos con las mejores prácticas de seguridad.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2023 GedG. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>