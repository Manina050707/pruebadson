<?php
// Activar reporte de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conectar con la base de datos
require 'conexpdo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];

    try {
        $stmt = $pdo->prepare("CALL guardar_usuario(:id_usuario, :nombre, :contrasena)");
        $stmt->bindParam(':id_usuario', $cedula);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':contrasena', $contrasena);

        if ($stmt->execute()) {
            // Redirección con JavaScript si todo salió bien
            echo "<script>
                alert('✅ Usuario registrado con éxito.');
                window.location.href = 'categoria.html';
            </script>";
            exit();
        } else {
            echo "<script>alert('⚠️ No se pudo guardar el usuario.');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('❌ Error: " . $e->getMessage() . "');</script>";
    }
} else {
    echo "<script>alert('Acceso no válido.');</script>";
}
?>


