<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumLecturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('curriculum_lectures')->insertOrIgnore([
                ['id'=>1, 'curriculum_id' => 1, 'lecture_id' => 1,'queue' => 1],
                ['id'=>2,'curriculum_id' => 1, 'lecture_id' => 2,'queue' => 2],
                ['id'=>3,'curriculum_id' => 2, 'lecture_id' => 3,'queue' => 1],
                ['id'=>4,'curriculum_id' => 2, 'lecture_id' => 4,'queue' => 2],
                ['id'=>5,'curriculum_id' => 2, 'lecture_id' => 5,'queue' => 3],
            ]);
    }
}
