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
$ubicacion = $_POST['ubicacion'];
$gafette = $_POST['gafette'];
$bata = $_POST['bata'];
$tenis = $_POST['tenis'];

// Preparar la consulta SQL
$sql = "INSERT INTO limpieza (nombres, primer_apellido, segundo_apellido, ubicacion, gafette, bata, tenis)
        VALUES ('$nombres', '$primer_apellido', '$segundo_apellido', '$ubicacion', '$gafette','$bata', '$tenis')";

// Ejecutar la consulta y verificar si se guardaron los datos
if ($conn->query($sql) === TRUE) {
    // Mostrar alerta y redirigir a la página candidatos.php
    echo "<script>alert('Los datos se guardaron correctamente.'); window.location.href = 'limpieza.php';</script>";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
