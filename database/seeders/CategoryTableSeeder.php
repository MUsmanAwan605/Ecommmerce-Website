<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['date' => Carbon::now(), 'title' => 'Shoes', 'descp' => 'Various types of shoes.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Watches', 'descp' => 'Stylish watches for all occasions.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Bags', 'descp' => 'Trendy bags for every need.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Men\'s Clothes', 'descp' => 'Latest fashion in men\'s clothing.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Women\'s Clothes', 'descp' => 'Stylish women\'s clothing.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Sneakers', 'descp' => 'Comfortable and stylish sneakers.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Baby Shops', 'descp' => 'Everything for your little one.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Rings', 'descp' => 'Beautiful rings for all occasions.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Accessories', 'descp' => 'Fashion accessories to enhance your look.', 'b_img' => 'Image will be here'],
            ['date' => Carbon::now(), 'title' => 'Gadgets', 'descp' => 'Latest gadgets and technology.', 'b_img' => 'Image will be here'],
        ];

        foreach ($categories as $category){
            Category::create($category);
        }
    }

}
