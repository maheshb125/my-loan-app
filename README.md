
## About My Loan App

Loan app for best services

--------

This app can configure using follwong two options

1. Docker
2. XAMPP

### 1. Docker 

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


---

## OR 

### 2. Xampp

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

> http://localhost:8000/