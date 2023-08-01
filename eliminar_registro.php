<?php
// Conexión a la base de datos (debes incluir el archivo de conexión aquí)
session_start();
require 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Verificar si se recibió el ID del registro a eliminar
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    // Query para eliminar el registro por su ID
    $sql = "DELETE FROM reclutamiento WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        // Éxito en la eliminación
        echo json_encode(['status' => 'success']);
        exit();
    } else {
        // Error en la eliminación
        echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el registro']);
        exit();
    }
}

// Si no se recibió el ID o no es válido
echo json_encode(['status' => 'error', 'message' => 'ID de registro inválido']);
exit();
?>
