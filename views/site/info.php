<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Справка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

   <div class = 'title'>
       <h1>Справка</h1>
   </div>

    <div class = 'page-content'>
        <div class = container>
            <h2>ReportBuilder-forMySQLdbs</h2>
            <hr>
            <p>Приложение работает на основе шаблона фреймворка Yii2</p>
        </div>
    </div>
    <div class = 'page-content'>
        <div class = container>
            <h3>Требования</h3>
            <hr>
            <p>Минимальные требования для работы приложения</p>
            <ul>
                <li>- локальный веб сервер с поддержкой PHP 7.0</li>
                <li>- субд MySQL</li>
            </ul>
        </div>
    </div>
    <div class = 'page-content'>
        <div class = container>
            <h2>О приложении</h2>
            <hr>
            <p> ReportBuilder-forMySQLdbs – представляет собой мощный полнофункциональный инструмент, предоставляющий возможность конструировать отчеты из любой сторонней MySQL базы данных. Пользователь полностью изолирован от написания самих запросов и с помощью взаимодействия с интерфейсом может комбинировать  данные из различных полей и таблиц базы данных.
                <br><br>
                Данное пошаговое руководство создано с целью ознакомить вас с полным спектром возможностей за самые короткие сроки.
            </p>
        </div>
    </div>
    <div class = 'page-content'>
        <div class = container>
            <h2>Начало работы</h2>
            <hr>
            <p> Перед тем, как начать работу с приложением следует выполнить несколько простых шагов.</p>
            <ul>
                <li>Шаг 1: Скачать приложение с <a href="https://github.com/DynamicCharge/ReportBuilder-forMySQLdbs" target="_blank" style="border-bottom: 1px solid #c2c2c2">гит репозитория</a>. Для этого нужно кликнуть по кнопке "Clone or download" и в выпадающем меню нажать на "Download ZIP";</li>
                <br>
                <li>Шаг 2: Создать локальную базу данных с названием "report_builder_db";</li>
                <br>
                <li>Шаг 3: Открыть консоль веб сервера, и перейдя в корневую папку проекта, выполнить команду "php yii migrate/up", подтвердив применения миграций;</li>
                <br>
                <li>Шаг 4: запустить веб приложение через локальный сервер и открыть папку "web/".<br>Приложение полностью готово к использованию!</li>
            </ul>
        </div>
    </div>
    <div class = 'page-content'>
        <div class = container>
            <h2>Руководство пользователя</h2>
            <hr>
            <p> </p>
        </div>
    </div>

</div>
