# pay-star

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

### Run Feature test
```
./vendor/bin/pest
```
### Login with this user
```
email: admin@admin.com
```
```
password: UnicornsAreSweet
```

