# pay-star

### you need to setup your local database in .env for both docker or local setups
## For Local Setup

````
git clone https://github.com/darynazar/pay-star.git
````
````
copy env.example to .env file(if isnt exist create it)
````
````
composer install
````
````
php artisan key:generate
````
````
php artisan migrate:fresh --seed
````
````
php artisan jwt:secret
````
