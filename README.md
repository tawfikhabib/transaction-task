## Transaction Application
This is an application that serves as accepting payment and store transaction auditing. Application is built with Laravel 8 (as backend) and Vue 2 (as frontend). For this, we have 3 APIs. First API will provide mock response, the second API will store transaction data and third API will be a callback API for updating specific transactions.

## Installation
1. Clone the repo
```sh
git clone https://github.com/tawfikhabib/transaction-task.git
```

2. Run below commands
```sh
composer install
npm install
```

3. Create .env file
```sh
cp .env.example .env
php artisan key:generate
```

4. Create MySQL Database and set Database credential on .env file
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projectdb
DB_USERNAME=root
DB_PASSWORD=
```

6. Run migration command to create database table
```sh
php artisan migrate
```

7. Run below command to compile scripts
```sh
npm run dev
```

8. Run application
```sh
php artisan serve
```

## Run Test cases
```sh
php artisan test
```
Change test cases accordingly in /tests/Feature files to change and rerun the test.
