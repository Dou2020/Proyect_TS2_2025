<?php
// Crear conexión
include '../../db/index.php';
$conn = conexion();

function obtenerUsuarios() {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("SELECT a.id AS id, a.nombre AS nombre, a.rol_id AS rol, b.nombre AS rol_id, a.password AS password FROM usuarios a JOIN roles b ON a.rol_id = b.id WHERE a.estado_id = 1");
        // Ejecutar consulta
        $stmt->execute();

        // Obtener resultados como un array asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function eliminarUsuario($id) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("UPDATE usuarios SET estado_id = 2 WHERE id = :id");
        // Vincular parámetros
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        // Ejecutar consulta
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function selectUsuario($id) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        // Vincular parámetros
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // Ejecutar consulta
        $stmt->execute();

        // Obtener resultados como un array asociativo
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function actualizarUsuario($datos) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("UPDATE usuarios SET nombre = :nombre, password = :password, rol_id = :rol_id WHERE id = :id");
        // Vincular parámetros
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $datos['password'], PDO::PARAM_STR);
        $stmt->bindParam(':rol_id', $datos['rol_id'], PDO::PARAM_INT);
        // Ejecutar consulta
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error actualizar usuario: " . $e->getMessage();
        return false;
    }
}

function crearUsuario($datos) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("INSERT INTO usuarios (id, nombre, rol_id, password, estado_id) VALUES (:id, :nombre, :rol_id, :password, 1)");
        // Vincular parámetros
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':rol_id', $datos['rol_id'], PDO::PARAM_INT);
        $stmt->bindParam(':password', $datos['password'], PDO::PARAM_STR);
        // Ejecutar consulta
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo "Error CREAR USUARIO: " . $e->getMessage();
        return false;
    }
}
?>
