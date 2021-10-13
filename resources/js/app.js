require('./bootstrap');

$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $('.btn__client-delete').on('click', function () {
        let response = confirm("Weet je zeker dat je deze client wilt verwijderen?");

        if (response) {
            $(this).parent().submit();
        }
    });

    $('.report-delete-btn').on('click', function () {
        let response = confirm("Weet je zeker dat je dit rapport wilt verwijderen?");

        if (response === true) {
            $(this).parent().submit();
        }
    });

    $('.btn__create-report').on('click', function () {
        let response = confirm("Weet je zeker dat je een nieuw rapport wilt maken? Er zijn kosten verbonden aan deze functie");

        if (response) {
            window.location.href = $(this).data('href');
        }
    });
});
