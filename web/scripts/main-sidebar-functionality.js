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

    $('#delete_report_btn').on('click', function () {
        let reportName = $('.report-title').text();
        $.ajax({
            type: 'POST',
            url: "http://reportbuilder-formysqldbs/web/index.php?r=main/show-report",
            data: {
                    'requestType': 'delete',
                    'reportName': reportName,
            }
        }).done(function () {
            document.location.replace("http://reportbuilder-formysqldbs/web/index.php?r=main/create-report");
        });
    });
});