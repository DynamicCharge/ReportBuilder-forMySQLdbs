<?php


/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Справка';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <div class = 'title'>
        <h1>Настройки</h1>
    </div>

    <div class="option-field">
        <div class="option-title">
            <h3>Подключение к базе данных</h3>
        </div>
        <div class="option-body">
            <input type="text" name="db_connection_string">
            <button id="check_connection_button" class="icon-switcher">
                <img src="/img/check_connection_button_icon.png" alt="" class="first-image">
                <img src="/img/choosen_check_connection_button_icon.png" alt="" class="second-image">
            </button>
            <div class="icons_container">
                <img src="/img/connection_status_green.png" alt="" id="connection_status_green_icon">
                <img src="/img/connection_status_red.png" alt="" id="connection_status_red_icon" style="display: none">
            </div>
        </div>
    </div>

    <div class="option-field">
        <div class="option-title">
            <h3>Подключение к базе данных</h3>
        </div>
        <div class="option-body">
            <input type="text" name="db_connection_string">
            <button id="check_connection_button" class="icon-switcher">
                <img src="/img/check_connection_button_icon.png" alt="" class="first-image">
                <img src="/img/choosen_check_connection_button_icon.png" alt="" class="second-image">
            </button>
            <div class="icons_container">
                <img src="/img/connection_status_green.png" alt="" id="connection_status_green_icon" style="display: none">
                <img src="/img/connection_status_red.png" alt="" id="connection_status_red_icon">
            </div>
        </div>
    </div>

    <div class="option-field">
        <div class="option-title">
            <h3>Подключение к базе данных</h3>
        </div>
        <div class="option-body">
            <input type="text" name="db_connection_string">
            <button id="check_connection_button" class="icon-switcher">
                <img src="/img/check_connection_button_icon.png" alt="" class="first-image">
                <img src="/img/choosen_check_connection_button_icon.png" alt="" class="second-image">
            </button>
            <div class="icons_container">
                <img src="/img/connection_status_green.png" alt="" id="connection_status_green_icon" style="display: none">
                <img src="/img/connection_status_red.png" alt="" id="connection_status_red_icon" style="display: none">
            </div>
        </div>
    </div>

    <button id="save_settings_button">
        <img src="/img/save_button_icon.png" alt="">
        <h4>Сохранить</h4>
    </button>

</div>