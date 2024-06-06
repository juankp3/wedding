

function overlay(flag = false) {
  if (flag) {
    $(".overlay").addClass('overlay__active')
  } else {
    $(".overlay").removeClass('overlay__active')
  }
}
window.overlay = overlay
