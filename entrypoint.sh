#!/bin/sh

# Ensure we are in the correct directory
cd /var/www

# Execute Composer Install
composer install --no-interaction --optimize-autoloader

# Execute migrations if the database is empty
php artisan migrate --force

# Populate the database if needed
php artisan db:seed --force

# Start php-fpm
php-fpm
