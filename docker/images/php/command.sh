#!/usr/bin/env bash
composer install
php artisan migrate
php -S lumen:8000 -t public