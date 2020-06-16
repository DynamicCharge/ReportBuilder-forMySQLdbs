$(document).ready(function () {

    var fullPath = window.location.href;
    var fullPathArr = fullPath.split('/');
    var fullPathCropped = fullPathArr.join('/');

    $('#add_column_to_table').on('click', function () {

        let table = $('.report_skeleton_table');

        table.find('.headers').each(function(){
            $(this).find('td').last().after('<td><input type="text" placeholder=":custom_header_name:"></td>');
        });
        table.find('.table_names').each(function(){
            $(this).find('td').last().after('<td><input type="text" placeholder=":db_table_name:"></td>');
        });
        table.find('.table_header_names').each(function(){
            $(this).find('td').last().after('<td><input type="text" placeholder=":db_table_header_name:"</td>');
        });
        table.find('.table_search_item').each(function(){
            $(this).find('td').last().after('<td><input type="text" placeholder=":db_item: = :value:" class="search_item"></td>');
        });
    });
    
    $('#delete_column_from_table').on('click', function () {
        let ndx = $(this).parent().index() + 1;
        $("td", event.delegateTarget).remove(":nth-child(" + ndx + ")");
    });

    $('#save_new_report').on('click', function () {

        let reportName = $('#new_report_name_input').val();
        let resultArray = [];
        let dataArray = [];

        $('table tr').each(function () {
            let array_row = [];
            $(this).find('td').each(function(){
                $(this).find('input').each(function () {
                    if ((!$(this).val() || !reportName) && !$(this).hasClass('search_item')){
                        $(this).addClass('empty-field');
                        alert('Все поля обязательны для заполнения!');
                        throw new Error('Ban!');
                    } else {
                        if ($(this).hasClass('search_item') && $(this).val() == ''){
                            $(this).val('-');
                        }
                            array_row.push($(this).val());
                    }
                })
            });
            if (array_row != ''){
                resultArray.push(array_row);
            }
        });

        $.ajax({
                type: 'POST',
                url: fullPathCropped,
                data: {
                    'reportName': reportName,
                    'newReportDataArray': resultArray,
                }
            }).done(function () {
                location.reload();
            });
    });
});