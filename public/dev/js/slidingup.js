function _slidingup() {
  var dom, catchDom, suscribeEvents, events, fn, init

  dom = {}
  catchDom = function () {
    dom.btn = $('#goodwishes')
  }

  suscribeEvents = function () {
    // dom.btn.on('click', events.onClickBtn)
    $(document).on('click', '#goodwishes', fn.open)
  }

  events = {}
  events.onClickBtn = function() {
  }

  fn = {}
  fn.open = function (e) {
    console.log('Holaa')
    // $(".goodwishes").slideUp("slow");
    $("#panel").slideDown("slow");
    e.preventDefault()
  }

  init = function () {
    catchDom()
    suscribeEvents()
  }

  return init()
}
_slidingup()
