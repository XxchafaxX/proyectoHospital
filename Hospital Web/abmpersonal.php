<!DOCTYPE html>
<html>
<head>
    <title>ABM del Personal</title>
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
        input[type="button"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        select {
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
    <h1>ABM de Personal</h1>
    <!-- Formulario para agregar un paciente -->
    <h2>Agregar Personal</h2>
    <form action="redirectpersonal.php" method="POST">
        <!-- Campos del formulario -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>
        <label for="apellido">DNI:</label>
        <input type="number" id="dni1" name="dni1" maxlength="8" required><br>
                <label for="apellido">Cargo:</label>
        <select type="submit" id="cargo" name="cargo" required>
        <option value=""></option>
            <option value="">Jefe de Area</option>
            <option value="">Gerente</option>
            <option value="">Jefe de Enfermeria</option>
            <option value="">Recepcionista</option>
            <option value="">Limpieza</option>|
        </select><br>
        <label for="apellido">Matricula:</label>
        <input type="number" id="matricula" name="matricula" required><br>
        <label for="apellido">Tipo:</label>
        <select type="submit" id="tipo" name="tipo" required>
        <option value=""></option>
            <option value="">Medico</option>
            <option value="">Enfermero</option>
            <option value="">Personal</option>
        </select><br>
        <!-- Agregar más campos según los datos de la base de datos -->
        <input type="submit" value="Agregar">
    </form>
    
    <h1>Buscar Pacientes</h1>

    <!-- Listado de pacientes existentes (recuperados de la base de datos) -->
    <!-- Listado de pacientes existentes (recuperados de la base de datos) -->
    <h2>Listado del Personal</h2>
    <form method="POST" id="myForm" action="abmpersonal.php">
        <label for="buscar">Buscar por nombre o apellido:</label>
        <input type="text" id="buscar" name="buscar" required>
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
        <?php
                $buscar = $_POST["buscar"];
        $sql = "SELECT * FROM personal WHERE personal.nombre LIKE '%$buscar%' OR apellido LIKE '%$buscar%'";
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

    <!-- Formulario para editar un paciente (puedes implementarlo de manera similar al de agregar) -->

    <!-- Formulario para eliminar un paciente (puedes implementarlo de manera similar al de agregar) -->
</body>
</html>
