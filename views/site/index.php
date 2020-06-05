<?php

/* @var $this yii\web\View */

$this->title = 'Главная';
?>
<div class="site-index">

    <div class="main_header">
        <h1>Универсальный помошник<br>в создании отчетов</h1>
    </div>

    <div class="main_content">
        <div class="radial_container">
            <div id="left_radial">
                <div id="radial_icons">
                    <img src="../../img/left-radial-status-green.png" alt="" style="display:none;">
                    <img src="../../img/left-radial-status-red.png" alt="" >
                </div>
                <h3 id="left_radial_status">База данных не<br>определена</h3>
            </div>
            <div id="center_radial">
                <a href="http://reportbuilder-formysqldbs/web/index.php?r=main/create-report">
                    <div class="outer_radius">
                        <div class="inner_outer_radius">
                            <div class="inner_radius">
                                <div class="main-radial-icon-switcher">
                                    <img src="../../img/mainRadial/icon.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div id="right_radial">
                <div id="radial_icons">
                    <img src="../../img/left-radial-status-green.png" alt="" style="display:none;">
                    <img src="../../img/left-radial-status-red.png" alt="" >
                </div>
                <h3 id="left_radial_status">Идея не<br>определена</h3>
            </div>
        </div>
    </div>
</div>
