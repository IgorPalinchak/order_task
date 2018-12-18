<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = ['title'];
    public $timestamps = false;

    /**
     * @return BelongsToMany
     */
    public function orders() : BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_products');
    }
}
