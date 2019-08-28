<?php

namespace Hexa\Shop\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
