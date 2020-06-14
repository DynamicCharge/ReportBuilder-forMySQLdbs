<?php

/* @var $this yii\web\View */
use \app\models\Settings;
use \app\models\Reports;

$settingsModel = Settings::find()->asArray()->all();
$reportName = Yii::$app->request->get('name');
$this->title = $reportName;
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
            $report = Reports::find()->asArray()->where(['name'=>$reportName])->all();
            $customHeadersArray = explode('|', $report[0]['custom_headers']);
            $dbTableNamesArray = explode('|', $report[0]['table_names']);
            $dbHeadersArray = explode('|', $report[0]['table_header_name']);
            $dbSearchItemsArray = explode('|', $report[0]['search_items']);

            $dbh = new PDO("mysql:dbname=".$settingsModel[0]['db_name'].";host=".$settingsModel[0]['host']."", $settingsModel[0]['username'], $settingsModel[0]['password']);

            $resultArray = [];
        for ($i=0; $i<count($dbTableNamesArray); $i++){
                $resultRow = [];
                $sth = $dbh->prepare("SELECT ".$dbHeadersArray[$i]." FROM ".$dbTableNamesArray[$i]."");
                $sth->execute();
                while ($array = $sth->fetch()){
                    array_push($resultRow, $array);
                }
                array_push($resultArray, $resultRow);
            }

        ?>

        <div class="data_grid">

            <?php
            for ($i=0; $i<count($customHeadersArray); $i++){
                echo "<div class=\"items_container\">";

                echo "<div class=\"data_item\">";
                echo "<h4>".$customHeadersArray[$i]."</h4>";
                echo "</div>";

                for ($j=0; $j<count($resultArray[$i]); $j++) {
                    echo "<div class=\"data_item\">";
                    echo "<h4>".$resultArray[$i][$j][0]."</h4>";
                    echo "</div>";
                }

                echo "</div>";
            }
            ?>

        </div>

    </div>
</div>
