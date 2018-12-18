<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Validator;

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
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function validateRequest()
    {

    }
}
