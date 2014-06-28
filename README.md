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
- Файл less/style.less документирован и можно обратиться к его содержимому для разъяснений о назначении каждого файла.

