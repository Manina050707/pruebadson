<?php
// Parámetros de conexión
$host = 'localhost:3306';       // Servidor de la base de datos (puede ser localhost)
$dbname = 'sweet_paradise'; // Nombre de la base de datos
$username = 'root';        // Usuario de la base de datos
$password = '';            // Contraseña del usuario (vacía si no tiene)

// Configuración de PDO y manejo de errores
try {
    // Crear la conexión usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Establecer atributos para manejar errores con excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    // Manejo de errores en caso de que falle la conexión
    echo "Error en la conexión: " . $e->getMessage();
}
?>
