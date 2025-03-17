<script>
document.addEventListener("DOMContentLoaded", function () {

function changeLight(state, light) {
    let nextTime;

    if (state === "red") {
        nextState = "green";
        nextTime = 5000; // Verde en 3 segundos
    } else if (state === "green") {
        nextState = "yellow";
        nextTime = 2000; // Amarillo en 2 segundos
    } else {
        nextState = "red";
        nextTime = 5000; // Rojo en 5 segundos
    }

    // Cambiar color en la interfaz
    document.querySelectorAll(".light1").forEach(el => {
        el.classList.remove("bg-red-500", "bg-green-500", "bg-yellow-500");
        el.classList.add(nextState === "red" ? "bg-red-500" : nextState === "yellow" ? "bg-yellow-500" : "bg-green-500");
    });

                // Movimiento de los autos si el semáforo está en verde
                if ( nextState === "green") {
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

    // Llamar a la función nuevamente con el nuevo tiempo
    setTimeout(() => changeLight(nextState), nextTime);
}

// Iniciar el semáforo
changeLight("red",".light1");


            setInterval(() => {
                state = state === "red" ? "green" : "red";
                state === "red" ? console.log("Semáforo en rojo") : console.log("Semáforo en verde");

                document.querySelectorAll(".light1").forEach(el => {
                    el.classList.remove("bg-red-500", "bg-green-500", "bg-yellow-500", "bg-gray-500");

                    let newColor;
                    if (state === "red") newColor = "bg-red-500";
                    else if (state === "yellow") newColor = "bg-yellow-500";
                    else newColor = "bg-green-500";

                    el.classList.add(newColor);
                });

                document.querySelectorAll(".light2").forEach(el => {
                    el.classList.remove("bg-red-500", "bg-green-500", "bg-gray-500");
                    el.classList.add(state === "red" ? "bg-red-500" : "bg-green-500");
                });

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
            }, 5000);
        });
</script>

<!-- Semaforo 1 -->
<div class="absolute bottom-[372px] left-[205px] w-6 h-16 bg-black flex flex-col justify-center items-center rounded-md">
   <div id='light11' class="light1 w-4 h-4 mb-1 rounded-full bg-gray-500"></div>
   <div id='light12' class="light1 w-4 h-4 mb-1 rounded-full bg-gray-500"></div>
   <div id='light13' class="light1 w-4 h-4 rounded-full bg-gray-500"></div>
</div>
<!-- Semaforo 2 -->
<div class="absolute left-[372px] top-[200px] w-16 h-6 bg-black flex flex-row justify-center items-center rounded-md">
   <div id='light' class="light2 w-4 h-4 mr-1 rounded-full bg-gray-500"></div>
   <div id='light' class="light2 w-4 h-4 mr-1 rounded-full bg-gray-500"></div>
   <div id='light' class="light2 w-4 h-4 rounded-full bg-gray-500"></div>
</div>
<!-- Semaforo 3 -->
<div class="absolute right-[372px] bottom-[200px] w-16 h-6 bg-black flex flex-row justify-center items-center rounded-md">
   <div id='light3' class=" w-4 h-4 mr-1 rounded-full bg-gray-500"></div>
   <div id='light3' class=" w-4 h-4 mr-1 rounded-full bg-gray-500"></div>
   <div id='light3' class=" w-4 h-4 rounded-full bg-gray-500"></div>
</div>
<!-- Semaforo 4 -->
<div class="absolute top-[372px] right-[190px] w-6 h-16 bg-black flex flex-col justify-center items-center rounded-md -translate-x-1/2">
   <div class="light w-4 h-4 mb-1 rounded-full bg-red-500"></div>
   <div class="light w-4 h-4 mb-1 rounded-full bg-gray-500"></div>
   <div class="light w-4 h-4 rounded-full bg-gray-500"></div>
</div>
