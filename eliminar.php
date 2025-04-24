<?php
require 'conexpdo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['id_usuario'];

    try {
        $stmt = $pdo->prepare("CALL eliminar_usuario(:id_usuario)");
        $stmt->bindParam(':id_usuario', $cedula);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: inicio.html");
        } else {
            
        }
    } catch (PDOException $e) {
        echo "❌ Error al eliminar usuario: " . $e->getMessage();
    }
} else {
    echo "Acceso no válido.";
}
?>