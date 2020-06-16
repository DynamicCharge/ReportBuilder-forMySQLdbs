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
            <?php echo "<input type=\"number\" class=\"row-counter\" value=".$_GET["rows"].">" ?>
            <button id="search_data_btn"><img src="/img/report_search_icon.png" width="25" alt="">Показать</button>
            <button id="export_report_btn"><img src="/img/report_export_icon.png" width="30" alt="">Экспорт</button>
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
                $fetchCounter = 0;
                $resultRow = [];
                if ($dbSearchItemsArray[$i] == '-'){
                    $sth = $dbh->prepare("SELECT ".$dbHeadersArray[$i]." FROM ".$dbTableNamesArray[$i]."");
                    $sth->execute();
                } else {
                    $explodedItems = explode('=', $dbSearchItemsArray[$i]);
                    $sth = $dbh->prepare("SELECT ".$dbHeadersArray[$i]." FROM ".$dbTableNamesArray[$i]." WHERE ". $explodedItems[0]." = ?");
                    $sth->execute(array($explodedItems[1]));
                }
                while ($array = $sth->fetch()){
                    array_push($resultRow, $array);
                    $fetchCounter++;
                    if ($_GET && $fetchCounter == $_GET['rows']){
                        break;
                    }
                }
                array_push($resultArray, $resultRow);
            }


        ?>

        <div class="data_grid">

            <?php
            for ($i=-1; $i<count($customHeadersArray); $i++){
                if ($i==-1){
                    $maxValue = 0;
                    $counter = 1;

                    echo "<div class=\"items_container row-number\">";
                    echo "<div class=\"data_item row-number\">";
                    echo "<h4>№</h4>";
                    echo "</div>";

                    for ($j=0; $j<count($resultArray); $j++) {
                        if (count($resultArray[$j])>$maxValue){
                            $maxValue = count($resultArray[$j]);
                        }
                    }

                    for ($z=0; $z<$maxValue; $z++){
                        echo "<div class=\"data_item\">";
                        echo "<h4>$counter</h4>";
                        echo "</div>";
                        $counter++;
                    }
                    echo "</div>";

                } else {
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

            }
            ?>

        </div>

    </div>
</div>

<script>
    let exportBtn = document.getElementById('export_report_btn');

    exportBtn.onclick = function () {
        let reportName = <?php echo json_encode($reportName)?>;
        let headersArray = <?php echo json_encode($customHeadersArray);?>;
        let queryData = <?php echo json_encode($resultArray);?>;

        $.ajax({
            type: 'POST',
            url: "http://reportbuilder-formysqldbs/web/index.php?r=main/export-excel",
            data: {
            'requestType': 'export',
            'reportName': reportName,
            'queryData' : queryData,
            'headersArray' : headersArray
            },
            error: function () {
                alert('Ошибка! Отчет не был сформирован!');
            }
        }).done(function () {
            alert('Отчет успешно сформирован!');
        });
    };
</script>
