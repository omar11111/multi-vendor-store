<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "name" => "cat1",
                "slug" => "cat_1",
            ], 
            [
                "name" => "cat2",
                "slug" => "cat_2",
            ], 
            [
                "name" => "cat3",
                "slug" => "cat_3",
            ]
        ];

        Category::insert($categories);
    }
}
