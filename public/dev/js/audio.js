$(document).ready(function () {
  var audio = document.getElementById("music");
  var button = $(".toggleButton");
  audio.currentTime = 20;
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
