<?php
namespace Hexa\Shop\Application\UseCases;

use Hexa\Shop\Domain\Repositories\PetRepository;
use Hexa\Shop\Domain\Services\PetService;

class MoveToBackyard
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

        if (empty($ids)) {
            $pets = $this->petService->fetchShowroomPets();
        } else {
            $pets = $this->petService->fetchPetsById($ids);
        }
        foreach ($pets as $key => $pet) {
            $this->process($pet->id);
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

        if ($pet->status == 'backyard') {
            throw new \Exception('Pet already in backyard');
        }

        if ($this->petService->getBackyardCount($pet->category_id) >= $pet->category->backyard_limit) {
            throw new \Exception('Backyard space full');
        }

        $pet->fill(['status' => 'backyard']);
        $pet->save();

        return $pet;
    }

}
