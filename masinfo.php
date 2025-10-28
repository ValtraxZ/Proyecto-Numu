<?php
session_start(); // Iniciar sesión si es necesario
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
    <style>
        /* Estilos para el video */
        .video-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden; /* Evita que el video se desborde */
        }

        .video-container video {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Pausar el video cuando el mouse no está sobre él */
        .video-container video:hover {
            cursor: pointer; /* Cambia el cursor al pasar el mouse */
        }
    </style>
</head>
<body style="background-color: #f8f9fa;">
    <!-- Navbar (igual al de las otras páginas) -->
    <div id="navbar">
        <a href="Menuorg.php">GedG</a>
        <a href="ver_eventos.php">Ver Mis Eventos</a>
        <a href="masinfo.php">Más Información</a>
        <a href="logout.php" class="btn-logout">Cerrar sesión</a>
    </div>

    <!-- Contenido principal -->
    <div class="container my-5">
        <!-- Título -->
        <h1 class="display-4 text-center mb-4">Acerca de GedG</h1>

        <!-- Video interactivo (se reproduce solo cuando el mouse está sobre él) -->
        <div class="video-container">
            <video loop muted controls>
                <source src="caosBurg.mp4" type="video/mp4">
                Tu navegador no soporta videos.
            </video>
        </div>

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
    <script>
        // Script para pausar/reproducir el video al pasar el mouse
        document.addEventListener("DOMContentLoaded", function () {
            const video = document.querySelector(".video-container video");

            video.addEventListener("mouseenter", function () {
                video.play(); // Reproduce el video cuando el mouse entra
            });

            video.addEventListener("mouseleave", function () {
                video.pause(); // Pausa el video cuando el mouse sale
            });
        });
    </script>
</body>
</html>