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
    fn.hover()
  }

  events = {}
  events.onClickBtn = function() {
  }

  fn = {}
  fn.open = function (e) {
    console.log('Holaa')
    $("#panel").closest('.overlay-panel').addClass('overlay-panel__active')
    $('.btn_start').removeClass('btn_start__selected')
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

  fn.hover = function (e) {
    $('.btn_start').on('mouseover', function () {
      var value = $(this).data('value');
      console.log('value', value)
      $('.btn_start').each(function () {
        if ($(this).data('value') <= value) {
          $(this).addClass('btn_start__active');
        } else {
          $(this).removeClass('btn_start__active');
        }
      });
    });

    $('.btn_start').on('mouseout', function () {
      $('.btn_start').removeClass('btn_start__active');
    });

    $('.btn_start').on('click', function (event) {
      var value = $(this).data('value');
      $('.btn_start').each(function () {
        if ($(this).data('value') <= value) {
          $(this).addClass('btn_start__selected');
        } else {
          $(this).removeClass('btn_start__selected');
        }
      });

      window.createOKModal(
        'Tu opinión nos ayuda a mejorar',
        function () {
          // fn.ajax(data)
          console.log('Yesss')
          fn.closeModal()
          $("#panel").closest('.overlay-panel').removeClass('overlay-panel__active')
        }
      );
      event.preventDefault()
    });
  }

  fn.closeModal = function () {
    $(`.modal`).removeClass('active')
    $('body').css('overflow', '')
    return false
  }

  init = function () {
    catchDom()
    suscribeEvents()
  }

  return init()
}
_slidingup()
