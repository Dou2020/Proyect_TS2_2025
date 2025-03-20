<?php
include '../../model/Admin/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['editId'] ?? null;
    $name = $_POST['editNombre'] ?? null;
    $rol = $_POST['editRol'] ?? null;
    $password = $_POST['editPassword'] ?? null;

    echo $userId,'<br>';
    echo $name,'<br>';
    echo $rol,'<br>';
    echo $password,'<br>';


    if ($userId && $name && $rol && $password) {
        $result = actualizarUsuario([
            'id' => $userId,
            'nombre' => $name,
            'rol_id' => $rol,
            'password' => $password
        ]);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'User updated successfully.']);
            header('Location: /proyect_ts2/view/Admin/Usuario');
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update user.']);
            header('Location: /proyect_ts2/view/Admin/Usuario');
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
