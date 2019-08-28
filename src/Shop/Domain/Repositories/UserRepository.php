<?php

namespace Hexa\Shop\Domain\Repositories;

use Hexa\Shop\Infrastructure\Persistence\Models\User;
use Hexa\Shop\Infrastructure\Persistence\Repository;

class UserRepository extends Repository
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return User::class;
    }

}
