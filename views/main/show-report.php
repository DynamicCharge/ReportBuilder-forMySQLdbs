<?php

/* @var $this yii\web\View */
use \yii\widgets\ActiveForm;

$this->title = 'Новый отчет';
$reportName = Yii::$app->request->get('name');
?>

<div class="show-report-view">
    <?php echo "<h1 class=\"report-title\">".$reportName."</h1>";?>

    <div class="flex_buttons">
        <button id="delete_report_btn"><img src="/img/report_delete_icon.png" width="25" alt=""></button>
        <div class="buttons">
            <button id="search_data_btn"><img src="/img/report_search_icon.png" alt="">Поиск</button>
            <button id="export_report_btn"><img src="/img/report_export_icon.png" alt="">Экспорт</button>
        </div>
    </div>

    <div class="data_table">
        <?php
            $report = \app\models\Reports::find()->asArray()->where(['name'=>$reportName])->all();
            print_r($report);
        ?>
    </div>
</div>
