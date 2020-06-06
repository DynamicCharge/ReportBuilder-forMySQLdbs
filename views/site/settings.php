<?php


/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <div class = 'title'>
        <h1>Настройки</h1>
    </div>

    <?php $form =  ActiveForm::begin() ?>
    <div class="main-settings-container">

    <div class="settings-content">
        <div class="option-field">
            <div class="dot"></div>
            <div class="option-title">
                <h3>Адрес хоста</h3>
            </div>
            <?= $form->field($settingsModel, 'host', ['inputOptions' => ['id'=> 'host_name_input', 'class'=> 'option_input']])->label(false)->textInput(['placeholder' => 'test_database'])->textInput(['placeholder' => 'localhost'])?>
        </div>

        <div class="option-field">
            <div class="dot"></div>
            <div class="option-title">
                <h3>Имя пользователя</h3>
            </div>
            <?= $form->field($settingsModel, 'username', ['inputOptions' => ['id'=> 'user_name_input', 'class'=> 'option_input']])->label(false)->textInput(['placeholder' => 'root'])?>
        </div>

        <div class="option-field">
            <div class="dot"></div>
            <div class="option-title">
                <h3>Пороль от СУБД</h3>
            </div>
            <?= $form->field($settingsModel, 'password', ['inputOptions' => ['id'=> 'db_password_input', 'class'=> 'option_input']])->label(false)->textInput(['placeholder' => 'password'])?>

        </div>

        <div class="option-field">
            <div class="dot"></div>
            <div class="option-title">
                <h3>Название БД</h3>
            </div>
            <?= $form->field($settingsModel, 'db_name', ['inputOptions' => ['id'=> 'db_name_input', 'class'=> 'option_input']])->label(false)->textInput(['placeholder' => 'test_database'])?>

        </div>
    </div>

     <div class="settings-content">
         <button id="check_connection_button" class="icon-switcher">
             <img src="/img/check_connection_button_icon.png" alt="" class="first-image">
             <img src="/img/choosen_check_connection_button_icon.png" alt="" class="second-image">
         </button>
     </div>

    </div>

    <?php
    if (Yii::$app->session->hasFlash('settings-model-success')) {
        echo "<div class=\"icons_container\">";
        echo "<img src=\"/img/connection_status_green.png\" alt=\"\" id=\"connection_status_green_icon\">";
        echo "</div>";

        echo "<button id=\"save_settings_button\" type=\"submit\">";
        echo "<img src=\"/img/save_button_icon.png\" alt=\"\">";
        echo "<h4>Сохранить</h4>";
        echo "</button>";
    } else if (Yii::$app->session->hasFlash('settings-model-error')) {
        echo "<div class=\"icons_container\">";
        echo "<img src=\"/img/connection_status_red.png\" alt=\"\" id=\"connection_status_red_icon\">";
        echo "</div>";
    }
    ?>
    <?php ActiveForm::end() ?>

</div>