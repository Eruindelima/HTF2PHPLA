<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'product_order';

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function getCreatedAtAttribute(string $value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
}
