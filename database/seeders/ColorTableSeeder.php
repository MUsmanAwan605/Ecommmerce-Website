<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create([
            'name' => 'Blue',
            'code' => 'Blue',
        ]);
        Color::create([
            'name' => 'Green',
            'code' => 'Green',
        ]);
        Color::create([
            'name' => 'Yellow',
            'code' => 'Yellow',
        ]);
        Color::create([
            'name' => 'Red',
            'code' => 'Red',
        ]);
        Color::create([
            'name' => 'Black',
            'code' => 'Black',
        ]);
        Color::create([
            'name' => 'White',
            'code' => 'White',
        ]);
        Color::create([
            'name' => 'Orange',
            'code' => 'Orange',
        ]);
        Color::create([
            'name' => 'Sky Blue',
            'code' => 'Sky Blue',
        ]);
        Color::create([
            'name' => 'Gold',
            'code' => 'Gold',
        ]);
       

    }
}
