<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('Location: ../Home/index.php');
    }    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-2xl">
        <h2 class="text-2xl font-bold text-center text-gray-700">Iniciar sesión</h2>
        <form method="POST" action="controler/login.php" class="space-y-4">
            <div>
            <label class="block text-sm font-medium text-gray-700">Usuario</label>
            <input type="text" name="username" class="w-full p-3 mt-1 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none" placeholder="ingresa tu usuario">
            </div>
            <div>
            <label class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" name="password" class="w-full p-3 mt-1 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none" placeholder="********">
            </div>
            <button type="submit" class="w-full p-3 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600">Ingresar</button>
        </form>
    </div>
</body>
</html>
