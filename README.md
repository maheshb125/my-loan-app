<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About My Loan App

Loan app for best services

### Requirements 

> Install Docker


- `git clone https://github.com/maheshb125/my-loan-app.git`
- `cd my-loan-app`
- Setup .env file
- `docker-compose exec app php artisan key:generate`

### Docker restart
``` 
docker-compose restart app
docker-compose restart web
docker-compose restart db
 ```

 #### NPM
- `npm install`
- `npm run build`


#### DB : seed

- `php artisan db:seed --class=LoanDetailsSeeder`
- `php artisan db:seed --class=UserSeeder`

#### Clear cache:
 `docker-compose exec app php artisan cache:clear`

> http://localhost:8000/

### Xampp

- `git clone https://github.com/maheshb125/my-loan-app.git`
- `cd my-loan-app`
- Change .env DB Connection
- `php artisan key:generate`
- `composer install`
- `php artisan migrate`

#### NPM
- `npm install`
- `npm run build`


#### DB : seed

- `php artisan db:seed --class=LoanDetailsSeeder`
- `php artisan db:seed --class=UserSeeder`

#### RUN Application

-  `php artisan serve`