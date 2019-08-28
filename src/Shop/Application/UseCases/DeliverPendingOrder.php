<?php
namespace Hexa\Shop\Application\UseCases;

use Hexa\Shop\Domain\Repositories\PetRepository;
use Hexa\Shop\Domain\Repositories\UserRepository;
use Hexa\Shop\Domain\Repositories\InsuranceRepository;
use Hexa\Shop\Domain\Repositories\OrderRepository;

class DeliverPendingOrder
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function __invoke(int $orderId)
    {
        $data = [];

        if(date("D") != ['Mon']) {
            throw new \Exception('Pending order deliver only on Monday');
        }

        $order = $this->orderRepository->find($orderId);

        if (!$order) {
            throw new \Exception('Order not found');
        }

        if ($order->status == 'delivered') {
            throw new \Exception('Order already delivered');
        }

        if ($order->pet->category->need_chip && is_null($order->pet->chip_identifier)) {
            throw new \Exception('Order cannot be delivered without chip');
        }

        $order->fill([
            'status' => 'delivered'
        ]);
        $order->save();

        $pet = $order->pet;

        $pet->fill([
            'status' => 'sold'
        ]);
        $pet->save();

        return $order;
    }

}
