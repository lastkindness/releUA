# Блок CTA

Код для ACF полей лежит в папке acf-json
В виде json и ввиде php файла
```
/acf-json/blog-posts.json
/acf-json/field_group.php
```
Подключение блока в шаблоне:
```php
get_template_part( 'acf-blocks/blog-posts/index' );
```
