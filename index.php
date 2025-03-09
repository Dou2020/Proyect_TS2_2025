<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pista Grande con Intersección</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .car {
            transition: transform 3s linear;
        }
        .pedestrian-line {
            width: 6px;
            height: 21px;
            background: white;
            margin: 4px;
        }
        .pedestrian-line-row {
            width: 21px;
            height: 6px;
            background: white;
            margin: 4px;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let state = "red";
            setInterval(() => {
                state = state === "red" ? "green" : "red";

                document.querySelectorAll(".light").forEach(el => {
                    el.classList.remove("bg-red-500", "bg-green-500", "bg-gray-500");
                    el.classList.add(state === "red" ? "bg-red-500" : "bg-green-500");
                });

                // Movimiento de los autos si el semáforo está en verde
                if (state === "green") {
                    document.getElementById("car1").style.transform = "translateY(535px)";
                    document.getElementById("car2").style.transform = "translateX(-150px)";
                    document.getElementById("car3").style.transform = "translateY(-535px)";
                    document.getElementById("car4").style.transform = "translateX(150px)";
                } else {
                    document.getElementById("car1").style.transform = "translateY(0)";
                    document.getElementById("car2").style.transform = "translateX(0)";
                    document.getElementById("car3").style.transform = "translateY(0)";
                    document.getElementById("car4").style.transform = "translateX(0)";
                }
            }, 3000);
        });
    </script>
</head>
<body class="bg-blue-200 flex flex-col items-center justify-center h-screen">
    <h1 class="text-2xl font-bold mb-4">Intersección Ampliada</h1>

    <div class="relative w-[600px] h-[600px] bg-gray-700 flex flex-wrap">

        <!-- Calles Extendidas -->
        <div class="absolute top-0 left-1/2 w-[140px] h-full bg-gray-500 -translate-x-1/2"></div>
        <div class="absolute left-0 top-1/2 h-[140px] w-full bg-gray-500 -translate-y-1/2"></div>

        <!-- Líneas de tráfico Arriba -->
        <div class="absolute left-1/2 top-0 flex flex-col -translate-x-1/2">
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
        </div>
        <!-- Líneas de tráfico Abajo -->
        <div class="absolute left-1/2 bottom-0 flex flex-col -translate-x-1/2">
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
            <div class="pedestrian-line"></div>
        </div>
        <!-- Líneas de tráfico Izquierdo -->
        <div class="absolute left-0 top-1/2 flex flex-row -translate-y-1/2">
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
        </div>
        <!-- Líneas de tráfico Derecho -->
        <div class="absolute right-0 top-1/2 flex flex-row -translate-y-1/2">
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
            <div class="pedestrian-line-row"></div>
        </div>

        <!-- Semáforos -->

         <!-- Semaforo 1 -->
        <div class="absolute top-[230px] right-[235px] w-6 h-16 bg-black flex flex-col justify-center items-center rounded-md -translate-x-1/2">
            <div class="light w-4 h-4 mb-1 rounded-full bg-red-500"></div>
            <div class="light w-4 h-4 mb-1 rounded-full bg-gray-500"></div>
            <div class="light w-4 h-4 rounded-full bg-gray-500"></div>
        </div>
        <!-- Semaforo 2 -->
        <div class="absolute bottom-[230px] left-60 w-6 h-16 bg-black flex flex-col justify-center items-center rounded-md">
            <div class="light w-4 h-4 mb-1 rounded-full bg-red-500"></div>
            <div class="light w-4 h-4 mb-1 rounded-full bg-gray-500"></div>
            <div class="light w-4 h-4 rounded-full bg-gray-500"></div>
        </div>
        <!-- Semaforo 3 -->
        <div class="absolute left-[230px] top-60 w-16 h-6 bg-black flex flex-row justify-center items-center rounded-md">
            <div class="light w-4 h-4 mr-1 rounded-full bg-red-500"></div>
            <div class="light w-4 h-4 mr-1 rounded-full bg-gray-500"></div>
            <div class="light w-4 h-4 rounded-full bg-gray-500"></div>
        </div>
        <!-- Semaforo 4 -->
        <div class="absolute right-[230px] bottom-60 w-16 h-6 bg-black flex flex-row justify-center items-center rounded-md">
            <div class="light w-4 h-4 mr-1 rounded-full bg-red-500"></div>
            <div class="light w-4 h-4 mr-1 rounded-full bg-red-500"></div>
            <div class="light w-4 h-4 rounded-full bg-gray-500"></div>
        </div>

        <!-- Vehículos -->
        <div id="car1" class="absolute left-[240px] top-2 w-10 h-14 bg-blue-500 rounded car"></div>
        <div id="car2" class="absolute right-2 top-[240px] w-14 h-10 bg-red-500 rounded car"></div>
        <div id="car3" class="absolute right-[240px] bottom-2 w-10 h-14 bg-green-500 rounded car"></div>
        <div id="car4" class="absolute left-2 bottom-[240px] w-14 h-10 bg-yellow-500 rounded car"></div>
    </div>
</body>
</html>


