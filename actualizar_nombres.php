<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos enviados por AJAX
$id = $_POST['id'];
$nuevoNombre = $_POST['nombres'];

// Actualizar el campo "nombre" en la base de datos
$sql = "UPDATE reclutamiento SET nombres = '$nuevoNombre' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    // La actualización fue exitosa
    echo "Actualización exitosa";
} else {
    // Manejar el error si la actualización falla
    echo "Error al actualizar: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
