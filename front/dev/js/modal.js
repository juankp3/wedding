function modal() {
  var dom, catchDom, suscribeEvents, events, fn, init

  dom = {}
  catchDom = function () {
    dom.btn = $('#btn')
  }

  suscribeEvents = function () {
    $(document).on('click', '.popup-maps-show', fn.open)
    $(document).on('click', '.popup-maps-close', fn.close)
  }

  events = {}
  events.onClickBtn = function() {
  }

  fn = {}
  fn.open = function () {
    let modal = $(this).data('modal')
    console.log(modal)
    $(`#${modal}`).addClass('active')
  }

  fn.close = function () {
    let modal = $(this).closest('.popup-maps-bg').attr('id')
    $(`#${modal}`).removeClass('active')
    return false
  }

  init = function () {
    catchDom()
    suscribeEvents()
  }

  return init()
}
modal()