$(document).ready(function () {
    $('.button-show').click(function () {
        window.location.href = $(this).attr('href');
    });

    $('.button-edit').click(function () {
        window.location.href = $(this).attr('href');
    });

    $('.button-remove').click(function () {
        const href = $(this).attr('href');

        if (confirm("Удалить?")) {
            $.ajax({
                url: href,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function () {
                    window.location.reload();
                }
            });
        }
    });


    $('.button-action-add-main').click(function () {
        window.location.href = $(this).attr('href');
    });
});