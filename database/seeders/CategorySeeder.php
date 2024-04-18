<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category' => "furniture",
                'slug' => "furniture",
                'icon' => 'demo/product/categories/furni-2.png',
            ],
            [
                'category' => "jewelry",
                'slug' => "jewelry",
                'icon' => 'demo/product/categories/jewelry-3.png',
            ],
            [
                'category' => "Electornics",
                'slug' => "electronics",
                'icon' => 'demo/product/categories/elec-5.png',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
