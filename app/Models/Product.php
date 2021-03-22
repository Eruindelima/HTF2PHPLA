<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function order() {
        return $this->hasOne(Order::class, 'prod_id', 'id');
    }

}
