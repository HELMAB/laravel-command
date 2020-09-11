Asorasoft Laravel Commands
--------------------------
A simple laravel command

## Installation

To install, you need to follow the below command in your root laravel project.
```php
composer require asorasoft/command
```
Your need to register the command service provider in `config/app.php` file.
```php
<?php

    /*
     * Package Service Providers...
     */
    Asorasoft\Command\AsorasoftCommandServiceProvider::class,
```

## Available commands

```phpregexp
php artisan asorasoft:user:change-password 
php artisan asorasoft:user:change-email 
php artisan asorasoft:user:where 
php artisan asorasoft:user:roles 
php artisan asorasoft:user:permissions 
php artisan asorasoft:user:set-roles 
php artisan asorasoft:user:set-permissions 
php artisan asorasoft:user:revoke-roles 
php artisan asorasoft:user:revoke-permissions 
```

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
