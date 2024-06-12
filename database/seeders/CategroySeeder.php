<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategroySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'programming',
        ]);
        Category::create([
            'name' => 'medical',
        ]);
        Category::create([
            'name' => 'english',
        ]);
    }
}
