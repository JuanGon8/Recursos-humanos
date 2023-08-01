<?php
// Crear conexión
$conn = new mysqli("localhost", "root", "", "sistema");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener el nombre del registro de la URL
if (isset($_GET['nombres'])) {
    $nombres = $_GET['nombres'];

    // Preparar la consulta SQL para obtener el registro correspondiente al nombre
    $sql = "SELECT archivo FROM reclutamiento WHERE nombres = '$nombres'";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Obtener el contenido del archivo desde la base de datos
        $row = $result->fetch_assoc();
        $archivo_contenido = $row['archivo'];

        // Definir las cabeceras para la descarga
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="archivo_adjunto.txt"'); // Puedes cambiar el nombre del archivo aquí

        // Mostrar el contenido del archivo y finalizar la ejecución
        echo $archivo_contenido;
        exit;
    } else {
        echo "Archivo no encontrado.";
    }
} else {
    echo "Nombre de registro no especificado.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
