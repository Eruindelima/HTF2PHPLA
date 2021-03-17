<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::query()->create([
            'name' => 'Frutas',
        ]);
        Category::query()->create([
            'name' => 'Legumes',
        ]);
        Category::query()->create([
            'name' => 'Verduras',
        ]);
        Category::query()->create([
            'name' => 'Grãos',
        ]);
    }
}
