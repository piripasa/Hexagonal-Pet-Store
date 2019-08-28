## Hexagonal Pet Store

Pet store using hexagonal architecture. DDD approach. 

### Framework & tools

- Laravel 5.6 (PHP framework)
- Sqlite (file based db for storing data) 
- Composer (for installing dependencies)


Unit test cases: tests/
Command Bus: app/Console/Commands
DDD: src/


### Installation
Make Sure you have installed inyour PC:

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer (https://getcomposer.org/)

To do:

- Run `composer install`
- Run `sudo chgrp -R www-data storage bootstrap/cache`
- Run `sudo chmod -R ug+rwx storage bootstrap/cache`
- Run `php artisan migrate:refresh --seed`
- Run `./vendor/bin/phpunit tests/` for PHPUnit test


Use case/Domain Command:
- `php artisan pets:chip-implant`             Implant Chip
- `php artisan pets:create`                   Add new pet
- `php artisan pets:move-to-backyard`         Move pet to backyard from showroom
- `php artisan pets:move-to-showroom`         Move pet to showroom from backyard
- `php artisan pets:sell`                     Sell pet
- `php artisan pets:showroom-list`            Show list of pets that should be in the showroom
- `php artisan pets:vet-list`                 Show list of pets that should go to vet
- `php artisan orders:deliver`                Deliver pending pet order
- `php artisan customers:pending-order-list`  Show list of customers that need to be contacted

