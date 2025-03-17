<h1 class='font-bold text-2xl'>Hola desde la base de datos</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "1324";
$database = "db_pmt";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo "Conexión fallida: " . $conn->connect_error;
    die("Conexión fallida: " . $conn->connect_error);
}
echo "<h1 class='font-bold text-2xl'>conexion exitosa base de datos</h1>";
?>
