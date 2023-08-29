<?php
// eliminar_limpieza.php

// Si se recibió un ID válido mediante una petición POST
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    session_start();
    require 'conexion.php';

    // Evitar inyecciones SQL mediante el uso de una declaración preparada
    $stmt = $mysqli->prepare("DELETE FROM limpieza WHERE id = ?");
    $stmt->bind_param("i", $_POST['id']);

    // Ejecutar la consulta y verificar si tuvo éxito
    if ($stmt->execute()) {
        $response = array("status" => "success");
    } else {
        $response = array("status" => "error", "message" => "Error al eliminar el registro.");
    }

    $stmt->close();
    $mysqli->close();

    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
