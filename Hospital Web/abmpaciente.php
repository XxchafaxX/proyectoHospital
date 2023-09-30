<!DOCTYPE html>
<html>
<head>
    <title>ABM de Pacientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="button"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
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

        p a{
            text-decoration: none;
            background-color: black;
            color: #fff;
            padding: 10px 10px;
            border: none;
            cursor: pointer;
        }
        p a:hover{
            text-decoration: none;
            background-color: white;
            color: black;
            padding: 10px 10px;
            border: none;
            cursor: pointer;
            box-shadow: black 5px 5px 2px;
        }
    </style>
    
</head>
<body>
    
<p> <a href="abm.php">Home</a></p>
    <h1>ABM de Pacientes</h1>

    <!-- Formulario para agregar un paciente -->
    <h2>Agregar Paciente</h2>
    <form action="redirectpaciente.php" method="POST">
        <!-- Campos del formulario -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>
        <label for="apellido" >DNI:</label>
        <input type="number" id="dni" name="dni" minlength="8" required><br>
        <label for="apellido">Telefono:</label>
        <input type="text" id="telefono" name="telefono" required><br>
        <label for="apellido">Obra Social:</label>
        <input type="text" id="obrasocial" name="obrasocial" required><br>
        <label for="apellido">Historia Clinica:</label>
        <input type="text" id="historialclinico" name="historialclinico" required><br>
        <!-- Agregar más campos según los datos de la base de datos -->
        <input type="submit" value="Agregar">
    </form>
    
    <h1>Buscar Pacientes</h1>

    <!-- Listado de pacientes existentes (recuperados de la base de datos) -->
    <h2>Listado de Pacientes</h2>
    <form method="POST" id="myForm" action="abmpaciente.php">
        <label for="busqueda">Buscar por nombre o apellido:</label>
        <input type="text" id="busqueda" name="busqueda" required>
        <input type="submit" value="Buscar"> 
        <input type="button" onclick="submit()" value="Mostrar Todo">
    </form> 
    <table>
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
        
        <?php
                $busqueda = $_POST["busqueda"];
        $sql = "SELECT * FROM paciente WHERE paciente.nombre LIKE '%$busqueda%' OR apellido LIKE '%$busqueda%'";
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
        <!-- Mostrar los pacientes desde la base de datos -->
    </table>
</body>
</html>
