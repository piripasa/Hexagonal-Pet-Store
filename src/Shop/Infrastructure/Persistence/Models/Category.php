<?php

namespace Hexa\Shop\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
