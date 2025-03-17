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


<div class="relative w-[600px] h-[600px] bg-gray-700 flex flex-wrap">

<!-- Calles Extendidas -->
<div class="absolute top-0 left-1/2 w-[140px] h-full bg-gray-500 -translate-x-1/2"></div>
<div class="absolute left-0 top-1/2 h-[140px] w-full bg-gray-500 -translate-y-1/2"></div>

    <!-- Líneas de tráfico -->
    <?php include "lineas.php"; ?>
    <!-- Semáforos -->
    <?php include "semaforo.php"; ?>

<!-- Vehículos -->
<div id="car1" class="absolute left-[240px] top-2 w-10 h-14 bg-blue-500 rounded car"></div>
<div id="car2" class="absolute right-2 top-[240px] w-14 h-10 bg-red-500 rounded car"></div>
<div id="car3" class="absolute right-[240px] bottom-2 w-10 h-14 bg-green-500 rounded car"></div>
<div id="car4" class="absolute left-2 bottom-[240px] w-14 h-10 bg-yellow-500 rounded car"></div>
</div>