# PHP Laravel Eloquent
This project utilizes Laravel and Eloquent to allow users to navigate to their organization.

## Usage
Add these 2 lines to the hosts file located at C:/Windows/System32/drivers/etc/hosts
127.0.0.1 localhost
127.0.0.1 leloquent.me      #laravel app

This will allow you to type in leloquent.me in your address and load the application.

There are two types of users.
1. Admin
2. User

The Admin account can add an organization to allow a user to sign up to the organization. They can also disable or delete users from an organization.

The User account can login and view their organization.

## Commands used
composer create-project laravel/laravel Leloquent
- This created a new Laravel Project

php artisan make:controller PagesController
- create a new controller for pages

php artisan make:controller OrganizationsController --resource
- create a new controller for organizations that includes resource CRUD functions

php artisan make:model Organization -m
- create a new model with a migration

php artisan make:migration <name of the new migration>
- creates a new migration with the name provided

php artisan migrate
- apply migrations

php artisan tinker
- directly interact with the database to create seed data manually

php artisan route:list
- map out the route list for all the routes based on resources

composer require laravel/ui --dev
- to allow authentication scaffolding

php artisan ui bootstrap
- install bootstrap

php artisan bootstrap ui:auth
- create the authentication with boostrap as the UI

composer dump-autoload
- dump all the auto loaded data to allow reindexing from 1

php artisan migrate:refresh --seed
- drop and recreate tables and populate the tables based on new seed data

php artisan db:seed
- calls the function in DatabaseSeeder.php to seed data based on other seeder files

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
