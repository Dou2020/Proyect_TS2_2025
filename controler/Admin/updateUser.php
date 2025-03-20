<?php
include '../../model/Admin/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;

    if ($userId && $name && $email) {
        $usuario = new Usuario();
        $result = $usuario->updateUser($userId, $name, $email);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'User updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update user.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
