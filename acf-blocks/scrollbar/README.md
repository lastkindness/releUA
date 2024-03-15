# Блок Scrollbar

Для работы скрола в блоке необходим malihu-custom-scrollbar-plugin:
```
npm install malihu-custom-scrollbar-plugin
```
Подкючить в assets\src\js\app.js
```js
import customScrollbar from 'malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js';
```
Подкючить в assets\src\scss\app.scss
```styles
@import '~malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css';
```
Документация malihu-custom-scrollbar-plugin:
```
http://manos.malihu.gr/jquery-custom-content-scroller/
```
Код для ACF полей лежит в папке acf-json
В виде json и в виде php файла
```
/acf-json/scrollbar.json
/acf-json/field_group.php
```
Подключение блока в шаблоне:
```php
get_template_part( 'acf-blocks/scrollbar/index' );
```
