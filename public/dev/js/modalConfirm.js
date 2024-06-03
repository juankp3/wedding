function modalConfirm() {
  var dom, catchDom, suscribeEvents, events, fn, init

  dom = {}
  catchDom = function () {
    dom.btn = $('#btn')
  }

  suscribeEvents = function () {
    $(document).on('click', '[data-target="confirm"]', fn.confirm)
    $(document).on('click', '[data-target="cancel"]', fn.cancel)
    $(document).on('click', 'input[name="guest_item"]', fn.check)
  }

  events = {}
  events.onClickBtn = function () {
  }

  fn = {}
  fn.check = function () {
    let checkboxes = $('input[name="guest_item"]');
    let hasChecked = checkboxes.is(':checked');
    if (hasChecked)
      $('button[data-target="confirm"]').prop('disabled', false)
    else
      $('button[data-target="confirm"]').prop('disabled', true)
  }

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
        const html = `<div class="tickets__qr">
						<p class="secondary">Gracias por confirmar tu asistencia</p>
						<p class="small">Por favor presente este codigo QR en la entrada del evento</p>
						<img src="${app.urls.base_url}/uploads/${res.token}.png">
					</div>`
        $(".tickets__body").html(html);
        window.overlay(false)
        fn.closeModal()
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
