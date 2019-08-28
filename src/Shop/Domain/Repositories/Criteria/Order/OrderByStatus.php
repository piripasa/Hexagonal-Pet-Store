<?php

namespace Hexa\Shop\Domain\Repositories\Criteria\Order;

use Hexa\Shop\Infrastructure\Persistence\Criteria;
use Hexa\Shop\Infrastructure\Persistence\RepositoryInterface as Repository;

class OrderByStatus extends Criteria
{

    public $status;

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
