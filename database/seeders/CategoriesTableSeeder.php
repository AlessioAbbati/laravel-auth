<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
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
                'name' => 'HTML-CSS',
                'description' => 'lorem ipsum',
            ],
            [
                'name' => 'JS',
                'description' => 'lorem ipsum',
            ],
            [
                'name' => 'VUE-JS',
                'description' => 'lorem ipsum',
            ],
            [
                'name' => 'PHP',
                'description' => 'lorem ipsum',
            ],
            [
                'name' => 'BLADE',
                'description' => 'lorem ipsum',
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
