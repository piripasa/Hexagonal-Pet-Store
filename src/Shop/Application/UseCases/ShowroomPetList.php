<?php
namespace Hexa\Shop\Application\UseCases;

use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetByStatus;
use Hexa\Shop\Domain\Repositories\PetRepository;

class ShowroomPetList
{
    private $petRepository;

    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function __invoke()
    {
        return $this->petRepository->getByCriteria(new PetByStatus('showroom'))->all();
    }
}
