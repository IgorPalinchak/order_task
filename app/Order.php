<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Arr;

class Order extends Model
{
    protected $fillable = ['title'];
    public $timestamps = false;

    /**
     * @var array
     */
    public static $orderStatuses = [
        'pending',
        'done',
        'declined'
    ];

    /**
     * @param int $value
     * @return string|null
     */
    public function getOrderStatus($value)
    {
        return Arr::get($this->orderStatuses, $value);
    }

    /**
     * @return BelongsToMany
     */
    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    /**
     * @return HasOne
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }
}
