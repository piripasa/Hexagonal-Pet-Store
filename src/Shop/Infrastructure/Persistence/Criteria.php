<?php

namespace Hexa\Shop\Infrastructure\Persistence;

use Hexa\Shop\Infrastructure\Persistence\RepositoryInterface as Repository;

abstract class Criteria
{
    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);
}
