<?php


/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <div class = 'title'>
        <h1>Настройки</h1>
    </div>

    <div class="main-settings-container">

    <div class="settings-content">
        <div class="option-field">
            <div class="dot"></div>
            <div class="option-title">
                <h3>Адрес хоста</h3>
            </div>
            <input type="text" name="db_host_name" value="" placeholder="localhost">
        </div>

        <div class="option-field">
            <div class="dot"></div>
            <div class="option-title">
                <h3>Имя пользователя</h3>
            </div>
            <input type="text" name="db_user_name" value="" placeholder="root">
        </div>

        <div class="option-field">
            <div class="dot"></div>
            <div class="option-title">
                <h3>Пороль от СУБД</h3>
            </div>
            <input type="password" name="db_password" value="" placeholder="password">
        </div>

        <div class="option-field">
            <div class="dot"></div>
            <div class="option-title">
                <h3>Название БД</h3>
            </div>
            <input type="text" name="db_name" value="" placeholder="test_database">
        </div>
    </div>

     <div class="settings-content">
         <button id="check_connection_button" class="icon-switcher">
             <img src="/img/check_connection_button_icon.png" alt="" class="first-image">
             <img src="/img/choosen_check_connection_button_icon.png" alt="" class="second-image">
         </button>
     </div>

    </div>

    <div class="icons_container">
        <img src="/img/connection_status_green.png" alt="" id="connection_status_green_icon" style="display:none;">
        <img src="/img/connection_status_red.png" alt="" id="connection_status_red_icon" style="display: none;">
    </div>

    <button id="save_settings_button">
        <img src="/img/save_button_icon.png" alt="">
        <h4>Сохранить</h4>
    </button>

</div>