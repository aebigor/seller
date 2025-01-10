<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configurar encabezados para aceptar solicitudes JSON
header('Content-Type: application/json');

// Leer el cuerpo de la solicitud
$rawData = file_get_contents('php://input');
if (!$rawData) {
    echo json_encode(['success' => false, 'message' => 'No se recibió ningún dato']);
    exit;
}

// Intentar decodificar el JSON
$data = json_decode($rawData, true);

// Verificar si hubo un error en la decodificación
if ($data === null) {
    echo json_encode(['success' => false, 'message' => 'Error al leer los datos JSON']);
    exit;
}

// Comprobar si los datos necesarios están presentes
if (isset($data['id']) && isset($data['cantidad'])) {
    $id = $data['id'];
    $cantidad = $data['cantidad'];

    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "S3rv1t3l4dm1n//";
    $dbname = "pentland";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Conexión fallida: ' . $conn->connect_error]);
        exit;
    }

    // Preparar la consulta SQL para actualizar la cantidad
    $sql = "UPDATE productos SET cantidad = cantidad + ? WHERE id = ?";

    // Preparar la sentencia
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("ii", $cantidad, $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Cantidad actualizada correctamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el producto']);
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta']);
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
}


header('Content-Type: application/json');

// Respuesta exitosa
echo json_encode([
    'success' => true,
    'message' => 'Producto actualizado correctamente'
]);
?>



