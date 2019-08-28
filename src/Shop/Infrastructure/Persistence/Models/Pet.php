<?php

namespace Hexa\Shop\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'dob', 
        'price', 
        'chip_identifier', 
        'chip_price',
        'chip_implanted_at', 
        'description', 
        'status', 
        'category_id',
        'public'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
