#!/usr/bin/env bash

echo 'Installing composer'
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

echo 'Running composer'
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo 'Caching config...'
php artisan config:cache

echo 'Caching routes...'
php artisan route:cache

echo 'Running migrations...'
php artisan migrate --force
