<?php
include 'conexpdo.php';  // Incluir la conexión a la base de datos

try {
    // Preparar la llamada al procedimiento almacenado
    $stmt = $pdo->prepare("CALL listar_usuario()");

    // Ejecutar el procedimiento
    $stmt->execute();

    // Recuperar los resultados
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar los resultados
    if ($usuarios) {
        echo "<table border='1'>
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                </tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr>
                    <td>" . $usuario['id_usuario'] . "</td>
                    <td>" . $usuario['nombre'] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay usuarios registrados.";
    }
} catch (PDOException $e) {
    echo "Error al listar los usuarios: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>




</body>
</html>
