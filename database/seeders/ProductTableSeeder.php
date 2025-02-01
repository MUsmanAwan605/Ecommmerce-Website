<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'date' => '2024-01-15',
                'category_id' => rand(1, 5), // Random category for each product
                'prod' => 'Product ' . $i,
                'descp' => 'Description for Product ' . $i,
                'prod_price' => rand(1000, 1500), // Random price
                'selling_price' => rand(500, 1500), // Random price
                'discount_percent' => rand(5, 20), // Random discount
                'prod_img' => 'Image will be here',
                'stock' => rand(10, 100), // Random stock
                'model' => 'model' . $i,
                'delivery' => 'Image will be here',
                'size' => 'small',
                'slug' => 'product-' . $i,
            ]);
        }
}
}
