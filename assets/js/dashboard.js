let dateStart = getFirstDayOfTheMonth('dd/mm/yyyy')
let dateEnd = getToday('dd/mm/yyyy')


function getToday(format) {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10)
        dd = '0' + dd;

    if (mm < 10)
        mm = '0' + mm;

    if (format == 'dd/mm/yyyy')
        return `${dd}-${mm}-${yyyy}`

    if (format == 'yyyy/mm/dd')
        return `${yyyy}-${mm}-${dd}`
}

function getFirstDayOfTheMonth(format) {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10)
        dd = '0' + dd;

    if (mm < 10)
        mm = '0' + mm;

    if (format == 'dd/mm/yyyy')
        return `01-${mm}-${yyyy}`

    if (format == 'yyyy/mm/dd')
        return `${yyyy}-${mm}-01`
}

function load(dateStart, dateEnd) {
    $.ajax({
        url: './dashboard/ajax',
        type: 'POST',
        data: { dateStart, dateEnd },
        dataType: 'json',
        beforeSend: function() {
            $("#table").html('')
            $("#table").html(`<tr>
                <td colspan="4" style="text-align: center;">
                    <div class="spinner-border" role="status" style="display: inline-block;>
                        <span class="visually-hidden"></span>
                    </div>
                </td>
            </tr>`)
        },
        success: function(res) {
            let tr = ''
            $.each(res.invoices, function(i, item) {
                tr += `<tr>
                    <td><a href="#">${item.display_name}</a></td>
                    <td><time datetime="${item.date}">${item.date}</time></td>
                    <td>${res.currency} ${item.amount}</td>
                    <td>
                        <span class="badge bg-success">Pagado</span>
                    </td>
                </tr>`
            })
            $("#table").html('')
            $("#table").append(tr)
        },
        error: function(res, a) {}
    });
}

async function iniApp() {

    $(".export").click(function() {
        console.log(dateStart, 'dateStart')
        console.log(dateEnd, 'dateEnd')
        window.location.href = `./dashboard/export?dateStart=${dateStart}&dateEnd=${dateEnd}`;
    })

    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        "minYear": 2022,
        "maxDate": getToday('dd/mm/yyyy'),
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function(start, end, label) {

        dateStart = start.format('DD-MM-YYYY')
        dateEnd = end.format('DD-MM-YYYY')

        console.log(dateStart, 'dateStart')
        console.log(dateEnd, 'dateEnd')
        load(dateStart, dateEnd)
    });

    load(dateStart, dateEnd)

}
iniApp()