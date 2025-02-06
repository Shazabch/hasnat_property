<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePage::create([
            'title1' => 'Find Your Dream Property with',
            'sec_title1' => 'Hasnat Properties',
            'content1' => 'From luxurious',
            'image1' => 'assets/media/banners/home-1.jpg',
            'main_title2' => 'Welcome to',
            'sub_title2' => 'Hasnat Properties',
            'third_title2' => 'your trusted partner in real estate',
            'content2' => 'With a commitment',
            'image2' => 'assets/media/home/the-concept.webp',
        ]);
    }
}
