#!/usr/bin/env bash

set -e
echo Starting services
docker-compose up -d
echo "Installing dependencies"
docker-compose exec php composer install
docker-compose exec php chgrp -R www-data storage
docker-compose exec php chmod -R ug+rwx storage
echo "Migrating database"
touch database/database.sqlite
docker-compose exec php php artisan migrate:refresh --seed
echo "Unit testing..."
docker-compose exec php vendor/bin/phpunit tests/
docker-compose exec php bash