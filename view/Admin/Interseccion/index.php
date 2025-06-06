<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /proyect_ts2");
    exit();
}
if ($_SESSION['user']['rol_id'] != 1) {
    header("Location: /proyect_ts2");
    exit();
}
// Verificar si el usuario tiene permisos de administrador
// Aquí puedes agregar la lógica para verificar los permisos del usuario
// Si no tiene permisos, redirigir a otra página o mostrar un mensaje de error
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-blue-300 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-xl font-bold" href="#">Administrador Usuario</a>
            <button class="block lg:hidden px-3 py-2 border rounded text-gray-700 border-gray-400 hover:text-gray-900 hover:border-gray-900" id="navbar-toggler">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
            <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="navbarNav">
                <ul class="lg:flex lg:items-center lg:justify-between text-base text-gray-700 pt-4 lg:pt-0">
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="/proyect_ts2/view/Admin/Usuario">Usuario</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="/proyect_ts2/view/Admin/Interseccion">Intersecciones</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="/proyect_ts2/view/Login/logout.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-4">
        <h1 class="my-5 text-2xl font-bold">Bienvenido a la administración de Interseccion</h1>
        <!-- Contenido de la página -->
        <?php include "create_inter.php"; ?>
        
        <?php include "view_inter.php"; ?>
        <!-- Fin del contenido de la página -->
        <?php include "../../../db/index.php"; ?>
        <?php include "../../../model/Admin/usuario.php"; ?>
    </div>

    <script>
        document.getElementById('navbar-toggler').addEventListener('click', function() {
            var nav = document.getElementById('navbarNav');
            nav.classList.toggle('hidden');
        });
    </script>
</body>
</html>