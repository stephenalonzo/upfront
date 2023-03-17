<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Declare categories variable and assign array with categories
        $categories = [
            [
                'title' => 'Bug',
                'color' => '#ffd166'
            ],
            [
                'title' => 'Support',
                'color' => '#06d6a0'
            ],
            [
                'title' => 'Question',
                'color' => '#073b4c'
            ],
            [
                'title' => 'New Installation',
                'color' => '#ef476f'
            ],
        ];

        foreach ($categories as $category)
        {

            Category::create([
                'title' => $category['title'],
                'color' => $category['color']
            ]);

        }

    }
    
}
