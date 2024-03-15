# Блок Quote

Для работы карусели в блоке необходим swiperjs:

```
npm install npm install swiper
```

Подкючить в assets\src\js\app.js

```js
import Swiper from "swiper/swiper-bundle";
```

Подкючить в assets\src\scss\app.scss

```styles
@import "~swiper/swiper-bundle.css";
```

Документация swiperjs:

```
https://swiperjs.com/get-started
```

/acf-json/quote.json
/acf-json/field_group.php

````
Подключение блока в шаблоне:
```php
get_template_part( 'acf-blocks/quote/index' );
````
