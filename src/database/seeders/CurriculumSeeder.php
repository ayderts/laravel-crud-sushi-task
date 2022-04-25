<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=2; $i++){
            DB::table('curriculums')->insertOrIgnore([
                'id' => $i,
                'name' => 'План '.$i,
            ]);
        }
    }

}
