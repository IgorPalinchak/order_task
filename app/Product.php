<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
