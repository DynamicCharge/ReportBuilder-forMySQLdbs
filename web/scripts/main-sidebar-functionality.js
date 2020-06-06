$(document).ready(function () {
    $('a[href="' + window.location.href + '"]').parent().addClass('chosen');

    $('.main-expand').on('click', function () {
        // open or close navbar
        $('#main-sidebar').toggleClass('active');
        $('#content').toggleClass('active');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        if ($('#expand-arrow-img').hasClass('to-left')) {
            $('#expand-arrow-img').removeClass('to-left');
        } else {
            $('#expand-arrow-img').addClass('to-left');
        }
    });
});