$(document).ready(function () {
  console.log('disableZoom')
  function disableZoom() {
    document.addEventListener('gesturestart', function (event) {
      event.preventDefault();
    });
  }

  disableZoom();
});

