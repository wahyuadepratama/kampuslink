<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProgramStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('program_study')->insert([
        [
          'name' => 'Sistem Informasi',
          'faculty_id' => 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'Manajemen',
          'faculty_id' => 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'Teknik Sipil',
          'faculty_id' => 3,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
       ]);
    }
}
