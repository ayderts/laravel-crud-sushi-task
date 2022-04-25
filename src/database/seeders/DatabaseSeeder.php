<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LectureSeeder::class);
        $this->call(CurriculumSeeder::class);
        $this->call(CurriculumLecturesSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
