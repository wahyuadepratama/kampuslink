<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('event_category')->insert([
        [
          'name' => 'Teknologi',
          'description' => 'ini teknologi deskripsi bla bla bla bla',
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'Ekonomi',
          'description' => 'ini ekonomi deskripsi bla bla bla bla',
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'Kesehatan',
          'description' => 'ini kesehatan deskripsi bla bla bla bla',
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
       ]);
    }
}
