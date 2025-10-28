<?php
include("conexioncentral.php");

if (isset($_GET['Id'])) {
    $evento_id = intval($_GET['Id']);
    $sql = "DELETE FROM evento WHERE Id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $evento_id);

    if ($stmt->execute()) {
        header("Location: gestion_evento.php");
        exit();
    } else {
        echo "Error al eliminar el evento: " . $conexion->error;
    }
}
?>
