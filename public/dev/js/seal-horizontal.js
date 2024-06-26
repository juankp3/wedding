$(document).ready(function () {
  var contenido = $(".image-seal");
  var sobreIzquierdo = $(".envelope1");
  var sobreDerecho = $(".envelope2");

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
  $(".image-seal").click(function(){
    contenido.stop(true)
    $('.tippy-content').hide()
    sobreIzquierdo.animate({ top: "-80%" }, 700);
    sobreDerecho.animate({ bottom: "-60%" }, 700, function(){
      $(".image-seal").fadeOut(900, function(){
        $('body').removeClass('body-envelope')
      });
      $(".envelope-wrapper").toggleClass('blanco', 900);
    });
  })
});

