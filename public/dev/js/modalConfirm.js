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
    let result = [];

    checkboxes.each(function () {
      result.push({
        value: $(this).val(),
        checked: $(this).is(':checked')
      });
    });

    // Mostrar el resultado
    console.log(JSON.stringify(result, null, 4));

    fn.closeModal()
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
