# LaravelCP is back once again. 
## This time learning from my past mistakes.

From day one we will be creating this as a seperate package, utilizing all of Larvels features without editing it directly.

The goal, once again, is for a completly Modular software with different packages you can inject, like our 'l4cp-support' package last year.

Check the branches. I will post in stages, Stage 1 will be the base vendor package to build as a core to any additional Modules.

Stay tuned on asked.io for tutorials that will go along with the development of this project.

# Installation
## Add to composer.json
 
    "askedio/laravelcp": "dev-master",

## Or

    composer require askedio/laravelcp


## Register with config/app.php

    Askedio\Laravelcp\Providers\LaravelcpServiceProvider::class,

## Test

    php artisan serv

Browse to http://localhost:8000/test

## Publish
        php artisan vendor:publish 
## Migrate
        php artisan migrate
## Seed
        php artisan db:seed 

# Using this package
You can use the 'base' version to rapidly develop vendor/composer based packages. Clone the git repo, rename it, rename the namespaces, and off you go! Now all of your Laravel code will be in your own vendor module :D

# Developing notes
I like to develop in vendor, if you don't - who cares? It's a personal prefrence, my goal is to not change Laravel at all, not even the composer. These notes are for me to have a quick refrence for creating new features within the correct path.


## Create Migration
php artisan make:migration test --path="vendor\askedio\laravelcp\src\Database\Migrations"

## Migrate
php artisan migrate --path="vendor\askedio\laravelcp\src\Database\Migrations"
