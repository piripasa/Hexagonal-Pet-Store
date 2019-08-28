<?php
namespace Hexa\Shop\Domain\Services;

use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetByCategory;
use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetHasNoChip;
use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetByStatus;
use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetById;
use Hexa\Shop\Domain\Repositories\PetRepository;
use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetPublic;

class PetService
{
    protected $petRepository;

    /**
     * PetService constructor.
     * @param PetRepository $petRepository
     */
    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    /**
     * @return mixed
     */
    public function fetchShowroomPets()
    {
        return $this->petRepository->getByCriteria(new PetByStatus('showroom'))->all();
    }

    public function fetchPetsById(array $ids)
    {
        return $this->petRepository->getByCriteria(new PetById($ids))->all();
    }

    /**
     * @return mixed
     */
    public function fetchShowroomPublicPets()
    {
        return $this->petRepository->getByCriteria(new PetByStatus('showroom'))
        ->getByCriteria(new PetPublic())
        ->all();
    }

    /**
     * @return mixed
     */
    public function fetchBackyardPets()
    {
        return $this->petRepository->getByCriteria(new PetByStatus('backyard'))->all();
    }

    /**
     * @return mixed
     */
    public function fetchSoldPets()
    {
        return $this->petRepository->getByCriteria(new PetByStatus('sold'))->all();
    }

    /**
     * @return mixed
     */
    public function fetchNonChipPets()
    {
        return $this->petRepository->getByCriteria(new PetHasNoChip())->all();
    }

    public function getBackyardCount(int $categoryId)
    {
        return $this->petRepository->getByCriteria(new PetByStatus('backyard'))
        ->getByCriteria(new PetByCategory($categoryId))
        ->all()
        ->count();
    }

    public function getShowroomCount(int $categoryId)
    {
        return $this->petRepository->getByCriteria(new PetByStatus('showroom'))
        ->getByCriteria(new PetByCategory($categoryId))
        ->all()
        ->count();
    }

}
