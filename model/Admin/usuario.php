<?php
// Crear conexión
include '../../db/index.php';
$conn = conexion();

function obtenerUsuarios() {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("SELECT a.id AS id, a.nombre AS nombre, b.nombre AS rol_id FROM usuarios a JOIN roles b ON a.rol_id = b.id");
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
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
        // Vincular parámetros
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // Ejecutar consulta
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function editarUsuario($id) {
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
        $stmt = $conn->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, rol_id = :rol_id WHERE id = :id");
        // Vincular parámetros
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $datos['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':rol_id', $datos['rol_id'], PDO::PARAM_INT);
        // Ejecutar consulta
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function crearUsuario($datos) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, rol_id) VALUES (:nombre, :apellido, :rol_id)");
        // Vincular parámetros
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $datos['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':rol_id', $datos['rol_id'], PDO::PARAM_INT);
        // Ejecutar consulta
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
