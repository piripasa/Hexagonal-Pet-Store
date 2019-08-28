<?php
namespace Hexa\Shop\Application\UseCases;

use Hexa\Shop\Domain\Services\OrderService;

class CustomerList
{
    private $orderService;

    public function __construct(OrderService $OrderService)
    {
        $this->orderService = $OrderService;
    }

    public function __invoke()
    {
        $orders = $this->orderService->fetchPendingOrders();
        $c = collect();
        foreach ($orders as $key => $order) {
            $c->push($order->user);
        }
        return $c;
    }
}
