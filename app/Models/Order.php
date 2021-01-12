<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'product_order';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
