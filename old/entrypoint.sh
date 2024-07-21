#!/bin/sh

# Ensure we are in the correct directory
cd /var/www

#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

# Execute migrations if the database is empty
echo "Running migrations..."
php artisan migrate --force

# Populate the database if needed
echo "Running seeds..."
php artisan db:seed --force

