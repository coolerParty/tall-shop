<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides = [
            ['title' => 'Delicious Cooking', 'sub_title' => 'outstanding food', 'link' => 'https://www.google.com', 'image' => '1661987736.jpg', 'active' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Morning Moment',    'sub_title' => 'outstanding food', 'link' => 'https://www.google.com', 'image' => '1661987822.jpg', 'active' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Authentic Kitchen', 'sub_title' => 'outstanding food', 'link' => 'https://www.google.com', 'image' => '1661987852.jpg', 'active' => '1', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($slides as $slide) {
            HomeSlider:: create($slide);
        }
    }
}
