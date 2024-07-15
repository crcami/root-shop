#!/bin/sh

# Execute o Composer Install
composer install

# Execute as migrações
php artisan migrate:fresh

# Popule o banco de dados
php artisan db:seed

# Inicie o php-fpm
php-fpm
