// import { createYesNoModal } from './confirmAction.js';

function goodWishes() {
  var dom, catchDom, suscribeEvents, events, fn, init

  dom = {}
  catchDom = function () {
    dom.btn = $('#btn')
  }

  suscribeEvents = function () {
    $(document).on('click', '[data-target="send-goodwishes"]', fn.confirm)
    $(document).on('click', '[data-target="cancel-goodwishes"]', fn.cancel)
    $(document).on('keyup', '#mygoodwishes', fn.enableButtonOnInput)
  }

  events = {}
  events.onClickBtn = function () {
  }

  fn = {}

  fn.enableButtonOnInput = function () {
    if ($(this).val().trim() !== '') {
      $('button[data-target="send-goodwishes"]').prop('disabled', false);
    } else {
      $('button[data-target="send-goodwishes"]').prop('disabled', true);
    }
  }

  fn.confirm = function () {
    let data = {}
    data.text = $("#mygoodwishes").val()
    data.token = $("#token").val()
    data.type = 'goodwishes'
    fn.ajax(data)
    console.log('Confirmar')
  }

  fn.cancel = function () {
    console.log('Cancelar')
  }

  fn.ajax = function (data) {
    let html = ''
    window.overlay(true)
    $.ajax({
      url: `${app.urls.base_url}/ajax`,
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (res) {
        console.log(res)
        window.overlay(false)
        // fn.closeModal()
      },
      error: function (res, a) {
        window.overlay(false)
      }
    });

  }


  init = function () {
    catchDom()
    suscribeEvents()
  }

  return init()
}
goodWishes()
