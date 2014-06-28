<?php

/**
 * Файл шапки шаблона
 * 
 * @author    Soshnikov Artem <client@skobka.com>
 * @version    1.0.1
 * @copyright    (c) 25.06.2014, Творческая группа Скобка
 * @website http://skobka.com
 * @license http://skobka.com/license.html
 */

/*
 * Подключаем наш основной класс шаблона
 */
include_once dirname(__FILE__) . '/class/skobka/bitrix/template.php';

/* @var $oTemplate skobka\bitrix\template */
$oTemplate = new \skobka\bitrix\template(__FILE__);
/*
 * Инициализируем нашу систему темизации
 */
$oTemplate->init();

/* @var $APPLICATION CMain */
?><!DOCTYPE html>
<html>
    <head>
        <title><?=$APPLICATION->ShowTitle();?></title>
        <? $APPLICATION->ShowHead();?>
    </head>
    <body>
        <? $APPLICATION->ShowPanel();?>
        <div class="container">`
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">            
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="/"><?= $oTemplate->getSiteInfo('NAME');?></a>
                    <div class="nav-collapse collapse">
                         <?$APPLICATION->IncludeComponent("bitrix:menu", "nav", Array(
	"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
	"MENU_CACHE_TYPE" => "A",	// Тип кеширования
	"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
	"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
		0 => "",
	),
	"MAX_LEVEL" => "1",	// Уровень вложенности меню
	"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
	"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	"DELAY" => "N",	// Откладывать выполнение шаблона меню
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
	),
	false
);?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
      
        <div class="container">