export class Couple {

  renderCouple(couple) {
    return `
    <div class="couple-names">
        <p>Nuestra Boda</p>
        <h1>${couple.bride}</h1>
        <p class="--y">&</p>
        <h1>${couple.boyfriend}</h1>
      </div>
      ${this.renderMusic()}
      ${this.renderBody(couple)}` ;
  }

  renderMusic() {
    return `
    <div class="couple-audio">
      <p>Escucha nuestra canción</p>
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

  test(){
    return 'Hola';
  }



}