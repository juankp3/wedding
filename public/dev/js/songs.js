function songs() {
  var suscribeEvents, fn, init

  suscribeEvents = function () {
    console.log('init - songs')
    $(document).on('change', '#autocomplete-input', fn.changeInput)
    fn.suggestedSongs()
  }

  fn = {}
  fn.changeInput = function () {
    let text = $(this).val()
    fn.add(text)
  }

  fn.add = function (name) {
    let list = $("#songs-list")
    list.append(`<li>${name}</li>`)
    $('#autocomplete-input').val('')
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

  init = function () {
    suscribeEvents()
  }

  return init()
}
songs()
