<?php

    include '../../model/Admin/usuario.php';

    // Iniciar sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $rol = isset($_POST['role']) ? $_POST['role'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    echo $user, "<br>";
    echo $nombre, "<br>";
    echo $rol, "<br>";
    echo $pass, "<br>";

    $create = crearUsuario([ 'id' => $user, 'nombre'=>$nombre, 'rol_id' => $rol, 'password' => password_hash($pass, PASSWORD_DEFAULT)]);
    echo $create, "<br>";
    if ($create) {
        echo "Usuario creado con éxito.";
        header('Location: /proyect_ts2/view/Admin/Usuario');
    } else {
        echo "Error al crear el usuario.";
    }
} else {
    echo "Método no permitido.";
}
?>