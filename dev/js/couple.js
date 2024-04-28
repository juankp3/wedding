export class Couple {

  renderCouple(couple) {
    return `
    <div class="couple-names">
        <p>Nuestra Boda</p>
        <h1>${couple.bride}</h1>
        <p class="--y">&</p>
        <h1>${couple.boyfriend}</h1>
      </div>
      ${this.renderBody(couple)}` ;
    // return `
    // <div class="couple-names">
    //     <p>Nuestra Boda</p>
    //     <h1>${couple.bride}</h1>
    //     <p class="--y">&</p>
    //     <h1>${couple.boyfriend}</h1>
    //   </div>
    //   ${this.renderMusic()}
    //   ${this.renderBody(couple)}` ;
  }

  renderMusic() {
    return `
    <div class="couple-audio">
      <p>Escucha nuestra canción</p>
      <button id="reproducirBtn">x</button>
      <audio id="music" controls>
        <source src="dist/mp3/perfecta.mp3" type="audio/mpeg">
        Tu navegador no soporta el elemento de audio.
      </audio>
    </div>
    `;
  }

  renderBody(couple) {
    return `
    <div class="couple-image --box">
      <img src="${couple.image}">
    </div>
    <div class="couple-verse --box">
      <p>${couple.verse}</p>
    </div>
    <div class="couple-chapter --box">
      <p>${couple.chapter}</p>
    </div>
    `;
  }

  renderWeddingDate(weddingDate) {
    return `
      <h3>¡Nos Casamos!</h3>
      <p>${weddingDate.day} de ${weddingDate.month} ${weddingDate.year}</p>
      <button>
        <i class="fa-regular fa-calendar-plus"></i>
        <p>Agregar a Calendario</p>
      </button>
    `;
  }

  renderParents(paretns) {
    let html = ''
    $.each(paretns, function (key, value) {
      html += `<div class="parents--name">
        <b>${value.label}</b>`
      $.each(value.names, function (key, fullname) {
        html += `<p>${fullname}</p>`
      })
      html += `</div>`
    });
    return html
  }

  renderLocation(itinerary) {
    let html = ''
    html += `<h3>Ubicaciones</h3>`
    $.each(itinerary, function (key, value) {
      html += `<div class="locations-group">
      <b>${value.title}</b>
      <p>${value.hour}</p>        
      <img src="${value.locationimg}">
      <p class="title-place">${value.locationname}</p>
      <p class="descrip-place">${value.locationaddress}</p>
      <button class="popup-maps-show">
        <i class="fa-solid ${value.locationiconbtn}"></i>
        <p>${value.locationtxtbtn}</p>
      </button>
      </div>`
    });
    return html
  }
  
  renderGifts(gifts) {
    let html = ''
    html += `<img class="svg" src="${gifts.icon}" />
             <h3>${gifts.title}</h3>
             <p>${gifts.description}</p>
             <p class="phrase">${gifts.phrase}</p>
             <div class="gifts-accounts">`
              $.each(gifts['bank-account'], function (key, value) {
                html += `<div class="account--group">
                          <b>${value.bank}</b>
                          <p>${value.account}</p>
                          <p>${value.cci}</p>
                          <p>${value.owner}</p>
                        </div>`
              });
    html += `</div>`
    return html
  }


  test(){
    return 'Hola';
  }


}