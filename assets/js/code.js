$(document).ready(function () {
    console.log("ready!");

    let openModal = () => {
        const data = $(this).data()
        $("#exampleModalLabel").html(data.name)
        console.log('data', data.name)
    }

    let statusGuest = () => {
        $(".nav-link").removeClass('active')
        $(this).addClass('active')
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
        let text = $("#search").val()
        $("#content").html('')
        let guestFill  = fillerGuest(jsonData, text)
        $.each(guestFill, function (index, guest) {
            $("#content").append(table(index + 1, guest))
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
    $(document).on('click', '.nav-link', statusGuest)
    $(document).on('keyup', '#search', search)


    load()
});



