#!/usr/bin/env bash

echo 'Installing composer'
curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

echo 'Installing helper packages'
apt-get install -y zip
apt-get install -y git
apt-get install -y php8.2-pgsql

echo 'Running composer'
composer install --no-dev --working-dir=/var/www/html

echo 'Caching config...'
php artisan config:cache

echo 'Caching routes...'
php artisan route:cache

echo 'Running migrations...'
php artisan migrate --force
