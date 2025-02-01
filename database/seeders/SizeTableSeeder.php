<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::create([
            'size' => '40',
        ]);
        Size::create([
            'size' => '41',
        ]);
        Size::create([
            'size' => '42',
        ]);
        Size::create([
            'size' => '43   ',
        ]);
        Size::create([
            'size' => '44',
        ]);
        Size::create([
            'size' => '45',
        ]);

        Size::create([
            'size' => 'Small',
        ]);
        Size::create([
            'size' => 'Medium',
        ]);
        Size::create([
            'size' => 'Large',
        ]);
       
        Size::create([
            'size' => 'None',
        ]);
    }
}
