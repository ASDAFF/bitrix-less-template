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
                    <a class="brand" href="#">Project name</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
      
        <div class="container">