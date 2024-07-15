#!/bin/sh

# Set COMPOSER_ALLOW_SUPERUSER environment variable
export COMPOSER_ALLOW_SUPERUSER=1

# Run Composer Install
composer install --no-interaction --optimize-autoloader --no-dev

# Run database migrations
php artisan migrate --force

# Popule o banco de dados
php artisan db:seed

# Inicie o php-fpm
php-fpm
