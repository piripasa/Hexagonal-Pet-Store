<?php
namespace Hexa\Shop\Application\UseCases;

use Hexa\Shop\Domain\Repositories\PetRepository;
use Hexa\Shop\Domain\Services\PetService;

class MoveToShowroom
{
    private $petRepository;
    private $petService;

    public function __construct(PetRepository $petRepository, PetService $petService)
    {
        $this->petRepository = $petRepository;
        $this->petService = $petService;
    }

    public function __invoke(array $ids = [])
    {
        $count = 0;
         foreach ($ids as $petId) {
             $this->process($petId);
             $count++;
         }
         return $count;
    }

    private function process(int $id)
    {
        $pet = $this->petRepository->find($id);

        if (!$pet) {
            throw new \Exception('Pet not found');
        }

        if ($pet->status == 'showroom') {
            throw new \Exception('Pet already in showroom');
        }

        if ($this->petService->getShowroomCount($pet->category_id) >= $pet->category->showroom_limit) {
            throw new \Exception('Showroom space full');
        }

        $pet->fill(['status' => 'showroom']);
        $pet->save();

        return $pet;
    }

}
