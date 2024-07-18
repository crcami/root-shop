#!/bin/sh

# Ensure we are in the correct directory
cd /var/www

# Execute Composer Install
echo "Running composer install..."
composer install --no-interaction --optimize-autoloader

# Execute migrations if the database is empty
echo "Running migrations..."
php artisan migrate --force

# Populate the database if needed
echo "Running seeds..."
php artisan db:seed --force

# Ensure the storage and cache directories are writable
echo "Setting permissions for storage and cache..."
chown -R appuser:appuser /var/www/storage /var/www/bootstrap/cache

# Start PHP-FPM
echo "Starting PHP-FPM..."
exec php-fpm
