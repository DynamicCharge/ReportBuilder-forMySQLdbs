<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Reports;

AppAsset::register($this);
?>

<?php
$reportList = Reports::find()->asArray()->all();
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody();

    echo "<div class=\"wrapper\">";
    echo "<nav id=\"main-sidebar\">";
        echo "<div class=\"main-sidebar-header\">";
            echo "<a id=\"top-main-sidebar-button\" href='http://reportbuilder-formysqldbs/web/index.php?r=main/create-report'>Создать отчет +</a>";
        echo "</div>";
        echo "<div class=\"main-flex\">";
            echo "<ul class=\"list-unstyled components\">";
                if ($reportList){
                    foreach ($reportList as $item) {
                        echo  "<li>";
                        echo "<a href= \"#\" class='item'>".$item['name']."</a>";
                        echo "</li>";
                }
                } else {
                    echo "<p class='nothing-show'>Не найдено ни одного отчета</p>";
                }
            echo "</ul>";
        echo "</div>";
        echo "<div class=\"main-sidebar-footer\">";
           echo  "<a id=\"bott-main-sidebar-button\" href='http://reportbuilder-formysqldbs/web/index.php?r=site/index'>";
                echo "<div class=\"exit-icon-switcher\">";
                            echo "<img src=\"/img/exit.png\" alt=\"\" class=\"first-image\">";
                            echo "<img src=\"/img/choosen_exit.ong.png\" alt=\"\" class=\"second-image\">";
                echo "</div>";
                echo "<p>Выход</p>";
            echo "</a>";
        echo "</div>";
    echo "</nav>";


    echo "<div id=\"content\">";

        echo "<button type=\"button\" id=\"mainSidebarExpand\" class=\"main-expand\">";
            echo "<img src=\"/img/main-sidebar-expand-icon.png\" alt=\"\" class='to-left' id='expand-arrow-img'>";
        echo "</button>";

        echo "<h3 id=\"main_header\">ReportBuilder-forMySQLdbs</h3>";
        echo "<div class=\"container-fluid\">";

            echo $content;

        echo "</div>";
    echo "</div>";
echo "</div>";

    $this->endBody(); ?>
</body>
</html>

<?php $this->endPage() ?>
