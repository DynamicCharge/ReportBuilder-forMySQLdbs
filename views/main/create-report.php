<?php

/* @var $this yii\web\View */
use \yii\widgets\ActiveForm;

$this->title = 'Новый отчет';

?>

<div class="create-report-view">

    <input type="text" id="new_report_name_input" placeholder=":report-name:">
    <div class="flexible_table">
    <table class="report_skeleton_table">
        <tr class="headers">
            <td><input type="text" placeholder=":custom_header_name:" id="cust_head_name_0"></td>
        </tr>
        <tr class="table_names">
            <td><input type="text" placeholder=":db_table_name:" id="db_table_name_0"></td>
        </tr>
        <tr class="table_header_names">
            <td><input type="text" placeholder=":db_table_header_name:" id="db_table_head_name_0"></td>
        </tr>
        <tr class="table_search_item">
            <td><input type="text" placeholder=":db_item: = :value:" id="db_table_search_item_0" class="search_item"></td>
        </tr>
    </table>

    <div class="edit_button_container">
        <button id="add_column_to_table" class="edit_button">+</button>
        <button id="delete_column_from_table" class="edit_button">-</button>
    </div>
    </div>
    <button id="save_new_report" type="submit">
        <img src="../../img/save_button_icon.png" alt="">
        <h4>Сохранить</h4>
    </button>
</div>

<?php
$this->registerJsFile('@web/scripts/flexible-table-functionality.js', ['depends' => 'yii\web\YiiAsset']);
?>