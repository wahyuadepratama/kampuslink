<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('organization')->insert([
        [
          'name' => 'Neo Telemetri',
          'instagram' => '@neotelemetri',
          'whatsapp' => '081219281982',
          'phone' => '081219281982',
          'description' => 'Neo Telemetri adalah bla bla bla bla bla bla bla bla bla bla bla blaaaa',
          'user_id' => 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'Pica',
          'instagram' => '@pica',
          'whatsapp' => '081219281982',
          'phone' => '081219281982',
          'description' => 'Pica adalah bla bla bla bla bla bla bla bla bla bla bla blaaaa',
          'user_id' => 3,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'name' => 'PHP',
          'instagram' => '@php',
          'whatsapp' => '081219281782',
          'phone' => '081219281983',
          'description' => 'PHP adalah bla bla bla bla bla bla bla bla bla bla bla blaaaa',
          'user_id' => 3,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
       ]);
    }
}
