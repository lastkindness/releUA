# Блок Team

Код для ACF полей лежит в папке acf-json
В виде json и ввиде php файла
```
/acf-json/employee.json
/acf-json/team.json
/acf-json/field_group.php
```
Добавить Custom Post Type : commander
```php
$сommander = new PostType('commander');
$сommander->setLabels([
    'name' => __('Commanders','ReleUA'),
]);
```
после подключения:
```php
use RST\Base\Structure\PostType;
use RST\Base\Structure\Taxonomy;
```

Подключение блока в шаблоне:
```php
get_template_part( 'acf-blocks/team/index' );
```
