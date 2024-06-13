function wishes() {
  var dom, catchDom, suscribeEvents, events, fn, init

  dom = {}
  catchDom = function () {
    dom.btn = $('#btn')
  }

  suscribeEvents = function () {
    $(document).on('click', '.ct-avatar', fn.update)
  }

  fn = {}
  fn.update = function () {
    let id = $(this).data('id');
    let active = $(this).hasClass('active') ? 0 : 1;
    let object = $(this);

    $.ajax({
      url: `${app.urls.base_url}/dashboard/wishes/ajax`,
      type: 'POST',
      data: {
        id : id,
        active, active
      },
      dataType: 'json',
      success: function (res) {
        console.log(res.active)
        if (res.active == 1 ) {
          object.addClass('active')
          console.log('agrega')
        }else{
          object.removeClass('active')
          console.log('quita')
        }
      },
      error: function (res, a) {
      }
    });
  }

  fn.ajax = function(data) {
    $.ajax({
      url: `${app.urls.base_url}/dashboard/wishes/ajax`,
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function(res) {
        console.log(res)
      },
      error: function(res, a) {
      }
    });
  }

  init = function () {
    catchDom()
    suscribeEvents()
  }

  return init()
}
wishes()
