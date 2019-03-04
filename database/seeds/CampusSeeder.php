<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('campus')->insert([
        [
          'name' => "Andalas University",
          'location' => "Limau Manih",
          'description' => "bla bla bla bla bla",
          'background_color' => "#ffffff",
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => "Indonesia University",
          'location' => "jakarta",
          'description' => "bla bla bla bla bla",
          'background_color' => "#ffffff",
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => "Gajah Mada University",
          'location' => "yogyakarta",
          'description' => "bla bla bla bla bla",
          'background_color' => "#ffffff",
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
      ]);
    }
}
