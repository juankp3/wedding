export class Modal {

  renderModal() {
    return `
    <div class="popup-maps-bg">
      <div class="popup-maps-content">
        <div class="map-header">
          <h1>Basilica Maria Auxiliadora</h1>
          <a href="#" class="popup-maps-close">
            <i class="fa-solid fa-xmark"></i>
          </a>
        </div>
        <hr>
        <div class="map-body">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.744031022648!2d-77.04327554820283!3d-12.061124743398315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c2e2890d21%3A0x39a097d3a3566caa!2sBas%C3%ADlica%20Mar%C3%ADa%20Auxiliadora!5e0!3m2!1ses-419!2spe!4v1714261162731!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>`;
  }
}
