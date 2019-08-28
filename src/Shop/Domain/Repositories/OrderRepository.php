<?php

namespace Hexa\Shop\Domain\Repositories;

use Hexa\Shop\Infrastructure\Persistence\Models\Order;
use Hexa\Shop\Infrastructure\Persistence\Repository;

class OrderRepository extends Repository
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return Order::class;
    }

}
