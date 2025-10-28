<?php
include("conexioncentral.php");

if (isset($_POST["submit"])) {
    // Verificar que los campos no estén vacíos
    if (empty($_POST["nombre"]) || empty($_POST["contrasena"])) {
        echo '<div class="alert alert-danger">⚠️ Los campos están vacíos.</div>';
    } else {
        $nombre = $_POST["nombre"];
        $contrasena = $_POST["contrasena"];

        // Prepara la consulta para evitar SQL Injection
        $sql = $conexion->prepare("SELECT * FROM usuariosumun WHERE nombre = ?");
        $sql->bind_param("s", $nombre);
        $sql->execute();
        $resultado = $sql->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            // Verificar la contraseña
            if ($contrasena == $usuario['contrasena']) {
                session_start();
                $_SESSION['usuario'] = $nombre; // Guardar sesión

                // Verificar si es un organizador o participante
                if ($usuario['tipo_usuario'] == 'organizador') {
                    header("Location: Menuorg.php");
                } else {
                    header("Location: Menupar.php");
                }
                exit(); // Detiene la ejecución después de hacer la redirección de la página :D
            } else {
                echo '<div class="alert alert-danger"> Contraseña incorrecta.</div>';
            }
        } else {
            echo '<div class="alert alert-danger"> Usuario no encontrado.</div>';
        }
    }
}
?>
