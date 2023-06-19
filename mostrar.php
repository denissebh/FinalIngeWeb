<?php
// Establecer los detalles de conexión a la base de datos
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbname = 'prueba1';

// Crear una conexión a la base de datos
$conn = new mysqli($host, $sbUsername, $dbPassword, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// ID del usuario específico
$userID = 1; // Aquí puedes cambiar el valor del ID del usuario que deseas mostrar

// Preparar la consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();

// Obtener los resultados de la consulta
$result = $stmt->get_result();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $nombre = $row["nombre"];
    $email = $row["email"];
    // Continúa obteniendo los demás campos de usuario según tu estructura de base de datos
?>
<!DOCTYPE html>
<html>
<head>
    <title>Datos del Usuario</title>
</head>
<body>
    <h1>Datos del Usuario</h1>
    <p>ID: <?php echo $id; ?></p>
    <p>Nombre: <?php echo $nombre; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <!-- Continúa con las etiquetas HTML y los campos de usuario restantes -->
</body>
</html>
<?php
} else {
    echo "No se encontraron datos del usuario.";
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conn->close();
?>