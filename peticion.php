<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="prin.css">
</head>
<body>
<header class="header">
    <img src="img/yoguernaut.png" alt="Logo Izquierdo" class="logo-left">
    
    <nav class="nav-links">
      <a href="#">Misión y Visión</a>
      <a href="#">Convenios</a>
      <a href="#">Contacto</a>
      <a href="#">Acerca de</a>

    </nav>
  
  </header>
  
  <div class="movlog-container">
    <img src="img/image.png" alt="Logo" class="movlog">
</div>
<div class="main-content">
<div class="vacio">
  <img src="img/empty.png" alt="Imagen descriptiva">

</div>
<div class="contenedor-movil">
    <img src="img/empty.png" alt="Imagen centrada" class="imagen-centrada">
</div>



<div id="mySidenav" class="sidenav">
    <div>
      <div class="user-view">
        <a href="#user"><img class="circle" src="img/j.jpg" height="80px" width="80px"></a>
        <a href="#name"><span class="name">Usuario</span></a>
        <a href="#email"><span class="email">Empresa/Socio</span></a>
      </div>
      <a href="#">inicio de sesión</a>
      <a href="#">Empresas</a>
      <a href="#">Centros de ayuda</a>
      <a href="#">Subir petición/recursos</a>
      <a href="#">Misión y Visión</a>
    </div>
  
    <!-- FOOTER CON VIDEO -->
    <div class="foter">
      <video id="logoVideo" class="logo-video" src="img/tunas.mp4" muted width="300px" height="200px"></video>
    </div>
  
    <!-- APARTADO DE ANUNCIOS -->
    <div class="ads">
      <img src="img/ad1.jpg" alt="Ad 1" />
      <img src="img/ad2.jpg" alt="Ad 2" />
    </div>
  
    <!-- BOTÓN DE CIERRE -->
    <button class="closebtn" onclick="closeNav()">
      <img src="img/beteglow.png" width="150px" height="75px" />
    </button>
  </div>
  
  
  <span id="openBtn" class="btnopen" onclick="openNav()"><img src="img/beteglow.png"  width="150px" height="75px"></span>
  
</div>

<!-- Footer -->
<div class="footer">
  <div class="logo-container">
    <div class="logo-track">
      <div class="footer">
        <div class="logo-container">
          <div class="logo-track">
         
          </div>
        </div>
      </div>
      
     
    </div>
  </div>
  <img src="img/ercoout.png" alt="" class="logo-empresa">
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let anchoAnterior = window.innerWidth;

    function ajustarFooter() {
        const footer = document.querySelector(".footer");
        const body = document.body;
        const html = document.documentElement;

        // Altura total del contenido
        const alturaContenido = Math.max(
            body.scrollHeight, 
            body.offsetHeight, 
            html.clientHeight, 
            html.scrollHeight, 
            html.offsetHeight
        );

        // Altura visible del viewport
        const alturaViewport = window.innerHeight;

        // Diferencia entre el contenido y el viewport (si se puede scrollear al menos 50px)
        const scrollDisponible = alturaContenido - alturaViewport;

        // Si hay suficiente contenido para hacer scroll, cambia a sticky
        if (scrollDisponible > 50) {
            if (footer.style.position !== "sticky") {
                footer.style.position = "sticky"; // Cambiar a sticky
                footer.style.bottom = "0";
            }
        } else {
            // Si no, mantener en fixed
            if (footer.style.position !== "fixed") {
                footer.style.position = "fixed"; // Cambiar a fixed
                footer.style.bottom = "0";
            }
        }
    }

    function detectarCambioAncho() {
        let anchoActual = window.innerWidth;

        if (anchoActual !== anchoAnterior) {
            anchoAnterior = anchoActual;
            setTimeout(ajustarFooter, 100); // Pequeño retraso para evitar bugs en la transición
        }
    }

    // Ejecutar al cargar y cuando cambie el tamaño de la ventana o la orientación
    ajustarFooter();
    window.addEventListener("resize", detectarCambioAncho);
});


document.addEventListener("DOMContentLoaded", function() {
  const logoTrack = document.querySelector('.logo-track');
  const totalLogos = 5; // Número de logos originales
  const totalDuplication = 10; // Número de veces que duplicamos los logos para llenar el espacio

  // Crear los logos y agregarlos al contenedor
  for (let i = 1; i <= totalLogos; i++) {
    const logo = document.createElement('img');
    logo.src = `img/logo${i}.jpg`; // Asegúrate de que la ruta de los logos sea correcta
    logo.alt = `Logo ${i}`;
    logoTrack.appendChild(logo);
  }

  // Duplicar los logos varias veces para llenar el espacio
  for (let i = 1; i <= totalDuplication; i++) {
    for (let j = 1; j <= totalLogos; j++) {
      const logoClone = document.createElement('img');
      logoClone.src = `img/logo${j}.jpg`; // Asegúrate de que la ruta de los logos sea correcta
      logoClone.alt = `Logo ${j}`;
      logoTrack.appendChild(logoClone);
    }
  }
});
  function openNav() {
  let sidenav = document.getElementById("mySidenav");
  let closeBtn = document.getElementById("closeBtn");

  sidenav.style.width = "300px";
  sidenav.classList.add("open");
  sidenav.classList.remove("closing"); // Aseguramos que no tenga la clase de cierre
  document.getElementById("openBtn").style.display = "none"; // Ocultamos el botón de abrir

  // Reproducir el video y detenerlo al final
  let video = document.getElementById("logoVideo");
  video.currentTime = 0; // Reiniciar video cada vez que se abre
  video.play();
  
  video.onended = function() {
    video.currentTime = video.duration; // Mantiene el último frame
  };
}

function closeNav() {
  let sidenav = document.getElementById("mySidenav");
  let closeBtn = document.getElementById("closeBtn");

  sidenav.classList.add("closing"); // Agregamos la clase para animar el cierre

  setTimeout(function () {
    sidenav.style.width = "0";
    sidenav.classList.remove("open");
    sidenav.classList.remove("closing"); // Quitamos la clase para que se pueda volver a abrir
    document.getElementById("openBtn").style.display = "block"; // Mostramos el botón de abrir
  }, 400); // Esperamos a que termine la animación antes de cerrar completamente
}

</script>

</body>
</html>