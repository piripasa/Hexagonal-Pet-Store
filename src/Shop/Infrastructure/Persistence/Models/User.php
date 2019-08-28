<?php

namespace Hexa\Shop\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function pendingOrders()
    {
        return $this->hasMany(Order::class)->where('status', 'pending');
    }
}
