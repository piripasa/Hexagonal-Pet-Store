<?php

namespace Hexa\Shop\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 
        'status', 
        'upfront', 
        'pet_id', 
        'user_id', 
        'insurance_id'
    ];

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
