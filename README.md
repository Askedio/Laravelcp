# LaravelCP v2
## A Modular/Packaged based Control Panel for Laravel
Features:
* Laravel 5.1
* Bootstrap 3
* jQuery 2
* RBAC
* User auth


# Installation
    composer create-project laravel/laravel your-project-name --prefer-dist
    cd your-project-name
    #configure database in .env
    composer require "askedio/laravelcp:dev-master"
    #append to providers array - Askedio\Laravelcp\Providers\LaravelcpServiceProvider::class,
    php artisan vendor:publish 
    composer dump-autoload
    php artisan db:seed --class=UserTableSeeder

## Register with config/app.php

    Askedio\Laravelcp\Providers\LaravelcpServiceProvider::class,

## Test

    php artisan serv

Default login is:
    admin@localhost
    password
    
# Provides:
* http://localhost:8000/dashboard
* http://localhost:8000/auth/login
* http://localhost:8000/auth/logout
* http://localhost:8000/auth/register
* http://localhost:8000/password/email




# Screenshots
![ScreenShot](http://i.imgur.com/NKBbdLz.png)
![ScreenShot](http://i.imgur.com/IIJljj4.png)
![ScreenShot](http://i.imgur.com/kyrGV5G.png)
![ScreenShot](http://i.imgur.com/hklO2Xf.png)

# Developing notes
## Create Migration
php artisan make:migration test --path="vendor\askedio\laravelcp\src\Database\Migrations"

## Migrate
php artisan migrate --path="vendor\askedio\laravelcp\src\Database\Migrations"
