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

 $index_url = Url::to('site/index');
 $settings_url = Url::to('site/settings');
 $info_url = Url::to('site/info');

 echo "<div class=\"wrapper\">
   <nav id=\"sidebar\">
        <div class=\"sidebar-header\">
            <button id=\"top-sidebar-button\" class=\"icon-switcher expand\">
                <img src=\"/img/top-menu-icon.png\" alt=\"\" class=\"first-image\">
                <img src=\"/img/top-menu-icon_choosen.png\" alt=\"\" class=\"second-image\">
            </button>
        </div>
        <div class=\"flex\">
            <ul class=\"list-unstyled components\">
                <li>
                    <a href= \"http://reportbuilder-formysqldbs/web/index.php?r=site/index\">
                        <div class=\"icon-switcher\">
                            <img src=\"/img/ficon.png\" alt=\"\" class=\"first-image\">
                            <img src=\"/img/ficon_choosen.png\" alt=\"\" class=\"second-image\">
                        </div>
                    </a>
                </li>
                <li>
                    <a href=\"http://reportbuilder-formysqldbs/web/index.php?r=site/settings\">
                        <div class=\"icon-switcher\">
                            <img src=\"/img/sicon.png\" alt=\"\" class=\"first-image\">
                            <img src=\"/img/sicon_choosen.png\" alt=\"\" class=\"second-image\">
                        </div>
                    </a>
                </li>
                <li>
                    <a href=\"http://reportbuilder-formysqldbs/web/index.php?r=site/info\">
                        <div class=\"icon-switcher\">
                            <img src=\"/img/ticon.png\" alt=\"\" class=\"first-image\">
                            <img src=\"/img/ticon_choosen.png\" alt=\"\" class=\"second-image\">
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <div id=\"content\">

        <button type=\"button\" id=\"sidebarExpand\" class=\"expand\" style=\"display: none\">
            <img src=\"/img/top-menu-icon.png\" alt=\"\">
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