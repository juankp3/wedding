

function overlay(flag = false) {
  if (flag) {
    $(".overlay").addClass('overlay__active')
  } else {
    $(".overlay").removeClass('overlay__active')
    console.log('No Mostrar overly')
  }
}
window.overlay = overlay
