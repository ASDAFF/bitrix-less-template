<?php

/**
 * ласс по работе с шаблонами 1С-Битрикс
 * 
 * @author    Soshnikov Artem <client@skobka.com>
 * @version    1.0.1
 * @copyright    (c) 25.06.2014, Творческая группа Скобка
 * @website http://skobka.com
 * @license http://skobka.com/license.html
 */

namespace skobka\bitrix;

class template {

    protected $init_file;
    protected $inited_dir;

    public function __construct($init_file) {
        $this->init_file = $init_file;
        $this->inited_dir = dirname($this->init_file);
    }

    public function init() {
        $this
                ->includeLessFiles()
                ->includeCssFiles()
                ->includeJsFiles()
                ->includeLibs()
                ->initCallbacks();
    }

    /**
     * Папка текущего шаблона
     * @return string
     */
    public function getTemplatePath() {
        return SITE_TEMPLATE_PATH;
    }

    public function getLessFiles() {
        
    }

    /**
     * Получить параметр шаблона
     * @staticvar ����� $arTemplate
     * @staticvar boolean $bFileIncluded
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getTemplateParam($key, $default = null) {
        static $arTemplate, $bFileIncluded;
        if (!$bFileIncluded) {
            $file = $this->inited_dir . DIRECTORY_SEPARATOR . 'description.php';
            if (file_exists($file)) {
                include_once $file;
            }
            $bFileIncluded = true;
        }

        if (!array_key_exists($key, $arTemplate)) {
            return $default;
        }
        return $arTemplate[$key];
    }

    public function includeLessFiles() {

        return $this;
    }

    /**
     * Подключаем JS файлы
     * @global \CMain $APPLICATION
     * @return \skobka\bitrix\template
     */
    public function includeJsFiles() {
        /* @var $APPLICATION \CMain */
        global $APPLICATION;
        $aJS = $this->getTemplateParam("TPL_INCLUDE_JS", array());
        foreach ($aJS as $file) {
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/' . $file);
        }
        return $this;
    }

    /**
     * Подключаем CSS файлы
     * @global \CMain $APPLICATION
     * @return \skobka\bitrix\template
     */
    public function includeCssFiles() {
        /* @var $APPLICATION \CMain */
        global $APPLICATION;
        $aCss = $this->getTemplateParam("TPL_INCLUDE_CSS", array());
        foreach ($aCss as $file) {
            $APPLICATION->SetTemplateCSS($file);
        }
        return $this;
    }

    /**
     * Подключаем сторониие библиотеки
     * @global \CMain $APPLICATION
     */
    public function includeLibs() {
        $aLibs = $this->getTemplateParam('TPL_INCLUDE_LIB', array());
        foreach ($aLibs as $lib) {
            $file = $this->inited_dir . DIRECTORY_SEPARATOR . $lib;
            //Специально не будем делать проверку
            include_once $file;
        }
        return $this;
    }

    /**
     * Вызываем пользовательские функции
     */
    public function initCallbacks() {
        $aCallback = $this->getTemplateParam("TPL_CUSTOM_FUNCTIONS", array());
        foreach ($aCallback as $callback_info) {
            if (is_array($callback_info)) {
                $callback = $callback_info[0];
                $args = $callback_info[1];
            } else {
                $callback = $callback_info;
                $args = array();
            }
            call_user_func_array($callback, $args);
            return $this;
        }
    }

}
