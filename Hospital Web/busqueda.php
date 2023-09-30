<!-- Formulario para editar un paciente (puedes implementarlo de manera similar al de agregar) -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Procesar la búsqueda
        // Conectar a la base de datos (debes proporcionar tus credenciales de conexión)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hospital";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta SQL para buscar pacientes por nombre o apellido
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Resultados de la búsqueda:</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["apellido"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }

        $conn->close();
    }
    $url = "abmpaciente.php";
header("Location: $url");
include abmpaciente.php;
exit();
    ?>