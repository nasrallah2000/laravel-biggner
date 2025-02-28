<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CourseSeeder::class);
        $this->call(CategorySeeder::class);
        // Course::factory(100)->create();


    }
}
