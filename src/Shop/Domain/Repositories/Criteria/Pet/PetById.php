<?php

namespace Hexa\Shop\Domain\Repositories\Criteria\Pet;

use Hexa\Shop\Infrastructure\Persistence\Criteria;
use Hexa\Shop\Infrastructure\Persistence\RepositoryInterface as Repository;

class PetById extends Criteria
{
    protected $ids;

    /**
     * Class constructor.
     */
    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->whereIn('id', $this->ids);
        return $query;
    }
}
