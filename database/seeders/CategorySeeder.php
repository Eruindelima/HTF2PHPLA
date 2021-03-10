<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::query()->create([
            'name' => 'Fruta',
        ]);
        Category::query()->create([
            'name' => 'Legume',
        ]);
        Category::query()->create([
            'name' => 'Verdura',
        ]);
    }
}
