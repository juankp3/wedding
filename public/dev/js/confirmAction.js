function createYesNoModal(message, yesCallback) {
  const modalHtml = `
        <div id="confirm__action" class="modal modal__small">
          <div class="modal__container">
            <div class="modal__header">
              <h2>Confirmación</h2>
            </div>
            <div class="modal__body modal__body--center">
              <p>${message}</p>
            </div>
            <div class="modal__footer">
              <button id="noBtn" class="button" data-target="not">
                No
              </button>
              <button id="yesBtn" class="button button__primary" data-target="yes">
                Sí
              </button>
            </div>
          </div>
        </div>
    `;

  $('body').append(modalHtml);

  const $modal = $('#confirm__action');
  const $closeBtn = $modal.find('.close');
  const $yesBtn = $modal.find('#yesBtn');
  const $noBtn = $modal.find('#noBtn');

  $modal.css('display', 'flex');

  $closeBtn.click(function () {
    $modal.remove();
  });

  $noBtn.click(function () {
    $modal.remove();
  });

  $yesBtn.click(function () {
    $modal.remove();
    if (typeof yesCallback === 'function') {
      yesCallback();
    }
  });

  // $(window).click(function (event) {
  //   if (event.target === $modal[0]) {
  //     $modal.remove();
  //   }
  // });
}

window.createYesNoModal = createYesNoModal
