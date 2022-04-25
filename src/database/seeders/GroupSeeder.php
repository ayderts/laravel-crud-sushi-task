<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=2; $i++){
            DB::table('student_groups')->insertOrIgnore([
                'id' => $i,
                'name' => 'Класс № '.$i,
                'curriculum_id' => $i,
            ]);
        }
    }
}
