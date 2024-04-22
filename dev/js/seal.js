$(document).ready(function () {
  var contenido = $(".image-seal");

  function animacionTamanio() {
    contenido.animate({
      width: "180px",
      height: "180px"
    }, 1000, function () {
      contenido.animate({
        width: "150px",
        height: "150px"
      }, 1000, function () {
        // Llamamos recursivamente a la función para crear un bucle
        animacionTamanio();
      });
    });
  }

  // Iniciar la animación
  animacionTamanio();
});
