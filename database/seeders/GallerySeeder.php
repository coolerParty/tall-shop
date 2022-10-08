<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galleries = [
            ['name' => 'Starter',   'image' => '1.jpg',  'category_id' => 1, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '2.jpg',  'category_id' => 2, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sides',     'image' => '3.jpg',  'category_id' => 3, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'image' => '4.jpg',  'category_id' => 4, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Starter',   'image' => '5.jpg',  'category_id' => 1, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '6.jpg',  'category_id' => 2, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sides',     'image' => '7.jpg',  'category_id' => 3, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'image' => '8.jpg',  'category_id' => 4, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Starter',   'image' => '9.jpg',  'category_id' => 1, 'featured' => true, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '10.jpg', 'category_id' => 2, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sides',     'image' => '11.jpg', 'category_id' => 3, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'image' => '12.jpg', 'category_id' => 4, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Starter',   'image' => '13.jpg', 'category_id' => 1, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '14.jpg', 'category_id' => 2, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sides',     'image' => '15.jpg', 'category_id' => 3, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'image' => '16.jpg', 'category_id' => 4, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Starter',   'image' => '17.jpg', 'category_id' => 1, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '18.jpg', 'category_id' => 2, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sides',     'image' => '19.jpg', 'category_id' => 3, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'image' => '20.jpg', 'category_id' => 4, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Starter',   'image' => '21.jpg', 'category_id' => 1, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '22.jpg', 'category_id' => 2, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sides',     'image' => '23.jpg', 'category_id' => 3, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'image' => '24.jpg', 'category_id' => 4, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Starter',   'image' => '25.jpg', 'category_id' => 1, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '26.jpg', 'category_id' => 2, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sides',     'image' => '27.jpg', 'category_id' => 3, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'image' => '28.jpg', 'category_id' => 4, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Starter',   'image' => '29.jpg', 'category_id' => 1, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '30.jpg', 'category_id' => 2, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main',      'image' => '31.jpg', 'category_id' => 3, 'featured' => false, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($galleries as $gallery) {
            Gallery:: create($gallery);
        }
    }
}
