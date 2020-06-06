$(document).ready(function () {

    $('#main_button').on('click', function () {
        if ($('.green').is(':visible')) {
            window.location.replace("http://reportbuilder-formysqldbs/web/index.php?r=main/create-report");
        } else {
            window.location.replace("http://reportbuilder-formysqldbs/web/index.php?r=site/settings");
        }
    })

});