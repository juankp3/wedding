$(document).ready(function () {
    var winStatus = 'all'

    let openModal = () => {
        const data = $(this).data()
        $("#exampleModalLabel").html(data.name)
        console.log('data', data.name)
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

    let load = () => {
        let data = sortGuest(jsonData);
        $.each(data, function (index, guest) {
            $("#content").append(table(index + 1, guest))
        });
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
                <a class="icon-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    $(document).on('click', '#all', allStatus)
    $(document).on('click', '#pending', pendingStatus)
    $(document).on('click', '#confirmed', confirmStatus)
    $(document).on('click', '#cancelled', cancelledStatus)
    $(document).on('keyup', '#search', search)
    load()
});



