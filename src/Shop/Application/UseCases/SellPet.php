<?php
namespace Hexa\Shop\Application\UseCases;

use Hexa\Shop\Domain\Repositories\PetRepository;
use Hexa\Shop\Domain\Repositories\UserRepository;
use Hexa\Shop\Domain\Repositories\InsuranceRepository;
use Hexa\Shop\Domain\Repositories\OrderRepository;

class Sellpet
{
    private $petRepository;
    private $userRepository;
    private $insuranceRepository;
    private $orderRepository;

    public function __construct(PetRepository $petRepository, UserRepository $userRepository, InsuranceRepository $insuranceRepository, OrderRepository $orderRepository)
    {
        $this->petRepository = $petRepository;
        $this->userRepository = $userRepository;
        $this->insuranceRepository = $insuranceRepository;
        $this->orderRepository = $orderRepository;
    }

    public function __invoke(int $customerId, int $petId, int $insuranceId = null, string $upfront = 'no')
    {
        $data = [];

        if(in_array(date("D"), ['Sat', 'Sun'])) {
            throw new \Exception('Shop closed');
        }

        $customer = $this->userRepository->find($customerId);

        if (!$customer) {
            throw new \Exception('Customer not found');
        }
        $data['user_id'] = $customerId;

        $pet = $this->petRepository->find($petId);

        if (!$pet) {
            throw new \Exception('Pet not found');
        }

        if (!$pet->public) {
            throw new \Exception('Pet already sold');
        }

        if ($pet->status == 'backyard') {
            throw new \Exception('Backyard pet not for sell');
        }
        $data['pet_id'] = $petId;
        $data['price'] = $pet->price;
        $data['status'] = 'delivered';

        if ($pet->category->need_chip && is_null($pet->chip_identifier)) {
            //throw new \Exception('Pet cannot be sold!');
            if ($upfront == 'no') {
                throw new \Exception('Upfront required if pet has no chip');
            }
            $data['price'] = $data['price'] + $pet->category->chip_price;
            $data['upfront'] =  round($data['price'] * ($pet->category->upfront/100));
            $data['due'] = $data['price'] - $data['upfront'];
            $data['status'] = 'pending';
        }

        if ($insuranceId) {
            $insurance = $this->insuranceRepository->find($insuranceId);
            if (!$insurance) {
                throw new \Exception('Insurance not found');
            }
            $data['insurance_id'] = $insuranceId;
        }

        $order = $this->orderRepository->create($data);

        if ($order) {
            $pet->fill([
                'status' => $order->status == 'delivered' ? 'sold' : 'showroom',
                'public' => 0
            ]);
            $pet->save();
        }
        return $order;
    }

}
