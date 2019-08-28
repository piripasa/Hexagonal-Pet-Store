<?php

namespace Hexa\Shop\Domain\Repositories\Criteria\Pet;

use Hexa\Shop\Infrastructure\Persistence\Criteria;
use Hexa\Shop\Infrastructure\Persistence\RepositoryInterface as Repository;

class PetHasNoChip extends Criteria
{

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->whereNull('chip_identifier')->whereIn('category_id', [1,2]);
        return $query;
    }
}
