# Redica basic employee admin tool

This is a PHP project to manage employees using laravel.

## Installation

Before starting, please add the following to the .env file
```
WWWGROUP=1000
WWWUSER=1000
```

1000 is usually the right value, but you can get it from bash if required

```bash
id -g <username>
id -u <username>
```

Install dependencies via composer

```bash
composer install
```

Start the project by running
```bash
./vendor/bin/sail up
```

Run thee initial migrations and fill the sample data
```bash
php artisan migrate
php artisan db:seed --class=EmployeeSeeder

```

Finally let's install the basic auth module
```bash
 php artisan breeze:install
```

## Usage

After set up, you should be able to go to http://0.0.0.0/register and create as many user accounts as required.  
Currently, in order to make any customer an admin, the following mysql command should be executed:
```bash
>> mysql UPDATE users SET admin = 1 WHERE email = 'user@example.com';
```

Login with any previously created users at http://0.0.0.0/login
