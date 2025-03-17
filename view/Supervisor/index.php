<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-blue-300 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-xl font-bold" href="#">Supervisor Usuario</a>
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-4">
        <h1 class="my-5 text-2xl font-bold">Bienvenido a Supervisor</h1>
    </div>

    <script>
        document.getElementById('navbar-toggler').addEventListener('click', function() {
            var nav = document.getElementById('navbarNav');
            nav.classList.toggle('hidden');
        });
    </script>
</body>
</html>