import './bootstrap';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#approve-button, #reject-button').click(function () {
    let picId = $('#randomPic').attr('src');
    let isApproved = $(this).attr('id') == 'approve-button';
    $.ajax({
        url: "/approve?isApproved=" + isApproved + "&picId=" + picId,
        type: "POST",
        success: function (data) {
            location.reload();
        }
    });
});
