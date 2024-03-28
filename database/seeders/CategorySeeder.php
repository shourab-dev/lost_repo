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
       $testData = new Category();
       $testData->category = 'mobile';
       $testData->category_slug = 'mobile';
       $testData->save();
       $testData = new Category();
       $testData->category = 'mobile 1';
       $testData->category_slug = 'mobile-1';
       $testData->save();
       $testData = new Category();
       $testData->category = 'mobile2';
       $testData->category_slug = 'mobile-2';
       $testData->save();
       $testData = new Category();
       $testData->category = 'mobile 3';
       $testData->category_slug = 'mobile-3';
       $testData->save();
    }
}
