# Блок Masonry

Для работы каскадной сетки в блоке необходим masonry:
```
npm install masonry-layout
```
Подкючить в assets\src\js\app.js
```js
import masonry from 'masonry-layout/dist/masonry.pkgd.min.js';
```
Документация masonry:
```
https://masonry.desandro.com/
```
Код для ACF полей лежит в папке acf-json
В виде json и в виде php файла
```
/acf-json/masonry.json
/acf-json/field_group.php
```
Подключение блока в шаблоне:
```php
get_template_part( 'acf-blocks/masonry/index' );
```
