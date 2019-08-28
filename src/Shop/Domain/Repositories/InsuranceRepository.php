<?php

namespace Hexa\Shop\Domain\Repositories;

use Hexa\Shop\Infrastructure\Persistence\Models\Insurance;
use Hexa\Shop\Infrastructure\Persistence\Repository;

class InsuranceRepository extends Repository
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return Insurance::class;
    }

}
