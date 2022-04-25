<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insertOrIgnore([
            ['name' => 'Ученик 1', 'email' => 'student1@mail.ru','group_id' => 1],
            ['name' => 'Ученик 2', 'email' => 'student2@mail.ru','group_id' => 1],
            ['name' => 'Ученик 3', 'email' => 'student3@mail.ru','group_id' => 2],
            ['name' => 'Ученик 4', 'email' => 'student4@mail.ru','group_id' => 2],
        ]);
    }
}
