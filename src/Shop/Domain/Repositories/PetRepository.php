<?php

namespace Hexa\Shop\Domain\Repositories;

use Hexa\Shop\Infrastructure\Persistence\Models\Pet;
use Hexa\Shop\Infrastructure\Persistence\Repository;

class PetRepository extends Repository
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return Pet::class;
    }

}
