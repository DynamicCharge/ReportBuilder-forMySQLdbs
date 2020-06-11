function $_GET(key) {
    var s = window.location.search;
    s = s.match(new RegExp(key + '=([^&=]+)'));
    return s ? s[1] : false;
}

$(document).ready(function () {
    var fullPath = window.location.href;
    var fullPathArr = fullPath.split('/');
    var fullPathCropped = fullPathArr.join('/');

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

    $('a').on('click', function () {
        let value = $(this).text();
        $.ajax({
            type: 'POST',
            url: '../../views/main/show-report.php',
            data: {
                    'reportName': $_GET['name'],
            }
        });
    })
});