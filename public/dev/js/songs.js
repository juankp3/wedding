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
      list.prepend(`<li>${name}</li>`)
      $('#autocomplete-input').val('')
    } else {
      $("#autocomplete-input").addClass('--error')
      console.log('No cumple con el formato')
    }
    fn.toggleButtonState()
  }

  fn.valid = function (name) {
    var regex = /^[A-Za-z0-9\sáéíóúÁÉÍÓÚüÜñÑ]+ - [A-Za-z\sáéíóúÁÉÍÓÚüÜñÑ]+$/;
    return (regex.test(name));
  }

  fn.suggestedSongs = function () {
    // const songNames = suggestedSongs.songs.map(item => item.name);
    let selectedSongs = [];
    const songNames = suggestedSongs.songs.map(song => ({
      label: `${song.name} <span class="suggested-count">(sugerido ${song.cant})</span>`,
      value: song.id_songs,
      actualLabel: song.name
      // value: song.id_songs
      // value: song.name
    }));

    $("#autocomplete-input").autocomplete({
      autoFocus: true,
      minLength: 3,
      source: songNames,
      focus: function (event, ui) {
        // $("#autocomplete-input").val('testt');
        $("#autocomplete-input").val(ui.item.actualLabel);
        return false;
      },
      select: function (event, ui) {
        const selectedSong = suggestedSongs.songsbyId[ui.item.value];
        console.log('selectedSong', selectedSong);
        if (!selectedSongs.some(song => song.id_songs === selectedSong.id_songs)) {
          selectedSongs.push(selectedSong);
          fn.add(selectedSong.name);
          // const $listItem = $('<li></li>').text(selectedSong.name);
          // $('#selected-songs').append($listItem);
        }
        console.log(selectedSongs);
        // $('#autocomplete-input').val('');
        setTimeout(() => {
          console.log('Limpia OK');
          $('#autocomplete-input').val('');
        }, 50);

        return false;
      }
    }).autocomplete("instance")._renderItem = function (ul, item) {
      return $("<li>")
        .append("<div>" + item.label + "</div>")
        .appendTo(ul);
    };

    // $("#autocomplete-input").autocomplete({
    //   autoFocus: true,
    //   minLength: 3,
    //   source: songNames,
    //   focus: function (event, ui) {
    //     $("#autocomplete-input").val(ui.item.label.replace(/<[^>]+>/g, ""));
    //     return false;
    //   },
    //   select: function (event, ui) {
    //     const selectedSong = suggestedSongs.songsbyId[ui.item.value];
    //     console.log('selectedSong', selectedSong)
    //     if (!selectedSongs.some(song => song.id_songs === selectedSong.id_songs)) {
    //       selectedSongs.push(selectedSong);
    //       fn.add(selectedSong.name)
    //     }
    //     console.log(selectedSongs)
    //     $('#autocomplete-input').val('');
    //     setTimeout(() => {
    //       console.log('Limpia OK')
    //       $('#autocomplete-input').val('');
    //     }, 50);
    //   },
    // });

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
