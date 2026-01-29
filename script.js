// Primera ventana emergente con cuenta regresiva
let countdown = 5;
const countdownElement = document.getElementById("countdown");


function startCountdown() {
    let interval = setInterval(() => {
        countdown--;
        countdownElement.textContent = countdown;
        if (countdown <= 0) {
            clearInterval(interval);
            document.getElementById("popup1").style.display = "none"; // Oculta PopUp1
            showPopup2(); // Muestra PopUp2 si la contraseña no está guardada
        }
    }, 1000);
}

startCountdown();

// Función para abrir la semana en una nueva página
function openWeek(weekNumber) {
    window.open(`semana${weekNumber}.html`, "_blank");
}

