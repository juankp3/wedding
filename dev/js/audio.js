$(document).ready(function () {
  var audio = document.getElementById("music");
  var button = $("#toggleButton");

  button.click(function () {
    if (audio.paused) {
      audio.play();
      button.addClass('active');
    } else {
      audio.pause();
      button.removeClass('active');
    }
  });
});
