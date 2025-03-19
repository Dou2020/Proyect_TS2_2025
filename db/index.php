hola db
<?php

function conexion() {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "1324";
    $database = "db_pmt";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error db: " . $e->getMessage();
    }
}
?>
