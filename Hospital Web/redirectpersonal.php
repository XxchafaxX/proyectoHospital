<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos no está en localhost
$username = "root";
$password = "";
$database = "hospital";
$table = "personal";

// Conexión a la base de datos
$conexion = new mysqli($host, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario (ajusta los nombres de los campos según tu formulario)
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni1 = $_POST['dni1'];
$cargo = $_POST['cargo'];
$matricula = $_POST['matricula'];
$tipo = $_POST['tipo'];

// Crear la consulta SQL para insertar los datos
$sql = "INSERT INTO $table (nombre, apellido, dni, cargo, matricula, tipo) VALUES ('$nombre', '$apellido', '$dni1', '$cargo', '$matricula', '$tipo')";

// Ejecutar la consulta SQL
if ($conexion->query($sql) === TRUE) {
    echo "Registro insertado con éxito.";
} else {
    echo "Error al insertar el registro: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
<?php 
$url = "abmpersonal.php";
header("Location: $url");
include abmpersonal.php;
exit();
?>