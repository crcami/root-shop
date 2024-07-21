#!/bin/sh

echo "=====> Entrypoint Start"

# Ensure we are in the correct directory
cd /var/www

# Execute Composer Install
echo "Running composer install..."
composer install --no-interaction --optimize-autoloader
composer require --dev fakerphp/faker

# Clear caches to ensure clean state
echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan cache:clear

# Cache config and routes
echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache || {
  echo "Skipping route cache due to error"
  exit 1
}

# Execute migrations if the database is empty
echo "Running migrations..."
php artisan migrate --force

# Populate the database if needed
echo "Running seeds..."
php artisan db:seed --force

echo "=====> Entrypoint Concluded!"
