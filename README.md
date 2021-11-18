Install
===

1. cp .env.example .env
2. config .env APP_URL, DB...
3. composer install
4. php artisan key:generate
5. php artisan migrate:fresh --seed
6. php artisan storage link