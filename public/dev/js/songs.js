window.selectedSongs = []
function songs() {
  var suscribeEvents, fn, init

  suscribeEvents = function () {
    $(document).on('click', '#sendSongs', fn.send)
    $(document).on('click', '#add-song', fn.addSong)
    $(document).on('click', '#songs-list li span', fn.remove)
    $(document).on('keyup', '#autocomplete-input', fn.input)
    fn.suggestedSongs()
  }

  fn = {}

  fn.input = function (event) {
    if (event.which == 13)
      fn.addSong()
  }

  fn.getJSON = function () {
    return window.selectedSongs
  }

  fn.addJSON = function (songObject) {
    window.selectedSongs.push(songObject)
    $('#autocomplete-input').val('');
    fn.renderList()
  }
  fn.removeJSON = function (key) {
    fn.getJSON().forEach((item, index) => {
      if (index === key) {
        delete window.selectedSongs[index];
      }
    });
    window.selectedSongs = window.selectedSongs.filter(item => item !== undefined);
    fn.renderList()
  }

  fn.addSong = function () {
    let text = $("#autocomplete-input").val()
    if (fn.valid(text)) {
      $("#autocomplete-input").removeClass('--error')
      fn.addJSON({
        id_songs: 0,
        name: text,
        cant: "0"
      })
    } else {
      $("#autocomplete-input").addClass('--error')
      console.log('No cumple con el formato')
    }
  }

  fn.remove = function () {
    let id = parseInt($(this).closest('li').attr('id'))
    fn.removeJSON(id)
  }

  fn.renderList = function () {
    const container = $("#songs-list")
    container.html('')
    fn.getJSON().forEach((element, index) => {
      container.prepend(`<li id="${index}">${element.name}<span class="after-element">x</span></li>`)
    });
    fn.toggleButtonState()
  }

  fn.valid = function (name) {
    var regex = /^[A-Za-z0-9\sáéíóúÁÉÍÓÚüÜñÑ]+ - [A-Za-z\sáéíóúÁÉÍÓÚüÜñÑ]+$/;
    return (regex.test(name));
  }

  fn.suggestedSongs = function () {
    const songNames = suggestedSongs.songs.map(song => ({
      label: `${song.name} ${song.cant > 0 ? `<span class="suggested-count">(sugerido ${song.cant}  ${song.cant > 1 ? 'veces' : 'vez'} )</span>` : ''}`,
      value: song.id_songs,
      actualLabel: song.name
    }));

    $("#autocomplete-input").autocomplete({
      autoFocus: true,
      minLength: 3,
      source: songNames,
      focus: function (event, ui) {
        return false;
      },
      select: function (event, ui) {
        const selectedSong = suggestedSongs.songsbyId[ui.item.value];
        if (!fn.getJSON().some(song => song.id_songs === selectedSong.id_songs)) {
          fn.addJSON(selectedSong)
        }
        setTimeout(() => {
          $('#autocomplete-input').val('');
        }, 50);

        return false;
      }
    }).autocomplete("instance")._renderItem = function (ul, item) {
      return $("<li>")
        .append("<div>" + item.label + "</div>")
        .appendTo(ul);
    };
  }

  fn.toggleButtonState = function () {
    var hasInput = fn.getJSON().length > 0;

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
        console.log('songs', fn.getJSON())


        $.ajax({
          url: `${app.urls.base_url}/ajax`,
          type: 'POST',
          data: {
            type: 'songs',
            token: $("#token").val(),
            songs: fn.getJSON(),
          },
          dataType: 'json',
          success: function(res) {
            console.log(res)
            // window.overlay(false)
            // fn.closeModal()
          },
          error: function(res, a) {
            window.overlay(false)
            fn.closeModal()
          }
        });

      }
    );
  }

  fn.closeModal = function () {
    $(`.modal`).removeClass('active')
    $('body').css('overflow', '')
    return false
  }

  init = function () {
    suscribeEvents()
  }

  return init()
}
songs()
