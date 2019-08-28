<?php

namespace Hexa\Shop\Domain\Repositories\Criteria\Pet;

use Hexa\Shop\Infrastructure\Persistence\Criteria;
use Hexa\Shop\Infrastructure\Persistence\RepositoryInterface as Repository;

class PetByStatus extends Criteria
{
    protected $status;

    /**
     * Class constructor.
     */
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->where('status', $this->status);
        return $query;
    }
}
