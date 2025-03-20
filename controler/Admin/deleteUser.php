<?php

include '../../model/Admin/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include database connection

    // Get the user ID from the POST request
    $userId = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
    // Check if the user ID is valid
    if (isset($_POST['id'])) {
        $userId = $_POST['id'];
    } else {
        $userId = 0;
    }
    // Debugging output
    echo $userId, "<br>";

    if ($userId > 0) {
        // Prepare the SQL statement to delete the user
        $value = eliminarUsuario($userId);
        echo $value, "<br>";
        // Check if the user was deleted successfully
        if ($value) {
            // Success response
            echo json_encode(['status' => 'success', 'message' => 'User deleted successfully.']);
            // Redirect to the user management page
            header('Location: /proyect_ts2/view/Admin/Usuario');
        } else {
            // Error response
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete user.']);
            // Redirect to the user management page
            header('Location: /proyect_ts2/view/Admin/Usuario');
        }
    } else if ($userId == 0) {
        // Invalid user ID response
        echo json_encode(['status' => 'error', 'message' => 'User ID cannot be zero.']);
        // Redirect to the user management page
        header('Location: /proyect_ts2/view/Admin/Usuario');
    } else {
        // Invalid user ID response
        echo json_encode(['status' => 'error', 'message' => 'Invalid user ID.']);
        // Redirect to the user management page
        header('Location: /proyect_ts2/view/Admin/Usuario');
    }
} else {
    // Invalid request method response
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    // Redirect to the user management page
    header('Location: /proyect_ts2/view/Admin/Usuario');
    // Optionally, you can also log the error or take other actions
    // For example, you can log the error to a file
    // error_log("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    // Or display an error message
    // echo "Invalid request method.";
    // exit;
}
?>