

$(document).ready(function () {
  const songNames = suggestedSongs.map(item => item.name);
  console.log('songNames', songNames)

  // $("#autocomplete-input").autocomplete({
  //   source: songNames
  // });


  // $("#autocomplete-input").autocomplete({
  //   source: songNames,
  //   open: function (event, ui) {
  //     // Mostrar las opciones de autocompletado en la consola
  //     console.log("Opciones de autocompletado:", songNames.filter(name => name.toLowerCase().includes($(this).val().toLowerCase())));
  //   }
  // })

  $("#autocomplete-input").autocomplete({
    lookup: songNames,
    onSelect: function (suggestion) {
      alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
    }
  });



});

