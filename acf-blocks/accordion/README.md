# Блок FAQs

Для работы аккордеона в блоке необходим handorgel:
```
npm install handorgel
```
Подкючить в assets\src\js\app.js
```js
import handorgel from './modules/handorgel.js';
```
Подкючить в assets\src\scss\app.scss
```styles
@import '~handorgel/src/scss/style.scss';
```
Документация handorgel:
```
https://github.com/oncode/handorgel
```
Код для ACF полей лежит в папке acf-json
В виде json и в виде php файла
```
/acf-json/faqs.json
/acf-json/field_group.php
```
Подключение блока в шаблоне:
```php
get_template_part( 'acf-blocks/faqs/index' );
```
