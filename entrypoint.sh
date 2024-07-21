#!/usr/bin/env bash
set -e

# Ensure we are in the correct directory
cd /var/www/html

echo "Running composer install"
composer install --no-dev --prefer-dist --optimize-autoloader

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Running seeds..."
php artisan db:seed --force

# Start the php-fpm server
exec "$@"
