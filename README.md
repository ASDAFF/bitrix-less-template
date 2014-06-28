Bitrix LESS Template
=========

Общая информация
--
Проект представляет из себя шаблон для системы 1С-Битрикс "Управление сайтом". 
В шаблоне используются:
- Bootstrap 2.3.2 http://getbootstrap.com/2.3.2
- jQuery 1.11.1 http://jquery.com
- lessphp http://leafo.net/lessphp/ (Информация о LESS http://lesscss.org)
- Дополнительные утилиты от автора.

Установка
--
Для установки необходимо скачать и распаковать проект в папку bitrix/templates. В итоге должна получиться следующая структура:
```sh
/bitrix/templates/bitrix-less-template
-- bootstrap/
-- class/
-- componentns/
-- js/
-- less/
-- lib/
-- description.php
-- footer.php
-- header.php
-- logo.png
-- styles.css
-- template_style.css
-- template_styles.less

```

Использование
--
- Файлы LESS стилей расположены в папке less и разделены логически. 
- Основной файл less (входной файл для компиляции) - template_styles.less. Он в свою очередь подключает less/style.less
- Файл less/style.less документирован и можно обратиться к его содержимому для разъяснений о назначении каждого .less файла.

Настройка шаблона (description.php)
----
Данный шаблон содержит свой обработчик параметров шаблона, поэтому у файла description.php появились некоторые новые возможности.
- мы можем в одном месте указать какие файлы нам необходимо подключить в шаблоне (включая пользовательские библиотеки и др. файлы)
    - TPL_INCLUDE_LIB - Необходимые для работы шаблона библеотеки. 
    - TPL_INCLUDE_CSS - Файлы css стилей
    - TPL_INCLUDE_JS - файлы js скриптов
- Мы можем указать дополнительные функции обработчики, которые будут вызваны при обращении к header.php. Данные обработчики вызываются после подключение всех библиотек указанных в TPL_INCLUDE_LIB. Формат описания обработчика следующий:

```php

"TPL_CUSTOM_FUNCTIONS" => array(
    //Первый обработчик
    // Первый элемент массива должен быть callable 
    // Второй элемент массив параметров передаваемых в обработчик
    array(
        array('MY_NAMESPACE\MY_CLASS','MY_STATIC_METHOD'),
        array('argument1', 'argument2'),
    ),
    
    // Второй обработчик
    // Первый элемент массива должен быть callable 
    // Второй элемент массив параметров передаваемых в обработчик
    array(
        array('MY_NAMESPACE\MY_CLASS','MY_STATIC_METHOD2'),
        array('argument1', 'argument2'),
    )    
),

```

Изначально подразумевается, что пользовательские обработчики будут хранится в пользовательских классах соотвествующего namespace (Обратите внимание: все пользовательские файлы необходимо подключить через TPL_INCLUDE_LIB). 

Можно подключить обработчик без написания класса, если такое действие является излишним или необходимо написать корневую функцию. Для этого необходимо просто подключить свой php файл через TPL_INCLUDE_LIB положив его в любое удобное место в шаблоне. Например:

```php

// Файл descripion.php

"TPL_INCLUDE_LIB" => array(
   // ........... 
   //то что было
   
   "lib/functions.php"
),

// Файл lib/functions.php

/**
* Функция приветсвия
* @return string
*/
function my_function() {
    return "hello";
}

```

Заключение
--
Данный шаблон разрабатывается под собственные нужды. Он будет использоваться как болванка для создания шаблонов оформления сайтов на 1С-Битрикс. 

Приветствуются любые пожелания и предложения по развитию данного проекта.

Лицензия
--
<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Лицензия Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br />Произведение «<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Bitrix LESS Template</span>» созданное автором по имени <a xmlns:cc="http://creativecommons.org/ns#" href="https://github.com/Doka-NT/bitrix-less-template" property="cc:attributionName" rel="cc:attributionURL">Сошников Артём</a>, публикуется на условиях <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">лицензии Creative Commons «Attribution» («Атрибуция») 4.0 Всемирная</a>.
