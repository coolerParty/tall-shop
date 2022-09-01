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
            ['name' => 'Starter',   'slug' => 'starter',    'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'slug' => 'main',       'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sides',     'slug' => 'sides',      'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'slug' => 'desserts',   'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
