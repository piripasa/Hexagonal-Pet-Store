<?php
namespace Hexa\Shop\Domain\Services;

use Hexa\Shop\Domain\Repositories\Criteria\Order\OrderByStatus;
use Hexa\Shop\Domain\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @return mixed
     */
    public function fetchPendingOrders()
    {
        return $this->orderRepository->getByCriteria(new OrderByStatus('pending'))->all();
    }

    /**
     * @return mixed
     */
    public function fetchDeliveredOrders()
    {
        return $this->orderRepository->getByCriteria(new OrderByStatus('delivered'))->all();
    }

}
