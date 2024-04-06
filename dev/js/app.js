var jsonData = {}
function loadData() {
  $.getJSON('./dist/js/data.json', function (data) {
    jsonData = data;
    setCouple();
    setParents()
  });
}

function setCouple() {
  let couple = jsonData.couple;
  $('#boyfriend').text(couple.boyfriend)
  $('#bride').text(couple.bride)
  $('#imageCouple').attr('src', couple.image);
  $('#versiculo').text(couple.versiculo);
  $('#capitulo').text(couple.capitulo);
}

function setParents() {
  let paretns = jsonData.parents;
  let html = ''
  $.each(paretns, function (key, value) {
    html+= `<div class="parents--name">
      <b>${value.label}</b>`
    $.each(value.names, function (key, fullname) {
      html += `<p>${fullname}</p>`
    })
    html+=`</div>`
  });
  $(".parents-info").html(html)
}

$(document).ready(function () {
  loadData();
});
