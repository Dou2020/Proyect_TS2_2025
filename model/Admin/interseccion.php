<?php
include '../../db/index.php';
$conn = conexion();

function obtenerIntersecciones() {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("SELECT i.id, a.nombre AS avenida, c.nombre AS calle, latitud, longitud FROM Interseccion i JOIN `Avenida` a ON i.avenida_id = a.id JOIN `Calle` c ON i.calle_id = c.id WHERE i.estado_id = 1");
        // Ejecutar consulta
        $stmt->execute();

        // Obtener resultados como un array asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function eliminarInterseccion($id) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("UPDATE intersecciones SET estado_id = 2 WHERE id = :id");
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
function selectInterseccion($id) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("SELECT * FROM intersecciones WHERE id = :id");
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
function crearInterseccion($nombre, $rol_id, $password) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("INSERT INTO intersecciones (nombre, rol_id, password) VALUES (:nombre, :rol_id, :password)");
        // Vincular parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':rol_id', $rol_id);
        $stmt->bindParam(':password', $password);
        // Ejecutar consulta
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function actualizarInterseccion($datos) {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("UPDATE intersecciones SET nombre = :nombre, password = :password, rol_id = :rol_id WHERE id = :id");
        // Vincular parámetros
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $datos['password'], PDO::PARAM_STR);
        $stmt->bindParam(':rol_id', $datos['rol_id'], PDO::PARAM_INT);
        // Ejecutar consulta
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function obtenerRoles() {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("SELECT * FROM roles");
        // Ejecutar consulta
        $stmt->execute();

        // Obtener resultados como un array asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function obtenerInterseccionesActivas() {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("SELECT * FROM intersecciones WHERE estado_id = 1");
        // Ejecutar consulta
        $stmt->execute();

        // Obtener resultados como un array asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function obtenerInterseccionesInactivas() {
    global $conn;

    try {
        // Consulta SQL
        $stmt = $conn->prepare("SELECT * FROM intersecciones WHERE estado_id = 2");
        // Ejecutar consulta
        $stmt->execute();

        // Obtener resultados como un array asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>