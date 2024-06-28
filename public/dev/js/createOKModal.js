function createOKModal(message, yesCallback) {
  const modalHtml = `
        <div id="confirm__action" class="modal modal__small">
          <div class="modal__container">
            <div class="modal__header">
              <h2>Gracias</h2>
            </div>
            <div class="modal__body modal__body--center">
              <p>${message}</p>
            </div>
            <div class="modal__footer">
              <button id="btnOK" class="button button__primary" data-target="yes">
                OK
              </button>
            </div>
          </div>
        </div>
    `;

  $('body').append(modalHtml);

  const $modal = $('#confirm__action');
  const $closeBtn = $modal.find('.close');
  const $btnOK = $modal.find('#btnOK');

  $modal.css('display', 'flex');

  $closeBtn.click(function () {
    $modal.remove();
  });


  $btnOK.click(function () {
    $modal.remove();
    if (typeof yesCallback === 'function') {
      yesCallback();
    }
  });
}

window.createOKModal = createOKModal
