<?php
include("conexioncentral.php"); // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["Nombre_evento"];
    $fecha = $_POST["Fecha_evento"];
    $lugar = $_POST["Lugar"];
    $capacidad = $_POST["Capacidad"];
    $imagen = $_POST["imagen"];

    // Manejo de la imagen
    $directorio = "uploads/"; // Carpeta donde se guardarán las imágenes
    $archivoImagen = $directorio . basename($_FILES["imagen"]["name"]);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivoImagen);

    // Insertar datos en la base de datos
    $sql = $conexion->prepare("INSERT INTO evento (Nombre_evento, Fecha_evento, Lugar, Capacidad, imagen) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssis", $nombre, $fecha, $lugar, $capacidad, $archivoImagen);
    
    if ($sql->execute()) {
        header("Location: Menuorg.php"); // Redirigir al menú organizador
        exit();
    } else {
        echo "Error al guardar el evento: " . $conexion->error;
    }
}
?>
