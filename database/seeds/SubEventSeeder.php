<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sub_event')->insert([
        [
          'name' => 'Lomba TIK',
          'description' => 'Lomba TIK adalah bla bla bla bla bla',
          'qr_code' => 'kajd8afd87d',
          'ticket_stock' => 50,
          'price' => 30000,
          'status' => 'pending',
          'start_time' => Carbon::now(),
          'end_time' => Carbon::now(),
          'date' => Carbon::now(),
          'web_link' => 'firetech.neotelemetri.com',
          'category_id' => 1,
          'event_id' => 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'Hackathon',
          'description' => 'Hackathon adalah bla bla bla bla bla',
          'qr_code' => 'kajd8afd87d9',
          'ticket_stock' => 100,
          'price' => 300000,
          'status' => 'pending',
          'start_time' => Carbon::now(),
          'end_time' => Carbon::now(),
          'date' => Carbon::now(),
          'web_link' => 'firetech.neotelemetri.com',
          'category_id' => 1,
          'event_id' => 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'Expo dan Bazar',
          'description' => 'Expo dan bazar adalah bla bla bla bla bla',
          'qr_code' => 'kajd8afd87d49',
          'ticket_stock' => 110,
          'price' => 500000,
          'status' => 'pending',
          'start_time' => Carbon::now(),
          'end_time' => Carbon::now(),
          'date' => Carbon::now(),
          'web_link' => 'isce.hmsiunand.com',
          'category_id' => 1,
          'event_id' => 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
       ]);
    }
}
