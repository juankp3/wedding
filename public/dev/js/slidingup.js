function _slidingup() {
  var dom, catchDom, suscribeEvents, events, fn, init

  dom = {}
  catchDom = function () {
    dom.btn = $('#goodwishes')
  }

  suscribeEvents = function () {
    // dom.btn.on('click', events.onClickBtn)
    $(document).on('click', '#goodwishes', fn.open)
    $(document).on('click', '#panel a.close', fn.close)
  }

  events = {}
  events.onClickBtn = function() {
  }

  fn = {}
  fn.open = function (e) {
    console.log('Holaa')
    $("#panel").closest('.overlay-panel').addClass('overlay-panel__active')
    $("#panel").slideDown("slow");
    e.preventDefault()
  }

  fn.close = function (e) {
    console.log('close')
    $("#panel").slideUp("slow", function(){

      $("#panel").closest('.overlay-panel').removeClass('overlay-panel__active')
    });
    e.preventDefault()
  }

  init = function () {
    catchDom()
    suscribeEvents()
  }

  return init()
}
_slidingup()
