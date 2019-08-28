<?php
namespace Hexa\Shop\Application\UseCases;

use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetByCategory;
use Hexa\Shop\Domain\Repositories\Criteria\Pet\PetByStatus;
use Hexa\Shop\Domain\Repositories\CategoryRepository;
use Hexa\Shop\Domain\Repositories\PetRepository;

class StorePet
{
    private $categoryRepository;
    private $petRepository;

    public function __construct(CategoryRepository $categoryRepository, PetRepository $petRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->petRepository = $petRepository;
    }

    public function __invoke(array $inputData)
    {
        $category = $this->categoryRepository->find($inputData['category_id']);

        if (!$category) {
            throw new \Exception('Invalid category');
        }

        if ($this->getBackyardCount($category->id) >= $category->backyard_limit) {
            throw new \Exception('Store space full');
        }

        return $this->petRepository->create($inputData);
    }

    private function getBackyardCount(int $categoryId)
    {
        return $this->petRepository->getByCriteria(new PetByStatus('backyard'))
        ->getByCriteria(new PetByCategory($categoryId))
        ->all()
        ->count();
    }
}
