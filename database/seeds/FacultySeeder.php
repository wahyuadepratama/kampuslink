<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('faculty')->insert([
        [
          'name' => "Fakultas Teknologi Informasi",
          'campus_id'=> 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => "Fakultas Ekonomi",
          'campus_id'=> 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => "Fakultas Teknik",
          'campus_id'=> 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
      ]);
    }
}
