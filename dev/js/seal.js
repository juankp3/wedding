$(document).ready(function () {
  var contenido = $(".image-seal");

  function animacionTamanio() {
    contenido.animate({
      width: "200px",
      height: "200px"
    }, 1000, function () {
      contenido.animate({
        width: "170px",
        height: "170px"
      }, 1000, function () {
        // Llamamos recursivamente a la función para crear un bucle
        animacionTamanio();
      });
    });
  }

  // Iniciar la animación
  animacionTamanio();
});
