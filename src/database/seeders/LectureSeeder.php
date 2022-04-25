<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++){
        DB::table('lectures')->insertOrIgnore([
            'id' => $i,
            'topic' => 'Лекция '.$i,
            'description' => 'Описание лекции '.$i
        ]);
    }
    }
}
