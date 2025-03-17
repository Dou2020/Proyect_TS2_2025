Hola desde validacion
<br>

<?php
    include '../db/index.php';
    echo "<br>";

    // Iniciar sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    echo $user, "<br>";
    echo $pass, "<br>";

    $conn = conexion();

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }else {
        echo "Conexion exitosa";
    }

    $stmt = $conn->prepare("SELECT id, nombre, password FROM usuarios WHERE id = ?");
    $stmt->bind_param("s", $user);
    // Ejecutar y verificar errores
    if (!$stmt->execute()) {
        die("Error en la consulta: " . $stmt->error);
    }else {
        echo "Consulta exitosa";
    }

    $result = $stmt->get_result();

    echo $stmt->get_result(), " consulta <br>";
    
    // Verificar si el usuario existe
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verificar la contraseña con password_verify
        if (password_verify($pass, $row['password'])) {
            echo "Acceso concedido.";
            // Aquí puedes iniciar sesión o redirigir al usuario
            session_start();
            $_SESSION['usuario'] = $user;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método no permitido.";
}
?>