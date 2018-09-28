<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('suggestion')->insert([
        [
          'content' => 'Ini saran dan kritik 1',
          'user_id' => 2,
          'organization_id' => 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'content' => 'Ini saran dan kritik 2',
          'user_id' => 3,
          'organization_id' => 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'content' => 'Ini saran dan kritik 3',
          'user_id' => 3,
          'organization_id' => 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
       ]);
    }
}
