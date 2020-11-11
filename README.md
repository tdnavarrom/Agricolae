# Agricolae
Agro Shop for the Agricultural Industry

[Programming Rules]: https://github.com/tdnavarrom/Agricolae/blob/master/docs/programming_rules.md

### RUN

please install the following:

- php
- php composer
- laravel
- laravel-ui/auth

please execute the following commands before starting the server:

`composer install`

`composer fund`

Modify `.env` to point to the local database or cloud. Check [Programming Rules]


`php artisan cache:clear`

`php artisan config:clear`

`php artisan key:generate`

Migrate the database.

`php artisan migrate`

Initialize server:

`php artisan serve`


http://127.0.0.1:8000/ ---> home


See implementation http://agricolae.tk/public
