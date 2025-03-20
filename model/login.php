<?php

function getUser($username, $password) {
    // Database credentials
    include '../db/index.php';
    $conn = conexion();

    try {
        // Prepare and execute query
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Fetch result
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verify password
        if ($user) {
            return $user; // Return the role of the user
        } else {
            return false;
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }

    $conn = null;
}
?>