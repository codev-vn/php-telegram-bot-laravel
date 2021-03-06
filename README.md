# Telegram Bot Package for Laravel 8.x

[![Build Status](https://travis-ci.org/codev-vn/php-telegram-bot-laravel.svg?branch=master)](https://travis-ci.org/codev-vn/php-telegram-bot-laravel)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/codev-vn/php-telegram-bot-laravel/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/codev-vn/php-telegram-bot-laravel/?b=master)
[![Code Quality](https://img.shields.io/scrutinizer/g/codev-vn/php-telegram-bot-laravel/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/codev-vn/php-telegram-bot-laravel/?b=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/codev-vn/php-telegram-bot-laravel.svg)](https://packagist.org/packages/codev-vn/php-telegram-bot-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/codev-vn/php-telegram-bot-laravel.svg)](https://packagist.org/packages/codev-vn/php-telegram-bot-laravel)
[![Downloads Month](https://img.shields.io/packagist/dm/codev-vn/php-telegram-bot-laravel.svg)](https://packagist.org/packages/codev-vn/php-telegram-bot-laravel)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D5.5.9-8892BF.svg)](https://php.net/)
[![License](https://img.shields.io/packagist/l/codev-vn/php-telegram-bot-laravel.svg)](https://github.com/codev-vn/php-telegram-bot-laravel/LICENSE.md)

This package helps easily integrate [PHP Telegram Bot](https://github.com/php-telegram-bot/core) library in Laravel application.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [TODO](#todo)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)
- [Credits](#credits)

## Installation

Install this package a command in your command line:

    composer require codev-vn/php-telegram-bot-laravel

Copy the package config and migrations to your project with the publish command:

    php artisan vendor:publish --provider="PhpTelegramBot\Laravel\ServiceProvider"

After run migration command

    php artisan migrate

In the config you have to specify Telegram API KEY

## Usage

You can inject `PhpTelegramBot\Laravel\PhpTelegramBotContract` in anywhere and use bot instance

For example:

```php
<?php
namespace App\Http\Controllers;

use PhpTelegramBot\Laravel\PhpTelegramBotContract;

class CustomController extends Controller
{
    public function handle(PhpTelegramBotContract $telegramBot)
    {
        // Call handle method
        $telegramBot->handle();
        
        // Or set webhook 
        $hookUrl = 'https://hook.url';
        $telegramBot->setWebhook($hookUrl);
        
        // Or handle telegram getUpdates request
        $telegramBot->handleGetUpdates();
    }
}

```

More details about usage you can see on the PHP Telegram Bot docs: https://github.com/php-telegram-bot/core#instructions

## TODO

write more tests

## Troubleshooting

If you like living on the edge, please report any bugs you find on the
[codev-vn/php-telegram-bot-laravel issues](https://github.com/codev-vn/php-telegram-bot-laravel/issues) page.

## Contributing

Pull requests are welcome.
See [CONTRIBUTING.md](CONTRIBUTING.md) for information.

## License

Please see the [LICENSE](LICENSE.md) included in this repository for a full copy of the MIT license,
which this project is licensed under.
