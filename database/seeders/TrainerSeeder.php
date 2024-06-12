<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trainer::create([
            'name' => 'Sabry Mohamed',
            'specialty' => 'web development',
            'img' => '1.jpg',
        ]);

        Trainer::create([
            'name' => 'Abdo Mohamed',
            'specialty' => 'network',
            'img' => '2.jpg',
        ]);
        Trainer::create([
            'name' => 'Mohamed Sabry',
            'specialty' => 'mobile applecation',
            'img' => '3.jpg',
        ]);
        Trainer::create([
            'name' => 'Omer Wagdey',
            'specialty' => 'web desgin',
            'img' => '4.jpg',
        ]);
    }
}
