<!DOCTYPE html>
<html>
<head>
    <title>Administración de Hospital</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        a{
            color: white;
            text-decoration: none;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            color: #333;
        }
        .section {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Administración de Hospital</h1>
        
        <!-- Sección de Pacientes -->
        <div class="section">
            <h2>Pacientes</h2>
            <table class="table">
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
?>
                <tr>
                <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <!-- Agregar más columnas según los datos de la base de datos -->
            <th>DNI</th>
            <th>Telefono</th>
            <th>Obra Social</th>
            <th>Historial Clinico</th>
                </tr>
                <!-- Aquí mostrar los datos de los pacientes desde la base de datos -->
              <?php  $sql = "SELECT * FROM paciente";
        $resultado = mysqli_query($conexion, $sql);
         if (mysqli_num_rows($resultado) > 0) {
            while ($paciente = mysqli_fetch_assoc($resultado)) {
               echo '<tr>';
                echo '<td>' . $paciente["id"] . '</td>';
                echo '<td>' . $paciente["nombre"] . '</td>';
                echo '<td>' . $paciente["apellido"] . '</td>';
                echo '<td>' . $paciente["dni"] . '</td>';
                echo '<td>' . $paciente["telefono"] . '</td>';
                echo '<td>' . $paciente["obrasocial"] . '</td>';
                echo '<td>' . $paciente["historialclinico"] . '</td>';
               echo '</tr>';
            } 
        }
        ?>
            </table>
            <button class="btn"><a href="abmpaciente.php">Agregar Paciente</a></button>
        </div>

        <!-- Sección de Personal -->
        <div class="section">
            <h2>Personal</h2>
            <table class="table">
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
?>
                <tr>
                <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <!-- Agregar más columnas según los datos de la base de datos -->
            <th>dni</th>
            <th>cargo</th>
            <th>matricula</th>
            <th>tipo</th>
                </tr>
                <!-- Aquí mostrar los datos del personal desde la base de datos -->
                <?php 
                $sql = "SELECT * FROM personal ";
                $resultado = mysqli_query($conexion, $sql);
         if (mysqli_num_rows($resultado) > 0) {
            while ($personal = mysqli_fetch_assoc($resultado)) {
               echo '<tr>';
                echo '<td>' . $personal["id"] . '</td>';
                echo '<td>' . $personal["nombre"] . '</td>';
                echo '<td>' . $personal["apellido"] . '</td>';
                echo '<td>' . $personal["dni"] . '</td>';
                echo '<td>' . $personal["cargo"] . '</td>';
                echo '<td>' . $personal["matricula"] . '</td>';
                echo '<td>' . $personal["tipo"] . '</td>';
               echo '</tr>';
            } 
        }
        ?>
            </table>
            <button class="btn"><a href="abmpersonal.php">Agregar Personal</a></button>
        </div>

        <!-- Sección de Fechas de Internación -->
        <div class="section">
            <h2>Fechas de Internación</h2>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <!-- Agregar más columnas según tus necesidades -->
                    <th>Acciones</th>
                </tr>
                <!-- Aquí mostrar los datos de fechas de internación desde la base de datos -->
            </table>
            <button class="btn">Agregar Fecha de Internación</button>
        </div>
    </div>
</body>
</html>
