## Тестовое задание Laravel 10 и VueJS

#### Фронтенд:

- сделать обращение к Api через JavaScript (выборка по промежутку дат, фильтр по какому-либо полю)
- вывод данных в виде таблицы

#### Бэкенд:

Реализовать небольшое REST Api на Laravel.
- выборка каких-либо данных из БД (выборка по промежутку дат, фильтр по какому-либо полю)
- при запросе указывать Bearer token
- возвращать данные в виде JSON


***
Для создания **REST**, использовался пакет **Sanctum**.

Что бы можно было использовать **API** без использования токена, c помощью **axios**, нужно что бы в **app/Http/Kernel.php**, было прописано:

```php
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
```

Изначально так и сделано. 

#### Установка:

Версия PHP 8.1.

VueJS подключён с помощью CDN, **Фронтенд** собирать не нужно.

**folder** заменить на название папки

1. ```git clone https://github.com/Div-Man/laravel-vue-rest.git folder```
2. Перейти в папку с проектом.
3. ```composer update```
4. ```cp .env.example .env```
5. ```php artisan key:generate```
6. Настроить подключение к БД в .env

Если нужно наполнение базы продуктами, то выполнить команду:
```php artisan db:seed --class=DatabaseSeeder```

При необходимости, если будет ошибка **Permission denied**, изменить доступ к папкам и файлам

1. ```sudo chown -R www-data:www-data storage/logs```
2. ```sudo chown -R www-data:www-data storage/framework/sessions```
3. ```sudo chown -R www-data:www-data storage/framework```
4. ```sudo chown -R www-data:www-data storage/framework/cache```
5. ```sudo chown -R $USER:www-data storage```
6. ```sudo chown -R $USER:www-data bootstrap/cache```
7. ```sudo chmod -R 775 storage```
8. ```sudo chmod -R ugo+rw storage```

Зарегистрировать пользователя (подтверждать почту не нужно).

***
Конфигурая Apache, которая использоватлась при разработке:

```
<VirtualHost *:80>
    ServerName localhost
    DocumentRoot /var/www/rest/public
    RewriteEngine On

    <Directory /var/www/rest/public/>
        AllowOverride All
        Order allow,deny
        Allow from all

        RewriteEngine On
        RewriteBase /
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule . /index.html [L]
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

![Alt text](https://github.com/Div-Man/laravel-vue-rest/blob/master/public/img/rest1.png)
![Alt text](https://github.com/Div-Man/laravel-vue-rest/blob/master/public/img/rest2.png)
![Alt text](https://github.com/Div-Man/laravel-vue-rest/blob/master/public/img/rest3.png)
![Alt text](https://github.com/Div-Man/laravel-vue-rest/blob/master/public/img/rest4.png)
![Alt text](https://github.com/Div-Man/laravel-vue-rest/blob/master/public/img/rest5.png)
![Alt text](https://github.com/Div-Man/laravel-vue-rest/blob/master/public/img/rest6.png)
![Alt text](https://github.com/Div-Man/laravel-vue-rest/blob/master/public/img/rest7.png)
![Alt text](https://github.com/Div-Man/laravel-vue-rest/blob/master/public/img/rest8.png)



