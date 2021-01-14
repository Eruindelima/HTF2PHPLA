<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'Jorjão',
            'email' => 'jorjao@hotfood.com',
            'password' => bcrypt('12345'),
        ]);
        User::query()->create([
            'name' => 'Gabirel',
            'email' => 'gabriel@hotfood.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
