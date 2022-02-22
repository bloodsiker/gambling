$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#btnLucky').on('click', function () {
    $('.container-profit').attr('class', 'container-profit');
    $.ajax({
        type: 'POST',
        url: '/game/lucky',
        contentType: "application/json",
        success: function (response) {
            $('.number').text(response.number);
            if (response.result === 1) {
                $('.container-profit').text('Win. Сумма выиграша: ' + response.profit).addClass('text-success');
            } else {
                $('.container-profit').text('Loss. Сумма выиграша ' + response.profit).addClass('text-danger');
            }
        },
        error: function (msg) {
            alert("not ok....");
        }
    });
});

$('#btnNewLink').on('click', function () {
    $.ajax({
        type: 'POST',
        url: '/profile/generate-new-link',
        contentType: "application/json",
        success: function (response) {
            $('#secureLink').val(response.link);
        },
        error: function (msg) {
            alert("not ok....");
        }
    });
})

$('#btnDeactivateLink').on('click', function () {
    $.ajax({
        type: 'POST',
        url: '/profile/deactivate-link',
        contentType: "application/json",
        success: function (response) {
            if (response.status === 'ok') {
                $('#secureLink').val('');

                setTimeout(function () {
                    window.location = '/';
                }, 1000)
            }
        },
        error: function (msg) {
            alert("not ok....");
        }
    });
})
