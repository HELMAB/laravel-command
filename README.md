Laravel command
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
Which process? [List user]:
  [0] List user
  [1] List role
  [2] List permission
  [3] Change user's password
  [4] Change E-mail address
 > 
```

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
