document.addEventListener('DOMContentLoaded', function () {
  var miAudio = document.getElementById('miAudio');
  var segundosAEsperar = 40; // Cambia esto al segundo que desees
  var botonReproducir = document.getElementById('reproducirBtn');

  botonReproducir.addEventListener('click', function () {
    miAudio.currentTime = segundosAEsperar;
    miAudio.play();
  });
});
