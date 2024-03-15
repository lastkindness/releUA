# Блок Gallery

Для работы попапа в блоке необходим fancybox:
```
npm install @fancyapps/fancybox
```
Подкючить в assets\src\js\app.js
```js
import fancybox from '@fancyapps/fancybox/dist/jquery.fancybox.min.js';
```
Подкючить в assets\src\scss\app.scss
```styles
@import '~@fancyapps/fancybox/dist/jquery.fancybox.css';
```
Документация fancybox:
```
http://fancyapps.com/fancybox/3/
```
Код для ACF полей лежит в папке acf-json
В виде json и в виде php файла
```
/acf-json/gallery.json
/acf-json/field_group.php
```
Подключение блока в шаблоне:
```php
get_template_part( 'acf-blocks/gallery/index' );
```
