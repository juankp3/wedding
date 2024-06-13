function confirmModal(message, yesCallback) {
  const modalHtml = `
        <div id="confirm__modal" class="modal modal__small">
          <div class="modal__container">
            <div class="modal__header">
              <h2>¡Gracias!</h2>
            </div>
            <div class="modal__body modal__body--center">
              <p>${message}</p>
            </div>
            <div class="modal__footer">
              <button id="okBtn" class="button button__primary" data-target="yes">
                OK
              </button>
            </div>
          </div>
        </div>
    `;

  $('body').append(modalHtml);

  const $modal = $('#confirm__modal');
  const $closeBtn = $modal.find('.close');
  const $okBtn = $modal.find('#okBtn');

  $modal.css('display', 'flex');

  $closeBtn.click(function () {
    $modal.remove();
  });

  $okBtn.click(function () {
    $modal.remove();
    if (typeof yesCallback === 'function') {
      yesCallback();
    }
  });


}

window.confirmModal = confirmModal

// window.confirmModal(
//   'Hola mundo',
//   function () {
//   }
// );

// window.confirmModal('Hola mundo',{});
