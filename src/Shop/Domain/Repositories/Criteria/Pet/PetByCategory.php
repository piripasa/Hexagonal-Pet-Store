<?php

namespace Hexa\Shop\Domain\Repositories\Criteria\Pet;

use Hexa\Shop\Infrastructure\Persistence\Criteria;
use Hexa\Shop\Infrastructure\Persistence\RepositoryInterface as Repository;

class PetByCategory extends Criteria
{

    public $categoryId;

    /**
     * Class constructor.
     */
    public function __construct($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->where('category_id', $this->categoryId);
        return $query;
    }
}
