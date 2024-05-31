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
    let modal = $(this).data('target')
    $(`#${modal}`).addClass('active')
    $('body').css('overflow','hidden')
  }

  fn.close = function () {
    let modal = $(this).closest('.modal').attr('id')
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
