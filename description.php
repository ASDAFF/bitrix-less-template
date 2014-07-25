<?php

/**
 * Файл конфигурации шаблона
 * 
 * @author    Soshnikov Artem <client@skobka.com>
 * @version    1.0.1
 * @copyright    (c) 26.06.2014, Творческая группа Скобка
 * @website http://skobka.com
 * @license http://skobka.com/license.html
 */
 
$arTemplate = array(
    "NAME" => "Bitrix LESS Template",
    "DESCRIPTION" => "",
    "SORT" => "",
    
    /*
     * Настройки шаблона
     */
    "TPL_INCLUDE_LIB" => array(
        'lib/lessphp/lessc.inc.php',
        'class/skobka/less/less.php',
        'lib/kint-0.9/Kint.class.php'
    ),
    "TPL_CUSTOM_FUNCTIONS" => array(
        array(
            array('\skobka\less\less','checkCompile'),
            array(dirname(__FILE__) . '/template_styles.less', dirname(__FILE__) . '/template_styles.css')
        )
    ),
    "TPL_LESS_DIR" => "less",
    "TPL_INCLUDE_CSS" => array(
        "bootstrap/css/bootstrap.min.css"
    ),
    "TPL_INCLUDE_JS" => array(
        "js/jquery-1.11.1.min.js",
        "bootstrap/js/bootstrap.min.js"
    ),
);
