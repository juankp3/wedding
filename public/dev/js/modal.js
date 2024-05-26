function modal() {
  var dom, catchDom, suscribeEvents, events, fn, init

  dom = {}
  catchDom = function () {
    dom.btn = $('#btn')
  }

  suscribeEvents = function () {
    $(document).on('click', '[data-toggle="modal"]', fn.open)
    $(document).on('click', '.modal__close', fn.close)
  }

  events = {}
  events.onClickBtn = function () {
  }

  fn = {}
  fn.open = function () {
    console.log('es modal XD')
    let modal = $(this).data('target')
    $(`#${modal}`).addClass('active')
    $('body').css('overflow','hidden')
  }

  fn.close = function () {
    console.log('cierra modal')
    let modal = $(this).closest('.modal').attr('id')
    console.log('id', modal)
    $(`#${modal}`).removeClass('active')
    $('body').css('overflow', '')
    return false
  }

  init = function () {
    catchDom()
    suscribeEvents()
  }

  return init()
}
modal()
