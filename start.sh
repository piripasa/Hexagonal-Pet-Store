#!/usr/bin/env bash

set -e
echo "Installing dependencies"
composer install
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
touch database/database.sqlite
php artisan migrate:refresh --seed
./vendor/bin/phpunit tests/