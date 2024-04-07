var jsonData;
function loadData(file) {
  $.getJSON(`./dist/js/${file}`, function (data) {
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
  $('.couple-verse').find('p').text(couple.verse);
  $('.couple-chapter').find('p').text(couple.chapter);
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
  loadData('data.json');

  console.log(jsonData)
  if (typeof jsonData === 'undefined') {
    console.log('aaa')
    loadData('data.example.json');
  }

});
