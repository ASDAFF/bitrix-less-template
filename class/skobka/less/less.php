<?php

/**
 * Класс по работе с библеотекой lessc
 * @author Soshnikov Artem <client@skobka.com>
 * @version 1.0.1
 * @copyright (c) 26.06.2014, Творческая группа Скобка
 * @website http://skobka.com
 * @license http://skobka.com/license.html
 */

namespace skobka\less;

class less {

    /**
     * Возвращаем сохраненый или новый объект lessc
     * @global \lessc $skobka_less_lessc
     * @return \lessc
     */
    public static function getLessc(){
        global $skobka_less_lessc;
        if(!$skobka_less_lessc){
            $skobka_less_lessc = new \lessc();
        }
        return $skobka_less_lessc;
    }
    
    /**
     * Копмилируем less файл с проверкой на обновленность
     * @param string $input_file
     * @param string $output_file
     * @return boolean
     */
    public static function checkCompile($input_file, $output_file) {
        return self::getLessc()->checkedCompile($input_file, $output_file);
    }

}
