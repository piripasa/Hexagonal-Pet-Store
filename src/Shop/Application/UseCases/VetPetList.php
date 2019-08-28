<?php
namespace Hexa\Shop\Application\UseCases;

use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetHasNoChip;
use Hexa\Shop\Domain\Repositories\PetRepository;

class VetPetList
{
    private $petRepository;

    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function __invoke()
    {
        return $this->petRepository->getByCriteria(new PetHasNoChip())->all();
    }
}
