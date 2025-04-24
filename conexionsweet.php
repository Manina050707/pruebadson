<?php
// Conexión a la base de datos
$servername = "localhost:3306"; // Cambia esto si tu servidor es diferente
$username = "root"; // Cambia esto por tu usuario de base de datos
$password = ""; // Cambia esto por tu contraseña de base de datos
$dbname = "sweet_paradise"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener todos los usuarios
$sql = "SELECT * FROM usuario WHERE 1";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Salida de cada fila
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_usuario"]. " - Nombre: " . $row["nombre"]. " - Dirección: " . $row["direccion"]. " - Correo: " . $row["correo"]. " - Teléfono: " . $row["telefono"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>