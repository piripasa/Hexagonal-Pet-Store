<?php

namespace Hexa\Shop\Domain\Repositories;

use Hexa\Shop\Infrastructure\Persistence\Models\Category;
use Hexa\Shop\Infrastructure\Persistence\Repository;

class CategoryRepository extends Repository
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return Category::class;
    }

}
