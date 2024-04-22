$(document).ready(function () {
  var audio = document.getElementById("music");
  var button = $("#toggleButton");

  button.click(function () {
    if (audio.paused) {
      audio.play();
      // button.text("Pausar");
    } else {
      audio.pause();
      // button.text("Reproducir");
    }
  });
});
