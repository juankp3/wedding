$(document).ready(function () {
    var winStatus = 'all'

    function openModal(event) {
      event.preventDefault();
      const id = $(this).data('id');
      const guest = guestsObject[id]
      console.log('guest', guest)
      let aditionalGuests = findGuestByParentId(id)
      console.log('aditionalguests', aditionalGuests);
      let tr = ''
      aditionalGuests.forEach((element,index) => {
        tr += `<tr>
                <th scope="row">${index+1}</th>
                <td>${element.name}</td>
                <td>${element.confirmation}</td>
              </tr>`
      })
      let tableguest = `<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Acompañante</th>
									<th scope="col">Confirmación</th>
								</tr>
							</thead>
							<tbody>
                  ${tr}
							</tbody>
						</table>`

      $("#exampleModalLabel").html(guest.name)
      $("#confirmation").html(guest.confirmation)
      $("#openinvitation_lastdate").html(guest.openinvitation_lastdate)
      $("#phone").html(guest.phone)
      $("#qyt_tickets").html(guest.qyt_tickets)
      $("#openinvitation_calltoaction").html(guest.openinvitation_calltoaction)
      $("#tableguest").html(tableguest)


    }

      let closeModal = () => {
        let url = `${app.urls.base_url}/code`
        window.history.replaceState(null, null, url);
    }

    let statusGuest = (status) => {
        $("a.js-tab").removeClass('active')
        $(`#${status}`).addClass('active')
        search()
    }

    let allStatus = () => {
        winStatus = 'all'
        statusGuest(winStatus)
    }

    let pendingStatus = () => {
        winStatus = 'pending'
        statusGuest(winStatus)
    }

    let confirmStatus = () => {
        winStatus = 'confirmed'
        statusGuest(winStatus)
    }

    let cancelledStatus = () => {
        winStatus = 'cancelled'
        statusGuest(winStatus)
    }

    let findGuestByToken = (token) => {
      return jsonData.find(guest => guest.token === token);
    }

    let findGuestByParentId = (parentId) => {
      return jsonData.filter(guest => guest.id_guest_parent == parentId);
    }

    let getGuest = () => {
      if (token != '') {
        const guest = findGuestByToken(token)
        $(`#guest_${guest.id_guest}`).click()
        $('#exampleModal').modal('show');
      }
    }

    let load = () => {
        let data = sortGuest(jsonData);
        $.each(data, function (index, guest) {
            $("#content").append(table(index + 1, guest))
        });
        getGuest()
    }

    let sortGuest = (guests) => {
      return guests.sort(function (a, b) {
            return a.name.localeCompare(b.name);
        });
    }

    let fillerGuest = (guests, text) => {
        return $.grep(guests, function (guest) {
            let fullText = `${guest.name} ${guest.parent_name}`
            return fullText.toLowerCase().includes(text.toLowerCase());
        });
    }

    let search = () => {
        $("#content").html('')
        let text = $("#search").val()
        let guestFill  = fillerGuest(jsonData, text)
        let cont = 0
        $.each(guestFill, function (index, guest) {

            if (winStatus == 'all') {
                cont++
                $("#content").append(table(cont, guest))
            }

            if (winStatus == guest.confirmation) {
                cont++
                $("#content").append(table(cont, guest))
            }
        });
    }

    let table = (index, guest) => {
        let tr =  `<tr>
            <th scope="row">
              ${index}
            </th>
            <td>
                <a id="guest_${guest.id_guest}" class="icon-link" data-id="${guest.id_guest}" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    ${guest.name}
                </a>
              <br>
              ${guest.parent_name ? `<span class="secondary" style="font-size: 12px;">${guest.parent_name}</span>` : ''}
            </td>
            <td>
              ${guest.qyt_tickets}
            </td>
            <td>
              <a href="tel:+${guest.phone}" class="icon-link">
                ${guest.phone}
              </a>
            </td>
        </tr>`

        return tr
    }


    $(document).on('click', 'a[data-bs-toggle]', openModal)
    $(document).on('click', 'button.btn-close', closeModal)
    $(document).on('click', '#all', allStatus)
    $(document).on('click', '#pending', pendingStatus)
    $(document).on('click', '#confirmed', confirmStatus)
    $(document).on('click', '#cancelled', cancelledStatus)
    $(document).on('keyup', '#search', search)
    load()
});



