# Laravel Sanctum
A featherweight authentication system for SPAs.

## Requirements
- Composer 2.7.x or higher
- 8.3.x or higher
- Node.js 20.x.x or higher

## Setup
- To install project dependencies
    - `composer install`
    - `npm install`
- Copy `.env.example` to `.env`
- Copy `.env.testing.example` to `.env.testing`
- Run `php artisan key:generate` to create application key
- Run `php artisan key:generate --env=testing` to create application key for testing
- Run `php artisan migrate` to execute outstanding migrations
- Run `php artisan db:seed` to seed all tables with records
- Run `php artisan migrate --seed` to drop all tables and run all migrations and seed all tables with records
- Run `php artisan migrate:fresh --seed` to drop all tables and re-run all migrations and seed all tables with records
- Run `php artisan test` to run the application tests


> Postman documentation [here](https://documenter.getpostman.com/view/3065626/2sA3s9CTcc).
