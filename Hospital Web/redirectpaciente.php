<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos no está en localhost
$username = "root";
$password = "";
$database = "hospital";
$table = "paciente";

// Conexión a la base de datos
$conexion = new mysqli($host, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario (ajusta los nombres de los campos según tu formulario)
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni2 = $_POST['dni'];
$telefono = $_POST['telefono'];
$obrasocial = $_POST['obrasocial'];
$historialclinico = $_POST['historialclinico'];

// Crear la consulta SQL para insertar los datos
$sql = "INSERT INTO $table (nombre, apellido, dni, telefono, obrasocial, historialclinico) VALUES ('$nombre', '$apellido', '$dni2', '$telefono', '$obrasocial', '$historialclinico')";

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
$url = "abmpaciente.php";
header("Location: $url");
include abmpaciente.php;
exit();
?>