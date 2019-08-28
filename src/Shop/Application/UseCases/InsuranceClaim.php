<?php
namespace Hexa\Shop\Application\UseCases;

use Carbon\Carbon;
use Hexa\Shop\Domain\Repositories\OrderRepository;
use Hexa\Shop\Domain\Services\PetService;

class InsuranceClaim
{
    private $orderRepository;
    private $petService;

    public function __construct(OrderRepository $orderRepository, PetService $petService)
    {
        $this->orderRepository = $orderRepository;
        $this->petService = $petService;
    }

    public function __invoke(int $orderId)
    {
        $order = $this->orderRepository->find($orderId);

        if (!$order) {
            throw new \Exception('Order not found');
        }

        if ($order->status == 'pending') {
            throw new \Exception('Order not delivered yet');
        }

        if ($order->status == 'return') {
            throw new \Exception('Insurance already claimed');
        }

        if (!$order->insurance_id) {
            throw new \Exception('No insurance found for this order');
        }

        if (Carbon::now()->diffInMonths(Carbon::parse($order->created_at)) > $order->insurance->return_duration) {
            throw new \Exception('Insurance claim time over');
        }

        $pet = $order->pet;

        if ($this->petService->getShowroomCount($pet->category_id) >= $pet->category->showroom_limit) {
            throw new \Exception('Showroom space full');
        }

        $pet->fill(['status' => 'showroom', 'public' => 0]);
        $pet->save();

        $order->fill([
            'cash_back' => round($order->price * ($order->insurance->cash_back/100)),
            'status' => 'return'
        ]);
        $order->save();

        return $order;
    }
}
