$(document).ready(function () {
    $('a.preview').lightbox();

    $('.view-button').click(function (e) {
        e.preventDefault();
        $('#modal').modal('show').find('.modal-content')
            .load($(this).attr('href'));
    });
});

