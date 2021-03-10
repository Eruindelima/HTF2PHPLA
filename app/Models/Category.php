<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function category()
    {
        return $this->hasMany(Product::class);
    }

    public function getCreatedAtAttribute(string $value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
}
