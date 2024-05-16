// JavaScript para deshabilitar el zoom
(function () {
  'use strict';

  // Deshabilitar el zoom en dispositivos móviles
  function disableZoom() {
    document.addEventListener('gesturestart', function (event) {
      event.preventDefault();
    });
  }

  disableZoom();
})();
