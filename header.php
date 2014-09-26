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
$GLOBALS['oTemplate'] = $oTemplate = new \skobka\bitrix\template(__FILE__);
/*
 * Инициализируем нашу систему темизации
 */
$oTemplate->init();

/* @var $USER CUser */
global $USER;

$is_fixed_menu = $USER->IsAdmin() ? false : true;
/* @var $APPLICATION CMain */

$arMessages = $_SESSION['SKOBKA_MESSAGES'];

function skobka_set_message($message, $type = 'info') {
    if (!is_array($_SESSION['SKOBKA_MESSAGES'])) {
        $_SESSION['SKOBKA_MESSAGES'] = array();
    }
    $_SESSION['SKOBKA_MESSAGES'][] = array(
        'type' => $type,
        'message' => $message,
    );
}

function skoba_clean_message() {
    $_SESSION['SKOBKA_MESSAGES'] = array();
}
?><!DOCTYPE html>
<html>
    <head>
        <title><?= $APPLICATION->ShowTitle(); ?></title>
        <? $APPLICATION->ShowHead(); ?>
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <? $APPLICATION->ShowPanel(); ?>
        <div class="container">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">            
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="/"><?= $oTemplate->getSiteInfo('NAME'); ?></a>
                    <div class="nav-collapse collapse">
                        <?php
                        $APPLICATION->IncludeComponent("bitrix:menu", "nav", Array(
                            "ROOT_MENU_TYPE" => "top", // Тип меню для первого уровня
                            "MENU_CACHE_TYPE" => "A", // Тип кеширования
                            "MENU_CACHE_TIME" => "3600", // Время кеширования (сек.)
                            "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                            "MENU_CACHE_GET_VARS" => array(// Значимые переменные запроса
                                0 => "",
                            ),
                            "MAX_LEVEL" => "1", // Уровень вложенности меню
                            "CHILD_MENU_TYPE" => "", // Тип меню для остальных уровней
                            "USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "DELAY" => "N", // Откладывать выполнение шаблона меню
                            "ALLOW_MULTI_SELECT" => "N", // Разрешить несколько активных пунктов одновременно
                                ), false
                        );
                        ?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
            <?php ob_start(); ?>
            <?php 
                /*
                 * ob-функции добавлены для сохранения возможности 
                 * автоформатирования кода в NetBeans 8.0
                 */
            ?>
        </div>
    </body>
</html>
<?php ob_get_clean(); ?>