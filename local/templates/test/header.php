<?

use Bitrix\Main\Page\Asset;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>



<!doctype html>
<html class="no-js" lang="">

<head>
    <? $APPLICATION->ShowHead(); ?>
    <meta charset="utf-8">
    <!-- <meta http-equiv="x-ua-compatible" content="ie=edge"> -->
    <title> <? $APPLICATION->ShowTitle(); ?></title>
    <!-- <meta name="description" content=""> -->
    <? $APPLICATION->AddHeadString('<meta name="viewport" content="width=device-width, initial-scale=1">') ?>

    <link rel="icon" href="<?= SITE_TEMPLATE_PATH ?>/img/icon.png">
    <? $APPLICATION->AddHeadString('<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet">');  ?>
    <!-- <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,400i,500,600,700,800,900" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slicknav.min.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/animate.min.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/magnific-popup.css">

    <!-- Xman CSS -->
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/normalize.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/style.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/responsive.css">

    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/bootstrap-new.min.css">

</head>

<body>


    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
    <!-- Header Area -->
    <header id="header" class="header">
        <div class="header-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-2 col-xs-12">
                        <div class="logo">
                            <a href="index.html"><img src="<?= SITE_TEMPLATE_PATH ?>/img/nnn.png" alt="logo.png"></a>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "menu",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                            "DELAY" => "N",    // Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",    // Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                            "ROOT_MENU_TYPE" => "main",    // Тип меню для первого уровня
                            "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                        false
                    ); ?>
                    <!-- <div class="col-md-9 col-sm-10 col-xs-12">
                        <div class="mobile-menu"></div>
                        <nav class="navbar navbar-default">
                            <div class="collapse navbar-collapse">
                                <ul id="nav" class="nav navbar-nav">
                                    <li class="current"><a href="#slider">Welcome</a></li>
                                    <li><a href="#about">About Me</a></li>
                                    <li><a href="#service">My Service</a></li>
                                    <li><a href="#skill">Skill</a></li>
                                    <li><a href="#story">Story</a></li>
                                    <li><a href="#latest-works">Portfolio</a></li>
                                    <li><a href="#blog">Blog</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!-- End Header Area -->
    <div class="content">