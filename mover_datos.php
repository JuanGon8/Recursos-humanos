<?php
    session_start();
    require 'conexion.php';

    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
    }

    $sql_select = "SELECT * FROM reclutamiento";
    $result = mysqli_query($conexion, $sql_select);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id']; 
            $nombres = $row['nombres'];
            $primer_apellido = $row['primer_apellido'];
            $segundo_apellido = $row['segundo_apellido'];
            $telefono = $row['telefono'];
            $edad = $row['edad'];
            $moto = $row['moto'];
            $ultimo_empleo = $row['ultimo_empleo'];
            $antiguedad = $row['antiguedad'];
            $motivo_salida = $row['motivo_salida'];
            $puesto_aplicado = $row['puesto_aplicado'];
            $estats = $row['estats'];
            $comentarios = $row['comentarios'];
            $direccion = $row['direccion'];

            $sql_insert = "INSERT INTO reclutamiento_baja (id, nombres, primer_apellido, segundo_apellido, telefono, edad, moto, ultimo_empleo, antiguedad, motivo_salida, puesto_aplicado, estats, comentarios, direccion)
            VALUES ('$id', '$nombres', '$primer_apellido', '$segundo_apellido', '$telefono', '$edad', '$moto', '$ultimo_empleo', '$antiguedad', '$motivo_salida', '$puesto_aplicado', '$estats', '$comentarios', '$direccion')";
            mysqli_query($conexion, $sql_insert);
        }

        // Eliminar los datos de "reclutamiento" (opcional, según tus necesidades)
        $sql_delete = "DELETE FROM reclutamiento";
        mysqli_query($conexion, $sql_delete);

        $response = array("status" => "success");
        echo json_encode($response);
    } else {
        $response = array("status" => "error", "message" => "Error al mover los datos.");
        echo json_encode($response);
    }
?>
