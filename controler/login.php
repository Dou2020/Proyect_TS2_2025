<?php
    

    include '../model/login.php';

    // Iniciar sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    echo $user, "<br>";
    echo $pass, "<br>";

    $role = getUser($user, $pass);

    if ($role && password_verify($pass, $role['password'])) {
        switch ($role['rol_id']) {
            case '1':
                header('Location: /proyect_ts2/view/Admin');
                break;
            case '2':
                header('Location: /proyect_ts2/view/Monitor');
                break;
            default:
                echo "Rol no reconocido.";
                break;
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }

} else {
    echo "Método no permitido.";
}
?>