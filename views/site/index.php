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
                <?php
                if (Yii::$app->session->hasFlash('connected')) {
                    echo '<div id="radial_icons">';
                    echo '<img class="green" src="../../img/left-radial-status-green.png" alt="">';
                    echo '</div>';

                    echo '<h3 id="left_radial_status">'.$settingsArray['db_name'].'</h3>';
                } else {
                    echo '<div id="radial_icons">';
                    echo '<img src="../../img/left-radial-status-red.png" alt="" >';
                    echo '</div>';
                    echo '<h3 id="left_radial_status">База данных не<br>определена</h3>';
                }
                ?>
            </div>
            <div id="center_radial">
                <a id="main_button">
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
                    <img src="../../img/right-radial-status.png" alt="" >
                </div>
                <h3 id="left_radial_status">Alpha v.5</h3>
            </div>
        </div>
    </div>
</div>
