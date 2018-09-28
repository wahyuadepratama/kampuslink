<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('event')->insert([
        [
          'name' => 'Firetech',
          'description' => 'Firetech adalah bla bla bla bla bla',
          'qr_code' => 'kajd8afd87',
          'status' => 'pending',
          'start_time' => Carbon::now(),
          'end_time' => Carbon::now(),
          'date' => Carbon::now(),
          'web_link' => 'firetech.neotelemetri.com',
          'organization_id' => 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'ISCE',
          'description' => 'ISCE adalah bla bla bla bla bla',
          'qr_code' => 'kajd8afdfd87',
          'status' => 'pending',
          'start_time' => Carbon::now(),
          'end_time' => Carbon::now(),
          'date' => Carbon::now(),
          'web_link' => 'isce.hmsiunand.com',
          'organization_id' => 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
       ]);
    }
}
