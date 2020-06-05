$(document).ready(function () {

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
    })
    
    $('#delete_column_from_table').on('click', function () {
        let ndx = $(this).parent().index() + 1;
        $("td", event.delegateTarget).remove(":nth-child(" + ndx + ")");
    })

    $('#save_new_report').on('click', function () {
        alert('Плоти деньги - сахраню!')
    })

});