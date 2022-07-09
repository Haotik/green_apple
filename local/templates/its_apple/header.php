<?php
use Bitrix\Main\Page\Asset;
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)    die();
$asset = Asset::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/source/css/style.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/source/css/adaptive.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?$APPLICATION->ShowTitle();?></title>
    <?$APPLICATION->ShowHead();?>
</head>
    
<body class="main_page">
    <?$APPLICATION->ShowPanel();?>
    <nav class="nav">
        <div class="nav_head">
            <div class="container">
                <a href="/" class="nav_head-logo">
                    <img src="source/img/logo.png" alt="Логотип">
                </a>
                <a href="#" class="nav_head-time ic-wrapper ic-time">Время работы: 9-18 пн-сб</a>
                <a href="tel: 84714878863" class="nav_head-phone ic-wrapper ic-phone">+7 (47148) 7 88 63</a>
                <a href="https://yandex.ru/maps/10710/zheleznogorsk/house/zavodskoy_proyezd_3/Z0wYdQFgSUYDQFtofX90d31qZQ==/?ll=35.360034%2C52.356192&z=17" target="blank" class="nav_head-address ic-wrapper ic-address">г. Железногорск, Заводской проезд, д. 3</a>
            </div>
        </div>
        <div class="nav_menu">
            <div class="container">
                <div class="nav_menu-burger">Меню</div>
                <ul class="nav_menu-list">
                    <li class="nav_menu-list-item">
                        <a href="/">Главная</a>
                    </li>
                    <li class="nav_menu-list-item">
                        <a>Услуги</a>
                        <ul class="nav_menu-list-submenu">
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Диагностика</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Лечение десен</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Протезирование</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Имплантация</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Ортодонтия</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Профилактика</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Хирургия</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Терапия</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Эстетика</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Детство</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav_menu-list-item">
                        <a href="#">Врачи</a>
                    </li>
                    <li class="nav_menu-list-item">
                        <a>Полезная информация</a>
                        <ul class="nav_menu-list-submenu second">
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Размещение приезжих пациентов</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Забота о пожилых людях</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Памятка для нового пациента</a>
                            </li>
                            <li class="nav_menu-list-submenu-item">
                                <a href="#">Памятка детского стоматолога</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav_menu-list-item">
                        <a href="#">Документы</a>
                    </li>
                    <li class="nav_menu-list-item">
                        <a href="#">Цены</a>
                    </li>
                    <li class="nav_menu-list-item">
                        <a href="#">Контакты</a>
                    </li>
                    <li class="nav_menu-list-item mobile">
                        <a href="#">Вакансии</a>
                    </li>
                    <li class="nav_menu-list-item mobile">
                        <a href="#">Памятки</a>
                    </li>
                    <li class="nav_menu-list-item mobile">
                        <a href="#">Для гостей</a>
                    </li>
                    <li class="nav_menu-list-item mobile">
                        <a href="#">Зуботехническая лаборатория</a>
                    </li>
                    <li class="nav_menu-list-item mobile">
                        <a href="#">Программа «План лечения»</a>
                    </li>
                    <li class="nav_menu-list-item mobile">
                        <a href="#">Контролирующие организации</a>
                    </li>
                    <li class="nav_menu-list-item mobile">
                        <a href="#">Партнеры</a>
                    </li>
                    <li class="nav_menu-list-item mobile nav_menu-list-item-socials">
                        <a href="https://yandex.ru/maps/10710/zheleznogorsk/house/zavodskoy_proyezd_3/Z0wYdQFgSUYDQFtofX90d31qZQ==/?ll=35.360034%2C52.356192&z=17" target="blank" class="nav_menu-address ic-wrapper ic-address">г. Железногорск, Заводской проезд, д. 3</a>
                        <div class="nav_menu-phone ic-wrapper ic-phone">
                            <a href="tel: +74714878863">+7 (47148) 7 88 63</a>
                            <br>
                            <a href="tel: +74714876622">+7 (47148) 7 66 22</a>
                        </div>
                        <a href="#" class="nav_menu-time ic-wrapper ic-time">Время работы: 9-18 пн-сб</a>
                        <a href="mailto: clinicа@greenapple.pro" class="nav_menu-phone ic-wrapper ic-mail">clinicа@greenapple.pro</a>
                    </li>
                    <li class="full_social-wrapper">
                        <ul class="full_social">
                            <li class="ic_ok">
                                <a href="#"></a>
                            </li>
                            <li class="ic_fb">
                                <a href="#"></a>
                            </li>
                            <li class="ic_inst">
                                <a href="#"></a>
                            </li>
                            <li class="ic_vk">
                                <a href="#"></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="header">
        <div class="container">
            <div class="header-main">
                <img class="header-img" src="source/img/header_main.jpg" alt="Хеадер">
                <h1 class="header-title">Семейная стоматология<br>в Железногорске </h1>
            </div>
        </div>
    </header>
    
    <main>