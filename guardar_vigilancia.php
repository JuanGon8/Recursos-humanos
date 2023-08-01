    <?php

    // Crear conexión
    $conn = new mysqli("localhost", "root", "", "sistema"); 

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $nombres = $_POST['nombres'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $uniforme_cant = $_POST['uniforme_cant'];
    $cor_mando = $_POST['cor_mando'];
    $gafette = $_POST['gafette'];
    $fornitura = $_POST['fornitura'];
    $gorra = $_POST['gorra'];
    $tonfa = $_POST['tonfa'];
    $radio = $_POST['radio'];
    $telefono_asig = $_POST['telefono_asig'];
    $chalecos = $_POST['chalecos'];
    $botas = $_POST['botas'];
    $silbato = $_POST['silbato'];
    $det_metal = $_POST['det_metal'];
    $lamparas = $_POST['lamparas'];
    $vehiculo = $_POST['vehiculo'];
    $body_cam = $_POST['body_cam'];
    $vigilante = $_POST['vigilante'];
    $casco = $_POST['casco'];
    $impermeable = $_POST['impermeable'];
    $ubicacion = $_POST['ubicacion'];


    // Preparar la consulta SQL
    $sql = "INSERT INTO vigilantes (nombres, primer_apellido, segundo_apellido, uniforme_cant, cor_mando, gafette, fornitura, gorra, tonfa, radio, telefono_asig, chalecos, botas, silbato, det_metal, lamparas, vehiculo, body_cam, casco, vigilante, impermeable, ubicacion)
            VALUES ('$nombres', '$primer_apellido', '$segundo_apellido', '$uniforme_cant', '$cor_mando', '$gafette', '$fornitura', '$gorra', '$tonfa', '$radio', '$telefono_asig', '$chalecos', '$botas', '$silbato', '$det_metal', '$lamparas', '$vehiculo', '$body_cam', '$casco', '$vigilante', '$impermeable', '$ubicacion')";

    // Ejecutar la consulta y verificar si se guardaron los datos
    if ($conn->query($sql) === TRUE) {
        // Mostrar alerta y redirigir a la página candidatos.php
        echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'vigilante.php';</script>";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
