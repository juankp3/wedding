function modalConfirm() {
  var dom, catchDom, suscribeEvents, events, fn, init

  dom = {}
  catchDom = function () {
    dom.btn = $('#btn')
  }

  suscribeEvents = function () {
    $(document).on('click', '[data-target="confirm"]', fn.confirm)
    $(document).on('click', '[data-target="cancel"]', fn.cancel)
  }

  events = {}
  events.onClickBtn = function () {
  }

  fn = {}
  fn.confirm = function () {
    console.log('asistir')
    let checkboxes = $('input[name="guest_item"]');
    let token = $("#token").val()
    let request = {};
    let result = [];
    checkboxes.each(function () {
      result.push({
        id: $(this).val(),
        status: $(this).is(':checked') ? 1 : 0
      });
    });

    request.token = token
    request.result = result

    fn.ajax(request)
    console.log(JSON.stringify(request, null, 4));
    // fn.closeModal()
  }

  fn.ajax = function(data) {
    window.overlay(true)
    $.ajax({
      url: `${app.urls.base_url}/ajax`,
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function(res) {
        console.log(res)
        window.overlay(false)
      },
      error: function(res, a) {
        window.overlay(false)
      }
    });
  }

  fn.cancel = function () {
    console.log('cancelar')
    fn.closeModal()
    return false
  }

  fn.closeModal = function () {
    console.log('Cierra modalllll')
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
modalConfirm()
