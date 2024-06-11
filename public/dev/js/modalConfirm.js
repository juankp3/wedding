// import { createYesNoModal } from './confirmAction.js';

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

  fn.getTicketData = function () {
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
    return request
  }

  fn.confirm = function () {
    let data = fn.getTicketData()
    data.type = 'confirm'
    window.createYesNoModal(
      '¿Estás seguro que los <b>seleccionados asistirán</b> a nuestro matrimonio?',
      function(){
        fn.ajax(data)
        console.log('Yesss')
      }
    );
  }

  fn.cancel = function () {
    let data = fn.getTicketData()
    data.type = 'cancel'
    window.createYesNoModal(
      '¿Estás seguro de que <b>no podrás</b> asistir a nuestro matrimonio?',
      function () {
        fn.ajax(data)
      }
    );
  }

  fn.ajax = function(data) {
    let html = ''
    window.overlay(true)
    $.ajax({
      url: `${app.urls.base_url}/ajax`,
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function(res) {
        if (data.type == 'confirm') {
          html = `<div class="tickets__qr">
						<p class="secondary">${titleConfirm}</p>
						<p class="small">${descriptionConfirm}</p>
						<p class="small">${descriptionConfirmQR}</p>
            <img src="${app.urls.base_url}/uploads/${res.token}.png">
					</div>`
        }
        if (data.type == 'cancel') {
          html = `<div class="tickets__cancelmsj">
						        <p class="secondary">${descriptionCancel}</p>
                    <a href="#gifts">${anchorAccouts}</a>
					        </div>`
        }
        $(".tickets__body").html(html);
        window.overlay(false)
        fn.closeModal()
      },
      error: function(res, a) {
        window.overlay(false)
      }
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
modalConfirm()
