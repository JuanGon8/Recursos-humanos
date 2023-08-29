<?php
session_start();
require 'conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Retrieve data from the current table using the provided ID
    $sqlSelect = "SELECT nombres, primer_apellido, segundo_apellido FROM reclutamiento WHERE id = $id";
    $result = $mysqli->query($sqlSelect);
    $data = $result->fetch_assoc();

    if ($data) {
        // Insert the retrieved data into the "vigilantes" table
        $nombres = $data['nombres'];
        $primerApellido = $data['primer_apellido'];
        $segundoApellido = $data['segundo_apellido'];

        $sqlInsert = "INSERT INTO vigilantes (nombres, primer_apellido, segundo_apellido) VALUES ('$nombres', '$primerApellido', '$segundoApellido')";
        if ($mysqli->query($sqlInsert)) {
            // If the insertion was successful, delete the row from the current table
            $sqlDelete = "DELETE FROM reclutamiento WHERE id = $id";
            if ($mysqli->query($sqlDelete)) {
                echo json_encode(array("status" => "success"));
                exit;
            } else {
                echo json_encode(array("status" => "error", "message" => "Error al eliminar el registro."));
                exit;
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Error al mover los datos a la tabla de vigilantes."));
            exit;
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "No se encontraron datos para mover."));
        exit;
    }
} else {
    echo json_encode(array("status" => "error", "message" => "ID no proporcionado."));
    exit;
}
?>
