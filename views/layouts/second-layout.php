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

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody();

    echo "<div class=\"wrapper\">
   <nav id=\"main-sidebar\">
        <div class=\"main-sidebar-header\">
            <a id=\"top-main-sidebar-button\">Создать отчет +</a>
        </div>
        <div class=\"main-flex\">
            <ul class=\"list-unstyled components\">
                <li>
                    <a href= \"http://reportbuilder-formysqldbs/web/index.php?r=site/index\" class='item'>Отчет по статусам заявок</a>
                </li>
                <li>
                    <a href= \"http://reportbuilder-formysqldbs/web/index.php?r=site/index\" class='item'>Отчет по должникам</a>
                </li>
                <li>
                    <a href= \"http://reportbuilder-formysqldbs/web/index.php?r=site/index\" class='item'>Отчет по пролонгациям</a>
                </li>
            </ul>
        </div>
        <div class=\"main-sidebar-footer\">
            <a id=\"bott-main-sidebar-button\" href='http://reportbuilder-formysqldbs/web/index.php?r=site/index'>
                <div class=\"exit-icon-switcher\">
                            <img src=\"/img/exit.png\" alt=\"\" class=\"first-image\">
                            <img src=\"/img/choosen_exit.ong.png\" alt=\"\" class=\"second-image\">
                </div>
                <p>Выход</p>
            </a>
        </div>
    </nav>


    <div id=\"content\">

        <button type=\"button\" id=\"mainSidebarExpand\" class=\"main-expand\">
            <img src=\"/img/main-sidebar-expand-icon.png\" alt=\"\" class='to-left' id='expand-arrow-img'>
        </button>

        <h3 id=\"main_header\">ReportBuilder-forMySQLdbs</h3>
        <div class=\"container-fluid\">

            $content

        </div>
    </div>
</div>";

    $this->endBody(); ?>
</body>
</html>

<?php $this->endPage() ?>
