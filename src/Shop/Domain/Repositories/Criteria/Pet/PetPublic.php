<?php

namespace Hexa\Shop\Domain\Repositories\Criteria\Pet;

use Hexa\Shop\Infrastructure\Persistence\Criteria;
use Hexa\Shop\Infrastructure\Persistence\RepositoryInterface as Repository;

class PetPublic extends Criteria
{

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->where('public', 1);
        return $query;
    }
}
