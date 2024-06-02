$(document).ready(function () {
  function disableZoom() {
    document.addEventListener('gesturestart', function (event) {
      event.preventDefault();
    });
  }
  disableZoom();
});

