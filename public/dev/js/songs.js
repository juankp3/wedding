function songs() {
  var suscribeEvents, fn, init

  suscribeEvents = function () {
    console.log('init - songs')
    $(document).on('change', '#autocomplete-input', fn.changeInput)
    $(document).on('click', '#sendSongs', fn.send)
    fn.suggestedSongs()
  }

  fn = {}
  fn.changeInput = function () {
    let text = $(this).val()
    fn.add(text)
  }

  fn.add = function (name) {
    let list = $("#songs-list")

    if (fn.valid(name)) {
      $("#autocomplete-input").removeClass('--error')
      list.prepend(`<li>${name}<input type="hidden"></li>`)
      $('#autocomplete-input').val('')
    } else {
      $("#autocomplete-input").addClass('--error')
      console.log('No cumple con el formato')
    }
    fn.toggleButtonState()
  }

  fn.valid = function (name) {
    var regex = /^[A-Za-z0-9\s]+ - [A-Za-z\s]+$/;
    return (regex.test(name));
  }

  fn.suggestedSongs = function () {
    const songNames = suggestedSongs.map(item => item.name);
    $("#autocomplete-input").autocomplete({
      autoFocus: true,
      minLength: 3,
      source: songNames,
      select: function (event, ui) {
        let text = ui.item.value
        fn.add(text)
      },
      close: function (event, ui) {
        $('#autocomplete-input').val('')
      }
    });
  }

  fn.toggleButtonState = function () {
    var hasInput = $('#songs-list input').length > 0;

    if (hasInput) {
      $('#sendSongs').prop('disabled', false)
    } else {
      $('#sendSongs').prop('disabled', true)
    }
  }

  fn.send = function () {
    window.createYesNoModal(
      '¿Estás seguro de enviar estas canciones?',
      function () {
        // fn.ajax(data)
        console.log('Yesss')
      }
    );
  }

  init = function () {
    suscribeEvents()
  }

  return init()
}
songs()
